<?php
    session_start();
      /*if(!isset($_SESSION['submited'])  || ($_SESSION['profile']!='Administrateur' &&  $_SESSION['profile']!='Directeur')){
          header("location:login.php");
        }*/

 ?>
      
<!DOCTYPE html>
<html>
<head>
	<title >Administration</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style-admin.css">
	<link rel="shortcut icon" type="image/x-icon" href="stats.png" />
</head>
<body>
<?php include("static.php");
 echo "<h2 id=\"user\" >Connecté en tant que: <span style=\"font-style: italic;\">".strip_tags( $_SESSION['username'])."</span> . Nombre d'utilisateurs : <span style=\"font-style: italic;\">".strip_tags($_SESSION['count_bdd_users'])."</span><h1>";
?>
</body>
</html>
 