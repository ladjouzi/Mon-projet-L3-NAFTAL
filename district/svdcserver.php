<?php
session_start();
if(!isset($_SESSION['submited'])  || stripos($_SESSION['profile'],"D.")!==0 &&  $_SESSION['profile']!='Directeur')
{
   header("location:login.php");
}
try
		{
			$bdd=new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

		}
		catch(Exception $e)
		{
			die('ERREUR :'.$e->getMessage());
		}

if(isset($_POST['submit'])) /* c'est le submit de changment de mot de passe*/
{
	
		if(isset($_POST['DisUserNameChange1']) && isset($_POST['DisUserNameChange2']) && strcmp($_POST['DisUserNameChange1'], $_POST['DisUserNameChange2'])==0)
		 {
			  $reponse=$bdd->prepare('SELECT user FROM membres WHERE user=?');
			  $reponse->execute(array($_POST['DisUserNameChange1']));
			  if(($reponse->rowCount())==0) 
			  {
		           $reponse=$bdd->prepare('UPDATE membres SET user=? WHERE user=?');
		           $reponse->execute(array($_POST['DisUserNameChange1'],$_SESSION['username']));
		           $_SESSION['username']=$_POST['DisUserNameChange1'];
		           echo $_SESSION['username'];
			  }
			  else
			  {
			  	echo "2";
			  }
		      
		 }
		 elseif (isset($_POST['DisUserPassChange1']) && isset($_POST['DisUserPassChange2']) && strcmp($_POST['DisUserPassChange1'], $_POST['DisUserPassChange2'])==0) 
		 {
		 	 $reponse=$bdd->prepare('UPDATE membres SET password=? WHERE user=?');
		 	 $reponse->execute(array(md5($_POST['DisUserPassChange1']),$_SESSION['username']));
		 	 echo $_POST['DisUserPassChange1'];
		 }
		 else
		 {
		 	echo "2";
		 }
}
elseif (isset($_GET['Dprofil']) && !isset($_POST['envoyer'])) echo $_SESSION['profile'];

elseif (isset($_POST['envoyer']) && isset($_POST['numA']) && isset($_POST['numB']) && isset($_POST['numC']) && isset($_POST['numD']) && isset($_POST['reste']) && isset($_POST['taux']) && isset($_POST['district']))
{
        /*inserer juste une chaque mois ->changeer datetime en date et faire d'abord un select MONTH(date_envoi) as mois from  svdc where user=session name and MONTH(date_envoi)=MONTH(NOW()) si rowcount==0 alors executer ceci */ 
        $reponse=$bdd->query('SELECT user FROM svdc WHERE district=\''.$_POST['district'].'\' AND MONTH(date_envoi)=MONTH(NOW())');
        $count=$reponse->rowCount();
        if($count==0)
        {
		        $reponse=$bdd->prepare('INSERT INTO svdc (user,a,b,c,d,reste,taux,obsérvation,district,date_envoi) VALUES (?,?,?,?,?,?,?,?,?,NOW())');
		        $reponse->execute(array($_SESSION['username'],$_POST['numA'],$_POST['numB'],$_POST['numC'],$_POST['numD'],$_POST['reste'],$_POST['taux'],$_POST['obsérvation'],$_POST['district']));
		      echo "1";	
        }
        else if($count!=0)
        {
        	$line=$reponse->fetch();
        	echo $line['user'];
        }
        else
        {
        	echo"2";
        }

	 
      /* sinon ech*/
}
elseif (isset($_POST['donnemoi'])) {
	
	  $reponse=$bdd->prepare('SELECT id,user,date_envoi FROM svdc WHERE user=? ORDER BY date_envoi DESC LIMIT 0, 22');
      $reponse->execute(array($_SESSION['username']));
      $count=$reponse->rowCount();
           if($count>0)
           {
           	 echo "<ol>";
	            while($line = $reponse->fetch())
			    {
				  echo '<li>Par '.$line['user'].' : Le '.$line['date_envoi'].'<img id="poubelle" src="../delete.png" alt="supprimer-icon-"><span style="display:none;">'.$line['id'].'</span></li>';
				}
			 echo "</ol>";

           }
           else echo '<span style="color:red; font-size:1.6em; font-weight:bold;">Aucun envoi !<span>';
}
elseif(isset($_GET['supprimer']) && isset($_GET['id'])) 
{
	 $reponse=$bdd->query('DELETE FROM svdc WHERE id=\''.$_GET['id'].'\'');
	 echo "DONE";
}
elseif (isset($_POST['donnemoitous']) && isset($_POST['district'])) 
{

	  $reponse=$bdd->prepare('SELECT user,date_envoi FROM svdc WHERE district=? ORDER BY date_envoi DESC LIMIT 0, 22');
      $reponse->execute(array($_POST['district']));
      $count=$reponse->rowCount();
           if($count>0)
           {
           	 echo "<ol>";
	            while($line = $reponse->fetch())
			    {
				  echo '<li>Par '.$line['user'].' : Le '.$line['date_envoi'].'</li>';
				}
			 echo "</ol>";

           }
           else echo '<span style="color:red; font-size:1.6em; font-weight:bold;">Aucun envoi !<span>';
	
}
else
{
	echo "2";
}

?>