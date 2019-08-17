<?php
session_start();
 if(!isset($_SESSION['submited'])  || $_SESSION['profile']!='Directeur')
        {
          header("location:../login.php");
        }

try
{
	$bdd=new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
	die('ERREUR'.$e->getMessage());
}


if(isset($_GET['verifusername']) && isset($_GET['username1']))
{
	$reponse=$bdd->prepare('SELECT user FROM membres WHERE user=?');
	$reponse->execute(array($_GET['username1']));
	$count=$reponse->rowCount();
	if($count!=0)
	{
		echo "2";
	}
	else
	{
		echo "nom de compte<br>disponible";
	}

}
elseif(isset($_GET['changeusername']) && isset($_GET['username1']) && isset($_GET['username2']) && strcmp($_GET['username1'],$_GET['username2'])==0)
{
   $reponse=$bdd->prepare('SELECT user FROM membres WHERE user=?');
	$reponse->execute(array($_GET['username1']));
	$count=$reponse->rowCount();
	if($count!=0)
	{
		echo "2";
	}
	else
	{
		$reponse=$bdd->prepare('UPDATE membres SET user=? WHERE user=?');
		$reponse->execute(array($_GET['username2'],$_SESSION['username']));
		$_SESSION['username']=$_GET['username2'];
		echo $_SESSION['username'];
	}
}
elseif(isset($_GET['verifpass']) && isset($_GET['pass1']))
{

	$reponse=$bdd->prepare('SELECT password FROM membres WHERE user=?');
	$reponse->execute(array($_SESSION['username']));
	$line=$reponse->fetch();

	if(strcmp(md5($_GET['pass1']),$line['password'])==0)
	{
		echo "Correct";
	}
	else
	{
		echo "2";
	}
}
elseif(isset($_GET['changepass']) && isset($_GET['pass3']) && isset($_GET['pass2']) && isset($_GET['pass1']) && strcmp($_GET['pass2'],$_GET['pass3'])==0)
{
	$reponse=$bdd->prepare('SELECT password FROM membres WHERE user=?');
	$reponse->execute(array($_SESSION['username']));
	$line=$reponse->fetch();
	if(strcmp(md5($_GET['pass1']),$line['password'])!=0)
	{
		echo "2";
	}
	else
	{
		$reponse=$bdd->prepare('UPDATE membres SET password=? WHERE user=?');
		$reponse->execute(array(md5($_GET['pass3']),$_SESSION['username']));
	}
		
}
elseif (isset($_GET['taux']) && !empty($_GET['date'])) {

		$date=explode('-',$_GET['date']);
		$reponse=$bdd->prepare('SELECT taux,district,obsérvation FROM svdc where MONTH(date_envoi)=? && YEAR(date_envoi)=?');
		$reponse->execute(array($date[1],$date[0]));
		$data=array();
		while($line=$reponse->fetch())
		{
			$data[]=$line;
		}

		sort($data);
		echo json_encode($data);
}
elseif(isset($_GET['taux_interaction_evolution']) && !empty($_GET['date']))
{

		$date=explode('-',$_GET['date']);
		$reponse=$bdd->prepare('SELECT MONTH(date_key) AS X ,Charge_du_mois_en_cours AS Y ,Nombre_demandes_satisfaites AS Z ,Nombre_demandes_exprimées_durant_le_mois AS W FROM sigpl where  YEAR(date_key)=?');
		$reponse->execute(array($date[0]));
		$data=array();
		while($line=$reponse->fetch())
		{
			$data[]=$line;
		}

		sort($data);
		echo json_encode($data);
}
elseif(isset($_GET['taux_ecart_interaction_evolution']) && !empty($_GET['date']))
{

		$date=explode('-',$_GET['date']);
		$reponse=$bdd->prepare('SELECT MONTH(date_key) AS X ,Ecart_charge_et_ouvertures_du_mois_en_cours AS Y FROM sigpl where  YEAR(date_key)=?');
		$reponse->execute(array($date[0]));
		$data=array();
		while($line=$reponse->fetch())
		{
			$data[]=$line;
		}

		sort($data);
		echo json_encode($data);
}
elseif(isset($_GET['taux_satisfaction_evolution']) && !empty($_GET['date']))
{

		$date=explode('-',$_GET['date']);
		$reponse=$bdd->prepare('SELECT MONTH(date_key) AS X ,indicateur_incidents_du_mois_résolus_durant_le_meme_mois AS Y,taux_demandes_satisfaite_premier_scenario AS Z,taux_demandes_satisfaite_deuxieme_scenario AS W FROM sigpl where  YEAR(date_key)=?');
		$reponse->execute(array($date[0]));
		$data=array();
		while($line=$reponse->fetch())
		{
			$data[]=$line;
		}

		sort($data);
		echo json_encode($data);
}
elseif(isset($_GET['Taux_par_canal_ESS']) && !empty($_GET['date']))
{

		$date=explode('-',$_GET['date']);
		$reponse=$bdd->prepare('SELECT MONTH(date_key) AS X ,Taux_par_canal_ESS AS Y FROM sigpl where  YEAR(date_key)=?');
		$reponse->execute(array($date[0]));
		$data=array();
		while($line=$reponse->fetch())
		{
			$data[]=$line;
		}

		sort($data);
		echo json_encode($data);
}
elseif(isset($_GET['get_year_interactions']))
{

	$date=date('Y-m-d');
	$year=explode('-',$date);
	$Thisyear=$year[0]-6;
	$data=array();
	for($i=0;$i<7;$i++)
	{
		$reponse=$bdd->query('SELECT SUM(Nombre_demandes_exprimées_durant_le_mois) AS S, SUM(Nombre_demandes_satisfaites) AS SS  FROM sigpl where  YEAR(date_key)=\''.$Thisyear.'\'');

		while($line=$reponse->fetch())
			{	
				$line['Y']=$Thisyear;
				$data[]=$line;
			}
		$Thisyear++;
	}		
			echo json_encode($data);
}
elseif(isset($_GET['get_status_of_interactions_gpl']))
{

		$reponse=$bdd->query('SELECT * FROM etat_interactions_gpl');
		$data=array();
		while($line=$reponse->fetch())
		{
			$data[]=$line;
		}

		sort($data);
		echo json_encode($data);

}
elseif(isset($_GET['Charge_interaction_par_sérvice_concerné']))
{

		$reponse=$bdd->query('SELECT Service_concerné,nbr_interactions FROM concerned_service');
		$data=array();	
		while($line=$reponse->fetch())
		{
			$data[]=$line;
		}

		echo json_encode($data);

}
elseif(isset($_GET['get_status_of_Taux_de_charge_des_sérvice']))
{

		$reponse=$bdd->query('SELECT Service_concerné,taux_de_charge_nbr_interactions_sur_nbr_total_interactions AS taux FROM concerned_service');
		$data=array();	
		while($line=$reponse->fetch())
		{
			$data[]=$line;
		}

		echo json_encode($data);

}
elseif(isset($_GET['get_status_of_status_of_categorie_interactions_gpl']))
{

		$reponse=$bdd->query('SELECT Catégorie,COUNT(*) AS result from interactions WHERE Branche=\'GPL\' AND Catégorie <> \'\' GROUP BY Catégorie');
		$data=array();	
		while($line=$reponse->fetch())
		{
			$data[]=$line;
		}

		echo json_encode($data);

}
elseif(isset($_GET['get_status_of_Classement_des_employé_par_nombre_de_cloture']))
{

		$reponse=$bdd->query('SELECT Clôturé_par,count(Clôturé_par) as nbr_cloture from interactions WHERE Branche=\'GPL\' AND Clôturé_par <> \'\' GROUP BY Clôturé_par ORDER BY nbr_cloture DESC');
		$data=array();	
		while($line=$reponse->fetch())
		{
			$data[]=$line;
		}

		echo json_encode($data);

}
elseif (isset($_POST['upload'])) 
{
	if(isset($_FILES['myfile']['name']) && $_FILES['myfile']['error']==0)
	{
		if(pathinfo($_FILES['myfile']['name'])['extension']=='csv')
		{

			$all_files = glob('./uploads/*'); // get all file names
			foreach($all_files as $target_file) 
			{
				if(is_file($target_file)) unlink($target_file); // delete file
			}
	
			move_uploaded_file($_FILES['myfile']['tmp_name'],'./uploads/'.basename($_FILES['myfile']['name']));
			$file=fopen(scandir('./uploads')[2],'r');
			$i=0;
			while ($line=fgetcsv($file)) $i++;
				
			echo $i;
		}
		else echo "2";
	}
	else
	{
		header("location:http://localhost/projet/directeur/Directeur.php");
	}
}
elseif(isset($_GET['get_status_of_Taux_de_Résolution_par_sérvice']))
{

		$reponse=$bdd->query('SELECT Service_concerné,taux_de_résolution_résolu_sur_total_local AS taux_resolution FROM concerned_service');
		$data=array();	
		while($line=$reponse->fetch())
		{
			$data[]=$line;
		}

		echo json_encode($data);

}
elseif(isset($_GET['get_status_of_Interactions_par_domaine']))
{

		$reponse=$bdd->query('SELECT Domaine,COUNT(*) AS nbr FROM interactions WHERE Branche=\'GPL\' AND Domaine<>\'\' GROUP BY Domaine ');
		$data=array();	
		while($line=$reponse->fetch())
		{
			$data[]=$line;
		}

		echo json_encode($data);

}
elseif(isset($_GET['get_status_of_Temp_moyen_de_résolution_des_intéractions']))
{

		$reponse=$bdd->query('SELECT CEIL(AVG(delai_entre_ouverture_interaction_et_fermeture)) AS avg FROM vitess_traitement_interaction ');
		$data=array();	
		$line=$reponse->fetch();
 		echo $line['avg'];

}
elseif(isset($_GET['updateData']) && isset($_GET['linePointer']))
{

		$file=file_get_contents(scandir('./uploads')[2]);
		if(preg_match('/ID Incident/',$file) && preg_match('/ID Interaction/',$file))
		{
			$table='incidents'; //pour decider slect * from quoi pour suivre l'avancenment pour la barre de chargement
				//fabrication du query 
								$query="INSERT INTO incidents (ID_Incident ,Heure_ouverture ,État ,CI_concerné ,Service_concerné ,Titre ,Groupe_affectation ,Emplacement ,Temps_de_résolution ,Groupe_résolu ,Nbre_de_réaffections ,Services_concernés ,CI_opérationnel ,Candidat_pour_Gestion_des_problèmes ,Catégorie ,Clôturé_par ,Entrée_ESS ,Heure_de_clôture ,Heure_de_réouverture ,ID_Interaction ,Ouvert_par ,Rouvert_par ,Résolu_par ,Valeur_K_P_I ,Vj_Number_6 ,Vj_Number_7 ,Urgence ,Candidat_de_solution ,Cause_Connue ,Code_Clôture ,Créé_via_Évén_de_chgmt ,Date_Heure_alerte ,Dernière_activité ,Dernière_mise_à_jour_par ,Domaine ,Début_de_interruption ,Expiration_du_SLA ,Expiration_suivante ,Fermé_par_groupe ,Fichier_KPF ,Fin_de_interruption ,Heure_de_màj ,ID_Accord ,ID_Accord_SLA ,Impact ,Mis_à_jour_par ,Naftal_Assignment ,Nf_Solution_Provided ,Nombre_de_réaffectations ,Pas_auto_clôture ,Priorité ,Responsable ,Rupture_du_SLA ,Réaffecté ,Référence_du_processus_externe ,Société ,Sous_domaine ,Visible_par_le_client ,État_K_P_I ,État_de_alerte ,Index_par_rapport_au_code_SD_Branche_OP_SPOC ,Branche ,ROUVERTURE ,NB_JOURS ,Dpt_Code_Bénéficiaire ,Siege_District ,Bénéficiaire ,Escalade_DG_Applications_de_Gestion ,Escalade_DG_Back_Office ,Escalade_DG_ ,Nb_Activités_pour_cet_incident ,Index_First_Activité ,Index_Last_Activité ,INDEX_INT_ASSOCIEE ,INSTANT_CLOTURE_INT_ASSOCIEE ,DELTA1 ,ERREUR_ ,Delta2 ,DELTA3 ,DELTA_Conforme ,DELTA_REEL ,CallBack ,Nombre_activités ,Index_début ,Index_fin ,Ouvert ,En_cours ,Work_In_Progress ,Rejeté ,Resolved ,Accepté ,Closed ,A_qualifier ,En_attente ,En_attente_Changement ,En_attente_fournisseur ,En_attente_client ,Pending_Customer ,ATTENTE_CLIENT ,Index_dans_Activities_de_la_Résolution_de_Inc ,Not_resolved_yet_ ,Instant_résolution ,Instant_de_cloture ,Delta4 ,Code_direction ,OP_BENEFICIAIRE ,SD ,Etat_interaction_associée) VALUES ";

								//les columnes ou il y'a des dates
								$dateArray=array(1,8,17,18,31,32,35,36,37,40,41,74,101,102);
		}
		else
		{
			$table='interactions';

								$query="INSERT INTO interactions (ID_Interaction ,Contact_Bénéficiaire ,Service_concerné ,CI_concerné ,État ,Date_cible_du_SLA ,Titre ,Branche ,Département ,Ouvert_par ,Entrée_ESS ,Catégorie ,Clôturé_par ,Contact_principal ,Domaine ,Heure_ouverture ,Heure_clôture ,Heure_màj ,Impact ,Nf_Resolve_Time ,Perte_totale ,Première_modification ,Rupture_SLA ,Résolu_au_niveau_1 ,Sysmodcount ,Sysmodtime ,Sysmoduser ,Temps_manipulation ,Maj_par ,Notifier_par ,Priorité ,Urgence ,Sous_domaine ,Article_abonnement ,Candidat_solution ,Code_Clôture ,Maj_via_ESS ,Nf_Callback_Type ,Résolution_prévue ,Source_connaissances ,Échec_privilège ,État_approbation ,Num_Semaine ,Index_DptNumber_Beneficiaire ,DptNumber_Beneficiaire ,Direction ,CI_ ,ESS_ ,ANNEE ,Mois ,DAY ,INTERVALLES_TEMPS_MANIPULATION ,NB_JOURS ,Valeurs_Contact_et_Bénéficiaire ,DptCode_CONTACT ,DptCode_Bénéficiaire ,Contact_Bénéficiaire_différent_Dpt ,HEURES_INFLUENCE_OPEN ,Erreur_sur_saisies_CONTACT ,Erreur_sur_saisies_BENEFICIAIRES ,NB_MIN_INDISPONIBILITE ,NB_HEURES_INDISPONIBILITE ,NB_JOURS_INDISPO ,Type_CI ,ERREUR_SUR_VALEUR_COLONNE_BD_ ) VALUES ";
									$dateArray=array(5,15,16,17,19,21,25,50);
		}

		$saveQuery=$query;

		$file=file(scandir('./uploads')[2],FILE_SKIP_EMPTY_LINES);
		$fileLength=count($file);
		$cpt=$_GET['linePointer'];
		while($cpt<$_GET['linePointer']+150 && $cpt<$fileLength)
		{
			
							$value=$file[$cpt];
							
							if (preg_match('/".*;.*"/',$value,$array))
							{
								$regex='/'.$array[0].'/'; 
								$array[0]=preg_replace('/;/',' ',$array[0]);
							    $value=preg_replace($regex,$array[0],$value);
								array_pop($array);

							}

							if(preg_match('/;;;;\r\n/',$value)) $value=preg_replace('/;;;;\r\n/','',$value);

							//reconstitution du tableau
							$value=explode(';',$value);
							foreach ($dateArray as $valeur) 
							{
								//dans le tableau $value acceder a chaque colmnes date et la transformer sous la forme y-m-d
								if(!empty($value[$valeur]) && substr($value[$valeur],0,1)!='#')
								{
									$newdate=explode(' ',$value[$valeur]);
									$newdate=explode('/',$newdate[0]); 
									$value[$valeur]=$newdate[2].'-'.$newdate[1].'-'.$newdate[0];
								}
								else $value[$valeur]='1970-01-01';


							}


							//remplacer les char spéciaux par des espaces pour ne pas avoire de prblem dans la requete	
							foreach ($value as $key => $escape) {
									 		$value[$key]=preg_replace('/\'/',' ',$escape);
									 	}

							 //	"('".implode("','",$value)."')" contien ce qui vient aprés VALUES et il faut que ca soit en utf-8
							$query.="('".implode("','",$value)."')";

							//echo $query;

							try {
										$reponse=$bdd->query($query);				

							    } catch (Exception $e) 
							    {			
										die('ERREUR'.$e->getMessage());
								}	
							$query=$saveQuery;
							$cpt++;

		}

		/*************************************************/
		//generer la table sigpl
		if($cpt>=$fileLength && $table=='interactions')
		{
		/******************************************* insertion dans sigpl *****************************************************/
			//preparer le query
			$myquery="INSERT INTO sigpl (date_key,Nombre_demandes_exprimées_durant_le_mois,Nombre_demandes_satisfaites,	taux_demandes_satisfaite_premier_scenario,Charge_du_mois_en_cours,taux_demandes_satisfaite_deuxieme_scenario,Nombre_de_demandes_exprimées_par_ESS,Taux_par_canal_ESS,Ecart_charge_et_ouvertures_du_mois_en_cours,NOMBRE_DE_DEMANDES_DU_MOIS_RESOLUES_DURANT_LE_MOIS,indicateur_incidents_du_mois_résolus_durant_le_meme_mois) VALUES ";

			//selectioner chaque unique anné-mois ajouter 01 pour indiquer le debut du mois et voila notre clé primaire
			$reponse=$bdd->query("SELECT DISTINCT YEAR(Heure_ouverture) AS year,MONTH(Heure_ouverture) AS month FROM interactions ORDER BY year ASC");

			//pour chaque clé primaire
			while($line=$reponse->fetch())
			{
				//compter le nombre d'interaction ouverte de la branche gpl durant la period du mois courant= correspendant a la clé primaire selectionner 
				$reponse1=$bdd->query("SELECT COUNT(*) AS count_demandes FROM interactions WHERE branche='gpl' AND Heure_ouverture between '".$line['year']."-".$line['month']."-01' AND DATE_ADD(DATE_ADD('".$line['year']."-".$line['month']."-01',INTERVAL 1 MONTH),INTERVAL -1 DAY)");
				$line1=$reponse1->fetch();

				//compter le nombre de demande satisfaite
				$reponse2=$bdd->query("SELECT COUNT(*) AS count_satisfaite FROM interactions WHERE branche='gpl' AND Heure_ouverture between '".$line['year']."-".$line['month']."-01' AND DATE_ADD(DATE_ADD('".$line['year']."-".$line['month']."-01',INTERVAL 1 MONTH),INTERVAL -1 DAY) AND État='closed'");
				$line2=$reponse2->fetch();

				//taux_demandes_satisfaite_premier_scenario
				$line3=$line2['count_satisfaite']/$line1['count_demandes'];

				//Charge_du_mois_en_cours donc ouvert dans les mois precédent et qui ne sont pas cloturer dans leurs mois d'ouverture ou ne sont pas cloturé du tous

				$reponse4=$bdd->query("SELECT COUNT(*) AS this_month_charge FROM interactions WHERE branche='gpl' AND Heure_ouverture < '".$line['year']."-".$line['month']."-01' AND (Heure_clôture >= '".$line['year']."-".$line['month']."-01' OR ISNULL(Heure_clôture))");
				$line4=$reponse4->fetch();
				$this_month_charge=$line1['count_demandes']+$line4['this_month_charge'];

				//taux_demandes_satisfaite_deuxieme_scenario

				$line5=$line2['count_satisfaite']/$this_month_charge;

				//Nombre de demandes exprimées par ESS

				$reponse6=$bdd->query("SELECT COUNT(*) AS exprimer_par_ess FROM interactions WHERE branche='gpl' AND Entrée_ESS='true' AND Heure_ouverture BETWEEN '".$line['year']."-".$line['month']."-01' AND DATE_ADD(DATE_ADD('".$line['year']."-".$line['month']."-01',INTERVAL 1 MONTH),INTERVAL -1 DAY)");
				$line6=$reponse6->fetch();

				//Taux_par_canal_ESS

				$line7=$line6['exprimer_par_ess']/$line1['count_demandes'];

				//Ecart_charge_et_ouvertures_du_mois_en_cours

				$line8=$this_month_charge-$line1['count_demandes'];

				//NOMBRE_DE_DEMANDES_DU_MOIS_RESOLUES_DURANT_LE_MOIS	

				$reponse9=$bdd->query("SELECT COUNT(*) AS NOMBRE_DE_DEMANDES_DU_MOIS_RESOLUES_DURANT_LE_MOIS FROM interactions WHERE branche='gpl' AND 	État='Closed' AND Heure_ouverture BETWEEN '".$line['year']."-".$line['month']."-01' AND DATE_ADD(DATE_ADD('".$line['year']."-".$line['month']."-01',INTERVAL 1 MONTH),INTERVAL -1 DAY) AND Heure_clôture  BETWEEN '".$line['year']."-".$line['month']."-01' AND DATE_ADD(DATE_ADD('".$line['year']."-".$line['month']."-01',INTERVAL 1 MONTH),INTERVAL -1 DAY)");
				$line9=$reponse9->fetch();

				//indicateur_incidents_du_mois_résolus_durant_le_meme_mois

				$line10=$line9['NOMBRE_DE_DEMANDES_DU_MOIS_RESOLUES_DURANT_LE_MOIS']/$line1['count_demandes'];

				//continuer la FORMATION DU QUERY
				$myquery.="('".$line['year']."-".$line['month']."-01','".$line1['count_demandes']."','".$line2['count_satisfaite']."','".$line3."','".$this_month_charge."','".$line5."','".$line6['exprimer_par_ess']."','".$line7."','".$line8."','".$line9['NOMBRE_DE_DEMANDES_DU_MOIS_RESOLUES_DURANT_LE_MOIS']."','".$line10."'),";
			}
			$myquery=substr($myquery,0,-1);
			$reponse=$bdd->query($myquery);
		/******************************************* insertion dans etat_interaction_gpl *****************************/
			

			$reponse1=$bdd->query('SELECT COUNT(*) AS closed FROM interactions WHERE État=\'Closed\'');
			$line1=$reponse1->fetch();
			$reponse2=$bdd->query('SELECT COUNT(*) AS open_callback FROM interactions WHERE État=\'Open - Callback\'');
			$line2=$reponse2->fetch();
			$reponse3=$bdd->query('SELECT COUNT(*) AS open_idle FROM interactions WHERE État=\'Open - Idle\'');
			$line3=$reponse3->fetch();
			$reponse4=$bdd->query('SELECT COUNT(*) AS open_linked FROM interactions WHERE État=\'Open - Linked\'');
			$line4=$reponse4->fetch();
			$myquery="INSERT INTO etat_interactions_gpl (closed,open_callback,open_idle,open_linked) VALUES ('".$line1['closed']."','".$line2['open_callback']."','".$line3['open_idle']."','".$line4['open_linked']."')";
			$reponse=$bdd->query($myquery);

		/******************************************* insertion dans concerned_service *****************************/

		//preparation du query
		$myquery="INSERT INTO concerned_service (Service_concerné,nbr_interactions,taux_de_charge_nbr_interactions_sur_nbr_total_interactions,nbr_interactions_résolu,	taux_de_résolution_résolu_sur_total_local) VALUES ";
		//nbr d'interactions gpl
		$reponse1=$bdd->query("SELECT COUNT(*) AS total_interactions_gpl FROM interactions WHERE Branche='GPL' AND service_concerné<>''");
		$line1=$reponse1->fetch();
		$total_interactions_gpl=$line1['total_interactions_gpl'];

		//tableau service_concerné | nbr_interactions par service
		$reponse2=$bdd->query("SELECT service_concerné,COUNT(*) as nbr_interactions FROM interactions WHERE Branche='GPL' AND service_concerné<>'' GROUP BY service_concerné");
		
		while($line2=$reponse2->fetch())
		{
			$service_concerné=$line2['service_concerné'];
			$nbr_interactions=$line2['nbr_interactions'];
			$taux_de_charge_nbr_interactions_sur_nbr_total_interactions=$nbr_interactions/$total_interactions_gpl;
			//nbr_interactions_résolu par ce service
			$reponse3=$bdd->query("SELECT COUNT(*) AS nbr_interactions_résolu from interactions where Branche='gpl' and État='Closed' and service_concerné='".$service_concerné."'");
			$line3=$reponse3->fetch();
			$nbr_interactions_résolu=$line3['nbr_interactions_résolu'];

			//taux_de_résolution_résolu_sur_total_local
			$taux_de_résolution_résolu_sur_total_local=$nbr_interactions_résolu/$nbr_interactions;

			//suite du query
			$myquery.="('".$service_concerné."','".$nbr_interactions."','".$taux_de_charge_nbr_interactions_sur_nbr_total_interactions."','".$nbr_interactions_résolu."','".$taux_de_résolution_résolu_sur_total_local."'),";
		}
		$myquery=substr($myquery,0,-1);
		$reponse=$bdd->query($myquery);

		/******************************************* insertion dans vitess_traitement_interaction*****************************/
		//preparation du query
		$myquery="INSERT INTO vitess_traitement_interaction (ID_Interaction,delai_entre_ouverture_interaction_et_fermeture) VALUES  ";
		$reponse1=$bdd->query("SELECT ID_Interaction,TIMESTAMPDIFF(DAY,Heure_ouverture,Heure_clôture) AS diff FROM interactions WHERE Branche='GPL' AND Heure_ouverture <> '1970-01-01' AND Heure_clôture <> '1970-01-01'");

		while($line1=$reponse1->fetch())
		{
			$myquery.="('".$line1['ID_Interaction']."','".$line1['diff']."'),";
		}
		$myquery=substr($myquery,0,-1);
		$reponse=$bdd->query($myquery);
		//////////////////////////////////////////////////////////////////////////
		}
		/*******************************************************/	

	


						//compter la progression pour la barre
							$reponse=$bdd->query('SELECT * FROM '.$table.' ');
							$count=$reponse->rowCount();
							echo $count;
			       				
}
elseif (isset($_GET['delete_all_update'])) {
	$reponse=$bdd->query('DELETE FROM incidents');
	echo "delete_all_update_done";
}
elseif (isset($_GET['delete_all_update2'])) {
	$reponse=$bdd->query('DELETE FROM interactions');
	$reponse=$bdd->query('DELETE FROM sigpl');
	$reponse=$bdd->query('DELETE FROM etat_interactions_gpl');
	$reponse=$bdd->query('DELETE FROM concerned_service');
	$reponse=$bdd->query('DELETE FROM vitess_traitement_interaction');
	echo "delete_all_update_done";
}
elseif(isset($_GET['get_incident_rows_count']))
{
	$reponse=$bdd->query('SELECT COUNT(*) as count_rows FROM incidents');
	$line=$reponse->fetch();
	echo $line['count_rows'];
}
elseif(isset($_GET['get_interaction_rows_count']))
{
	$reponse=$bdd->query('SELECT COUNT(*) as count_rows FROM interactions');
	$line=$reponse->fetch();
	echo $line['count_rows'];
}
else echo "2";
?>