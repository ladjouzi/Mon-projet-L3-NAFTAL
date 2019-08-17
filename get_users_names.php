<?php
session_start();
        try{$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));}
        catch(Exception $e){die('ERREUR :'.$e->getMessage());} 
        /********** traitement de la barre de recherche*********************/
        if(isset($_GET['user']))
        {

		        $reponse=$bdd->query('SELECT user FROM membres');
		        $data=array();
		        $results=array();
		        while($line=$reponse->fetch())
		        {
		        	$data[]=$line['user'];
		        }
		        $dataLength=count($data);
		        sort($data);
		        for($i=0;$i<$dataLength && count($results)<20;$i++)
		        {
		        	if(stripos($data[$i],$_GET['user'])===0)
		        	{
		        		array_push($results, $data[$i]);
		        	}
		        }
		        echo implode('|',$results);
		}
		elseif (isset($_GET['profile'])) 
		{
			
		        $reponse=$bdd->query('SELECT DISTINCT profile FROM membres'); //pour eviter la duplication des profiles
		        $data=array();
		        $results=array();
		        while($line=$reponse->fetch())
		        {
		        	$data[]=$line['profile'];
		        }
		        $dataLength=count($data);
		        sort($data);
		        for($i=0;$i<$dataLength && count($results)<20;$i++)
		        {
		        	if(stripos($data[$i],$_GET['profile'])===0)
		        	{
		        		array_push($results, $data[$i]);
		        	}
		        }
		        echo implode('|',$results);
		}
		else
		{     /********** traitement l'affichage de la table seln les filtres*********************/
		              if(isset($_GET['only-date']))
	                 {
                          $reponse=$bdd->query('SELECT * FROM membres WHERE date_inscription=\''.strip_tags($_GET['only-date']).'\'');
                          $count=$reponse->rowCount();
                          if($count>0)
                          {
	                           $data=array();
						       while($line = $reponse->fetch())
						       {
						       	 $data[]=$line;
						       }
						       sort($data);
						       echo json_encode($data);
                          }
                          else echo "nothing";

	                 }
                     elseif (!isset($_GET['date-filter']) && !isset($_GET['userExist']))
                     {
                     	if(isset($_GET['user-filter']))
                     	{
	                     	  $reponse=$bdd->query('SELECT * FROM membres WHERE user=\''.strip_tags($_GET['user-filter']).'\'');
	                          $count=$reponse->rowCount();
	                          if($count>0)
	                          {
		                           $data=array();
							       while($line = $reponse->fetch())
							       {
							       	 $data[]=$line;
							       }
							       sort($data);
							       echo json_encode($data);
	                          }
	                           else echo "nothing";

                     	}
                     	elseif(isset($_GET['profil-filter']))
                     	{
                     		  $reponse=$bdd->query('SELECT * FROM membres WHERE profile=\''.strip_tags($_GET['profil-filter']).'\'');
	                          $count=$reponse->rowCount();
	                          if($count>0)
	                          {
		                           $data=array();
							       while($line = $reponse->fetch())
							       {
							       	 $data[]=$line;
							       }
							       sort($data);
							       echo json_encode($data);
	                          }
	                           else echo "nothing";

                     	}
                       /*** triatement de la modification de lable ****/
                        elseif(isset($_GET['inputValue']) && isset($_GET['oldValue'])) /*cas de username*/
                        {
                            $reponse=$bdd->query('SELECT user FROM membres WHERE user=\''.strip_tags($_GET['inputValue']).'\'');
                            $count=$reponse->rowCount();
                            if($count==0)
                            {
                               $reponse=$bdd->query('UPDATE membres SET user=\''.strip_tags($_GET['inputValue']).'\' WHERE user=\''.strip_tags($_GET['oldValue']).'\'');


                            }
                            else echo "invalide";
                       }
                       elseif (isset($_GET['inputValue']) && isset($_GET['userValue'])) /*cas de mot de passe*/
                       { 

                               $reponse=$bdd->query('UPDATE membres SET password=\''.md5($_GET['inputValue']).'\' WHERE user=\''.strip_tags($_GET['userValue']).'\'');

                       }
                       elseif(isset($_GET['mdfProfile']) && isset($_GET['userValue']))
                       {
                               $reponse=$bdd->query('UPDATE membres SET profile=\''.$_GET['mdfProfile'].'\' WHERE user=\''.strip_tags($_GET['userValue']).'\'');
                       }
                       elseif(isset($_GET['deleteValue']))
                       {
                       	    if($_GET['deleteValue']!='behlouli' && $_SESSION['username']!=$_GET['deleteValue'])
                       	    {
                       	       $reponse=$bdd->query('DELETE FROM membres WHERE user=\''.strip_tags($_GET['deleteValue']).'\'');
                               echo(--$_SESSION['count_bdd_users']);
                       	    }
                       	    else
                       	    {
                       	    	echo "impossible";
                       	    }

                       }
                     	else
                     	{
                     	   $reponse = $bdd->query('SELECT * FROM membres'); 
						   $data=array();
					       while($line = $reponse->fetch())
					       {
					       	 $data[]=$line;
					       }
					       sort($data);
					       echo json_encode($data);
                     	}


                    }
                     elseif (isset($_GET['date-filter'])) 
                     {

                        if(isset($_GET['user-filter']))
                     	{
	                     	  $reponse=$bdd->query('SELECT * FROM membres WHERE user=\''.strip_tags($_GET['user-filter']).'\'AND date_inscription=\''.strip_tags($_GET['date-filter']).'\'');
	                          $count=$reponse->rowCount();
	                          if($count>0)
	                          {
		                           $data=array();
							       while($line = $reponse->fetch())
							       {
							       	 $data[]=$line;
							       }
							       sort($data);
							       echo json_encode($data);
	                          }
	                           else echo "nothing";
                     	}
                     	elseif(isset($_GET['profil-filter']))
                     	{
                     		  $reponse=$bdd->query('SELECT * FROM membres WHERE profile=\''.strip_tags($_GET['profil-filter']).'\'AND date_inscription=\''.strip_tags($_GET['date-filter']).'\'');
	                          $count=$reponse->rowCount();
	                          if($count>0)
	                          {
		                           $data=array();
							       while($line = $reponse->fetch())
							       {
							       	 $data[]=$line;
							       }
							       sort($data);
							       echo json_encode($data);
	                          }
	                           else echo "nothing";
                     	}


                     }

 
	
		}

?>