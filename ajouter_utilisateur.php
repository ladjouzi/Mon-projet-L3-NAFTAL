<?php
  session_start();
if(!isset($_SESSION['submited'])  || ($_SESSION['profile']!='Administrateur' &&  $_SESSION['profile']!='Directeur'))
{
   header("location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Administration</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style-admin.css">
	<link rel="shortcut icon" type="image/x-icon" href="stats.png"/>
</head>
<body>
<?php include("static.php");
echo "<h2 id=\"user\" >Connecté en tant que: <span style=\"font-style: italic;\">".strip_tags( $_SESSION['username'])."</span> . Nombre d'utilisateurs : <span id=\"bddcount\" style=\"font-style: italic;\">".strip_tags($_SESSION['count_bdd_users'])."</span><h1>";
?>
	<div class="conteneur_add_user">
		<h1>Ajouter un comtpe</h1>
		<form method="post" action="ajouter_utilisateur.php" id="myForm"> <!**************>
			<div class="inputbox">
				<input type="text" name="username"  required="" id="username" autocomplete="off"> 
				<label>Nom d'utilisateur</label>

			</div>
		    <div class="inputbox">
		    	<input type="password" name="password1" required="" id="pwd1">
		    	<label>Mot de passe</label>
		    </div>
		    <div class="inputbox">
		    	<input type="password" name="password2"  required="" id="pwd2">
		    	<label>Confirmation</label>
		    </div>
		    <div class="selectionbox" id="selection">
 	 	      <label for="profile">Profil</label><br />
              <select name="profile" id="profile">
              	                        <option value="none">Selectionner le profil</option>
                                       <optgroup label="BRANCHE">
                                                <option value="Administrateur">Administrateur</option>
                                                <option value="Directeur">Directeur</option>
                                                <option value="Branche">Branche</option>
                                       </optgroup>
                                       <optgroup label="DISTRICT">
                                                <option value="D.Alger">D.Alger</option>
                                                <option value="D.Bejaia">D.Bejaia</option>
                                                <option value="D.Oran">D.Oran</option>
                                                <option value="D.Constantine">D.Constantine</option>
                                                <option value="D.Telemcen">D.Telemcen</option>
                                                <option value="D.Bordj bou arreridj">D.Bordj bou arreridj</option>
                                                <option value="D.Batna">D.Batna</option>
                                                <option value="D.Béchar">D.Béchar</option>
                                        </optgroup>
              </select>
 	  		</div>
 	  		<input type="submit" name="submit" value="Entrer" id="button">
		</form>
	</div>
</body>
<script type="text/javascript">
					var check={};
					check['username']=function()
								{
									var username=document.getElementById('username'),
									    usernameLabel=username.nextElementSibling;
							            if(username.value.length<6 || username.value.length>24)
							            {   
							            	usernameLabel.innerHTML="Nom d'utilisateur : <span>Minimum 6 caractères - Maximum 24 caractères</span>";
							            	usernameLabel.lastChild.style.color='red';
							            	return false;
							            }
							         
							            	usernameLabel.innerHTML="Nom d'utilisateur";
							                return true;

								};
					check['pwd1']=function()
								{
								   var password=document.getElementById('pwd1'),
								   passwordLabel=password.nextElementSibling;
								   if(password.value.length<8)
								   {
                                       passwordLabel.innerHTML="Mot de passe : <span>Minimum 8 caractères - Maximum 24 caractères</span>";
                                       passwordLabel.lastChild.style.color='red';
                                       return false;
								   }
								   
								   
                                            passwordLabel.innerHTML="Mot de passe";
								   	        return true;
								};
					check['pwd2']=function()
									{
										 var password2=document.getElementById('pwd2'),
										     password1=document.getElementById('pwd1'),
										  passwordLabel=password2.nextElementSibling;
										  if(password2.value!=password1.value || password1.value=='')
										  {
				                             passwordLabel.innerHTML="Confirmation : <span>Les mots de passe sont différents</span>";
				                             passwordLabel.lastChild.style.color='red';
				                             
										  	 return false;
										  }
										  else
										  {
										  	passwordLabel.innerHTML="Confirmation ";
										  	return true;
										  }
									};
					check['profile']=function ()
					 {
					        var select=document.getElementById('profile'),
					        selectLabel=document.querySelector('label[for=profile]');
                            if(select.options[select.selectedIndex].value=='none')
                            {

                            	selectLabel.innerHTML="Profil : <span>vous devez selectionner un profil d'utilisateur !</span>";
                            	selectLabel.lastChild.style.color='#C40000';
                            	return false;
                            }
                            else
                            {
                            	selectLabel.innerHTML="Profil";
                            	return true;
                            }
					 };	
   (function () {
	     	var events=document.querySelectorAll('input[type=text],input[type=password]'),
	     	myForm=document.getElementById('myForm'),result;

	     	for(var i=0;i<events.length;i++)
	     	{
	     		events[i].addEventListener('keyup',function(e){
                 check[e.target.id]();
	     		});
	     	}
		   myForm.addEventListener('submit',function(e){
		   	 result=true;
             for(var id in check)
             {
               result=check[id]() && result; 
             }
             if (result) 
             {
             	 myForm.submit();
             }
             e.preventDefault();
           
		   });

     })();  	
</script>
</html>
<?php
// Connexion à la base de données
if(isset($_POST['submit']))
{
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exception $e)
	{
	        die('General Error : the user could not be added '.$e->getMessage());
	}
	

	$req = $bdd->prepare('INSERT INTO membres (user, password, profile,date_inscription) VALUES(?, ?, ?, NOW())');

	if($_POST['password1'] == $_POST['password2'] )
	{   	
		try {
			 $req->execute(array($_POST['username'], md5($_POST['password1']),$_POST['profile']));	
		      echo '<div class="operation_succes">Opération Réussie<img src="check-mark.png" alt="check-mark"></div>';
		      $_SESSION['count_bdd_users']++;
		} catch (PDOException $e) {
			   echo '<div class="operation_fail">Nom d\'utilisateur déja pris.<img src="croix.png" alt="cross"></div>';
		}
	}
	else
	{
        echo '<div class="operation_fail">Mot de passe différent<img src="croix.png" alt="cross"></div>';
	}
   
  /*header("location:ajouter_utilisateur.php");*/
		
}


?>
 