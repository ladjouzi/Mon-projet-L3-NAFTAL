<?php
session_start();
if(!isset($_SESSION['submited'])  || $_SESSION['profile']!='Branche' &&  $_SESSION['profile']!='Directeur')
{
   header("location:login.php");
}

try
{
	$bdd=new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
	die('ERREUR'.$e->getMessage());
}

if(isset($_GET['displaydemandes']) && isset($_GET['monthselect']) && !empty($_GET['monthselect']))
{
	
	$tab=explode('-',$_GET['monthselect']);
	$reponse=$bdd->prepare("SELECT id,user,district,date_envoi FROM svdc WHERE MONTH(date_envoi)=? AND YEAR(date_envoi)=?");
	$reponse->execute(array($tab[1],$tab[0]));
	$count=$reponse->rowCount();
	if($count>0)
	{
		while($line=$reponse->fetch())
		{
			echo"<tr>";
			   echo "<td>".$line['district']."</td>";
			   echo '<td><button class="afficher_dem">Afficher<span style="display:none;">'.$line['id'].'</span></button></td>';
			   echo "<td>".$line['date_envoi']."</td>";
			   echo "<td>".$line['user']."</td>";
			echo"</tr>";

		}
	}
}
elseif (isset($_GET['svdcdisplay']) && isset($_GET['id'])) {
	$reponse=$bdd->prepare("SELECT * FROM svdc WHERE id=?");
	$reponse->execute(array($_GET['id']));
	$line=$reponse->fetch();
	echo $line['user'].'|'.$line['a'].'|'.$line['b'].'|'.$line['c'].'|'.$line['d'].'|'.$line['reste'].'|'.$line['taux'].'|'.$line['obsérvation'].'|'.$line['district'].'|'.$line['date_envoi'];
} 
elseif(isset($_POST['submit']))
{

	   if( isset($_POST['DisUserNameChange1']) && isset($_POST['DisUserNameChange2'])  &&  strcmp($_POST['DisUserNameChange1'],$_POST['DisUserNameChange2'])==0)
		{
		   $reponse=$bdd->prepare("SELECT user FROM membres WHERE user=?");
		   $reponse->execute(array($_POST['DisUserNameChange1']));
		   $count=$reponse->rowCount();
		   if($count==0)
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
		elseif( isset($_POST['DisUserPassChange1']) && isset($_POST['DisUserPassChange2'])  &&  strcmp($_POST['DisUserPassChange1'],$_POST['DisUserPassChange2'])==0)
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
elseif (isset($_GET['recuptaux']) && isset($_GET['m']) && isset($_GET['a'])) 
{
	$reponse=$bdd->query('SELECT taux,district,obsérvation FROM svdc WHERE MONTH(date_envoi)=\''.strip_tags($_GET['m']).'\' AND YEAR(date_envoi)=\''.strip_tags($_GET['a']).'\'');
	$count=$reponse->rowCount();
	if($count>0)
	{
       $data=array();
       while($line=$reponse->fetch())
       {
       	 $data[]=$line;
       }
       sort($data);
       echo json_encode($data);

	}
}
elseif (isset($_GET['getmsitaux']) && isset($_GET['m']) && isset($_GET['a'])) 
{
	$reponse=$bdd->query('SELECT (SUM(c)+SUM(d))/(SUM(a)+SUM(b)) as msitaux FROM svdc WHERE MONTH(date_envoi)=\''.strip_tags($_GET['m']).'\' AND YEAR(date_envoi)=\''.strip_tags($_GET['a']).'\'');
	$count=$reponse->rowCount();
	if($count>0)
	{
       
     $line=$reponse->fetch();          
     echo $line['msitaux'];

	}
}

?>