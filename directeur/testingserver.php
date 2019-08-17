<?php
try
{
	$bdd=new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
	die('ERREUR'.$e->getMessage());
}
$file=file_get_contents(scandir('./uploads')[2]);

if(preg_match('/ID Incident/',$file) && preg_match('/ID Interaction/',$file))
{
		//fabrication du query 
						$query="INSERT INTO incidents (ID_Incident ,Heure_ouverture ,État ,CI_concerné ,Service_concerné ,Titre ,Groupe_affectation ,Emplacement ,Temps_de_résolution ,Groupe_résolu ,Nbre_de_réaffections ,Services_concernés ,CI_opérationnel ,Candidat_pour_Gestion_des_problèmes ,Catégorie ,Clôturé_par ,Entrée_ESS ,Heure_de_clôture ,Heure_de_réouverture ,ID_Interaction ,Ouvert_par ,Rouvert_par ,Résolu_par ,Valeur_K_P_I ,Vj_Number_6 ,Vj_Number_7 ,Urgence ,Candidat_de_solution ,Cause_Connue ,Code_Clôture ,Créé_via_Évén_de_chgmt ,Date_Heure_alerte ,Dernière_activité ,Dernière_mise_à_jour_par ,Domaine ,Début_de_interruption ,Expiration_du_SLA ,Expiration_suivante ,Fermé_par_groupe ,Fichier_KPF ,Fin_de_interruption ,Heure_de_màj ,ID_Accord ,ID_Accord_SLA ,Impact ,Mis_à_jour_par ,Naftal_Assignment ,Nf_Solution_Provided ,Nombre_de_réaffectations ,Pas_auto_clôture ,Priorité ,Responsable ,Rupture_du_SLA ,Réaffecté ,Référence_du_processus_externe ,Société ,Sous_domaine ,Visible_par_le_client ,État_K_P_I ,État_de_alerte ,Index_par_rapport_au_code_SD_Branche_OP_SPOC ,Branche ,ROUVERTURE ,NB_JOURS ,Dpt_Code_Bénéficiaire ,Siege_District ,Bénéficiaire ,Escalade_DG_Applications_de_Gestion ,Escalade_DG_Back_Office ,Escalade_DG_ ,Nb_Activités_pour_cet_incident ,Index_First_Activité ,Index_Last_Activité ,INDEX_INT_ASSOCIEE ,INSTANT_CLOTURE_INT_ASSOCIEE ,DELTA1 ,ERREUR_ ,Delta2 ,DELTA3 ,DELTA_Conforme ,DELTA_REEL ,CallBack ,Nombre_activités ,Index_début ,Index_fin ,Ouvert ,En_cours ,Work_In_Progress ,Rejeté ,Resolved ,Accepté ,Closed ,A_qualifier ,En_attente ,En_attente_Changement ,En_attente_fournisseur ,En_attente_client ,Pending_Customer ,ATTENTE_CLIENT ,Index_dans_Activities_de_la_Résolution_de_Inc ,Not_resolved_yet_ ,Instant_résolution ,Instant_de_cloture ,Delta4 ,Code_direction ,OP_BENEFICIAIRE ,SD ,Etat_interaction_associée) VALUES ";

						//les columnes ou il y'a des dates
						$dateArray=array(1,8,17,18,31,32,35,36,37,40,41,74,101,102);
}
else
{
	$interactions=true;
						$query="INSERT INTO interactions (ID_Interaction ,Contact_Bénéficiaire ,Service_concerné ,CI_concerné ,État ,Date_cible_du_SLA ,Titre ,Branche ,Département ,Ouvert_par ,Entrée_ESS ,Catégorie ,Clôturé_par ,Contact_principal ,Domaine ,Heure_ouverture ,Heure_clôture ,Heure_màj ,Impact ,Nf_Resolve_Time ,Perte_totale ,Première_modification ,Rupture_SLA ,Résolu_au_niveau_1 ,Sysmodcount ,Sysmodtime ,Sysmoduser ,Temps_manipulation ,Maj_par ,Notifier_par ,Priorité ,Urgence ,Sous_domaine ,Article_abonnement ,Candidat_solution ,Code_Clôture ,Maj_via_ESS ,Nf_Callback_Type ,Résolution_prévue ,Source_connaissances ,Échec_privilège ,État_approbation ,Num_Semaine ,Index_DptNumber_Beneficiaire ,DptNumber_Beneficiaire ,Direction ,CI_ ,ESS_ ,ANNEE ,Mois ,DAY ,INTERVALLES_TEMPS_MANIPULATION ,NB_JOURS ,Valeurs_Contact_et_Bénéficiaire ,DptCode_CONTACT ,DptCode_Bénéficiaire ,Contact_Bénéficiaire_différent_Dpt ,HEURES_INFLUENCE_OPEN ,Erreur_sur_saisies_CONTACT ,Erreur_sur_saisies_BENEFICIAIRES ,NB_MIN_INDISPONIBILITE ,NB_HEURES_INDISPONIBILITE ,NB_JOURS_INDISPO ,Type_CI ,ERREUR_SUR_VALEUR_COLONNE_BD_ ) VALUES ";
							$dateArray=array(5,15,16,17,19,21,25,50);
}

$saveQuery=$query;

$file=file(scandir('./uploads')[2],FILE_SKIP_EMPTY_LINES);
$cpt=0;
for($i=0;$i<4;$i++)
{
	array_shift($file);
}
while(!empty($file))
{
	
					$value=array_shift($file);
					
					if (preg_match('/".*;.*"/',$value,$array))
					{
						$regex='/'.$array[0].'/'; 
						$array[0]=preg_replace('/;/',' ',$array[0]);
					    $value=preg_replace($regex,$array[0],$value);
						array_pop($array);

					}

					$value=preg_replace('/;;;;\r\n/','',$value);
					//reconstitution du tableau
					$value=explode(';',$value);
					foreach ($dateArray as $valeur) 
					{
						//dans le tableau $value acceder a chaque colmnes date et la transformer sous la forme y-m-d
						if(!empty($value[$valeur]) && substr($value[$valeur],0,1)!='#' )
						{		
							if($valeur!=50)
							{
								$newdate=explode(' ',$value[$valeur]);
								$newdate=explode('/',$newdate[0]); 
								$value[$valeur]=$newdate[2].'-'.$newdate[1].'-'.$newdate[0];
							}
							else{
								$value[$valeur]='1970-01-01';
							}		
						
							/*$newdate=substr($value[$valeur],0,-6);
							$d=substr($newdate,0,-8);
							$m=substr(substr($newdate,0,-5),3);
							$y=substr($newdate,6);
							$value[$valeur]=$y.'-'.$m.'-'.$d;*/ 
						}
						else $value[$valeur]='1970-01-01';

					}


					//remplacer les char spéciaux par des espaces pour ne pas avoire de prblem dans la requete	
					foreach ($value as $key => $escape) {
						   echo "before : ".$value[$key]."<br>";
							 		$value[$key]=preg_replace('/[^A-Za-z0-9-é-è\-]/',' ',$escape);
							echo "AFTER : ".$value[$key]."<br>--------------------";
							 	}

					 //	"('".implode("','",$value)."')" contien ce qui vient aprés VALUES et il faut que ca soit en utf-8
					$query.="('".implode("','",$value)."')";


					try {
								 	$reponse=$bdd->query($query);
					    } catch (Exception $e) 
					    {
									
								die('ERREUR'.$e->getMessage());
						}	
					$query=$saveQuery;
					$cpt++;

}



?>