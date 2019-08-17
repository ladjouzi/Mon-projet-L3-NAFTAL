<?php
    session_start();     
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login-page</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="shortcut icon" type="image/x-icon" href="stats.png" />
</head>
<body>
 <div class="logo">
 	<img src="logo.png" alt="logo naftal">
    <h1>GPL-Procéssus<br> Moyen Et Systéme d'information</h1>
 </div>
 <div class="box">
 	 <img src="avatar.png" alt="avatar" class="avatar">
 	 <h1>Connexion</h1>
                     	 <form method="post" action="redirection.php">
                     	 	  <div class="inputbox">
                     	 		   <input type="text" name="username" required="" autocomplete="off">
                     	 		   <label>Nom d'utilisateur</label>
                          </div>
                     	 	  <div class="inputbox">
                     	 		   <input type="password" name="password"  required="">
                     	 		   <label>Mot de pass</label>
                     	 	  </div>
                     	 	  <div class="selectionbox">
                     	 	      <label for="profile">Profil</label><br />
                                  <select name="profile" id="profile">
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
                     	    <input type="checkbox" name="remember-me" id="remember-me"> <label for="remember-me">Remember me</label>
                     	 	  <a href="" id="countForget">Nom ou mot de pass oublié ?</a>
                          <input type="submit" name="submit" value="Entrer" id="button">
                        </form>

 </div>
 <script type="text/javascript">

(function () 
{
     var countForget=document.getElementById('countForget');
     countForget.addEventListener('click',function () {
        alert('Vous devez contacter l\'administrateur pour récupérer votre mot de passe ou créer un nouveau compte !'); 
     });

})();
  
 </script>
</body>
</html>
<?php
 session_destroy();     
?>

  
    