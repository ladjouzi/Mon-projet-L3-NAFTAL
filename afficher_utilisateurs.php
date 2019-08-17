<?php
    session_start();
    if(!isset($_SESSION['submit']) && !isset($_SESSION['id'])) {
          header("location:login.php");
        }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Administration</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style-admin.css">
</head>
<body>

	<?php include("static.php");
		echo "<h2 id=\"user\" >Connecté en tant que: <span style=\"font-style: italic;\">".strip_tags( $_SESSION['username'])."</span> . Nombre d'utilisateurs : <span style=\"font-style: italic;\">".strip_tags($_SESSION['count_bdd_users'])."</span><h1>";
	?>

     <div id="all_users_container">
                 
          <form class="search-box" method="post" action="afficher_utilisateurs.php"> 
                                  <div class="filter-radio">
                                       <h3>Par :</h3>
                                       <div class="radio-box">
                                                 <input type="radio" name="choose" value="user-filter" id="user-filter" checked title="filtrage par défaut utilisateur , ecrire dans la barre de recherche le nom d'utilisateur"><label for="user-filter">Utilisateur</label>
                                                 <input type="radio" name="choose" value="profile-filter" id="profile-filter" title="Filtrage par profile ecrire dans la barre de recherche le nom de profile ex:administrateur"><label for="profile-filter">Profile</label>
                                       </div>
                                        <input class="date-filter" type="Date" name="date-filter" title="Date d'inscription">
                                  </div>
                                  <div class="search-bar">
                                       <input class="search-txt" type="text" name="search" placeholder="Nom d'utilisateur / Nom profile" autocomplete="off">
                                       <a class="search-btn" href="login.php">
                                          <input type="submit" name="rechercher" value="">
                                          <img class="search-img"  src="search-icon.png" alt="loupe">
                                      </a>
                                  </div>
          </form>
             
         		<table>
               	 	 <caption>LISTE DES UTILISATEURS</caption>
               	 	 <tr>
               	     	<th>User</th>
               	     	<th>Password</th>
               	     	<th>Profile</th>
               	     	<th>Date d'inscription</th>
               	     	<th>Dérniere connexion</th>
               	   </tr>
<?php
if( (isset($_POST['SUIVANT']) || isset($_POST['REVENIR'])))
{
      switch ($_SESSION['browsing-identifier']) 
      {
         case 1:

                                        $reponse = $bdd->query('SELECT * FROM membres WHERE user=\''.$_SESSION['search'].'\' LIMIT '.$_SESSION['BEG'].',22'); 
                   
                                        while($line = $reponse->fetch())
                                          {echo '
                                            <tr>
                                                <td>'.$line['user'].'</td>
                                                <td>'.$line['password'].'</td>
                                                <td>'.$line['profile'].'</td>
                                                <td>'.$line['date_inscription'].'</td>
                                                <td>'.$line['date_last_connexion'].'</td>
                                            </tr>
                                            ';
                                          }
                                     
                               
          break;
          case 2:
                                               
                                       $reponse = $bdd->query('SELECT * FROM membres WHERE  user=\''.$_SESSION['search'].'\' AND date_inscription=\''.$_SESSION['date-filter'].'\' LIMIT '.$_SESSION['BEG'].',22'); 
                       
                              
                                        while($line = $reponse->fetch())
                                          {echo '
                                            <tr>
                                                <td>'.$line['user'].'</td>
                                                <td>'.$line['password'].'</td>
                                                <td>'.$line['profile'].'</td>
                                                <td>'.$line['date_inscription'].'</td>
                                                <td>'.$line['date_last_connexion'].'</td>
                                            </tr>
                                            ';
                                          }
                             
          break;
          case 3:
                                       $reponse = $bdd->query('SELECT * FROM membres WHERE profile=\''.$_SESSION['search'].'\' LIMIT '.$_SESSION['BEG'].',22'); 
            
                             
                                        while($line = $reponse->fetch())
                                          {echo '
                                            <tr>
                                                <td>'.$line['user'].'</td>
                                                <td>'.$line['password'].'</td>
                                                <td>'.$line['profile'].'</td>
                                                <td>'.$line['date_inscription'].'</td>
                                                <td>'.$line['date_last_connexion'].'</td>
                                            </tr>
                                            ';
                                          }
                             
          break;
          case 4:
                                        $reponse = $bdd->query('SELECT * FROM membres WHERE  profile=\''.$_SESSION['search'].'\' AND date_inscription=\''.$_SESSION['date-filter'].'\' LIMIT '.$_SESSION['BEG'].',22'); 
                   
                                        while($line = $reponse->fetch())
                                            {echo '
                                            <tr>
                                                <td>'.$line['user'].'</td>
                                                <td>'.$line['password'].'</td>
                                                <td>'.$line['profile'].'</td>
                                                <td>'.$line['date_inscription'].'</td>
                                                <td>'.$line['date_last_connexion'].'</td>
                                            </tr>
                                            ';
                                            }  
                             
          break;
          case 5:
                             $reponse = $bdd->query('SELECT * FROM membres WHERE  date_inscription=\''.$_SESSION['date-filter'].'\' LIMIT '.$_SESSION['BEG'].',22'); 
                         
                                                      while($line = $reponse->fetch())
                                                      {
                                                        echo '
                                                          <tr>
                                                              <td>'.$line['user'].'</td>
                                                              <td>'.$line['password'].'</td>
                                                              <td>'.$line['profile'].'</td>
                                                              <td>'.$line['date_inscription'].'</td>
                                                              <td>'.$line['date_last_connexion'].'</td>
                                                          </tr>
                                                          ';
                                                      }  
                                                   
          break;
          case 6:
                             $reponse = $bdd->query('SELECT * FROM membres LIMIT '.$_SESSION['BEG'].',22');  
                        
                              
                                                      while($line = $reponse->fetch())
                                                      {
                                                        echo '
                                                          <tr>
                                                              <td>'.$line['user'].'</td>
                                                              <td>'.$line['password'].'</td>
                                                              <td>'.$line['profile'].'</td>
                                                              <td>'.$line['date_inscription'].'</td>
                                                              <td>'.$line['date_last_connexion'].'</td>
                                                          </tr>
                                                          ';
                                                      }
                              
          break;
        default:
                             $reponse = $bdd->query('SELECT * FROM membres LIMIT '.$_SESSION['BEG'].',22'); 
                             /*$reponse->rowCount();
                             $count=$reponse->rowCount();
                             if($count==0 && $_SESSION['BEG']>0 )
                              {
                                $_SESSION['BEG']-=22;
                                echo "BCL :".$_SESSION['BEG'];

                              }*/
                                         while($line = $reponse->fetch())
                                         {
                                             echo '
                                             <tr>
                                             <td>'.$line['user'].'</td>
                                             <td>'.$line['password'].'</td>
                                             <td>'.$line['profile'].'</td>
                                             <td>'.$line['date_inscription'].'</td>
                                             <td>'.$line['date_last_connexion'].'</td>
                                             </tr>
                                                ';
                                         }
                             
        break;
      }
}        
else          
{ 
     if (isset($_POST['choose']))
      {  
         $_SESSION['BEG']=0;/*remetre le compteur de browsing de la page a 0 a chaque nouvelle recherche*/
         /*!empty searche*/
                      if (!empty($_POST['search']))
                      { /* utilisateur est toujours selectionner par défaut attention donc isset ne sera pas dispo just pour la premiere generation de la page*/
                        /*user + nodate*/
                               if($_POST['choose']=='user-filter' && empty($_POST['date-filter'])) //1
                               {           
                                       $reponse = $bdd->query('SELECT * FROM membres WHERE user=\''.$_POST['search'].'\' LIMIT '.$_SESSION['BEG'].',22'); 
                                       $reponse->rowCount();
                                       $count=$reponse->rowCount();
                                        if($count>0)
                                        {
                                        
                                        
                                                  while($line = $reponse->fetch())
                                                    {echo '
                                                      <tr>
                                                          <td>'.$line['user'].'</td>
                                                          <td>'.$line['password'].'</td>
                                                          <td>'.$line['profile'].'</td>
                                                          <td>'.$line['date_inscription'].'</td>
                                                          <td>'.$line['date_last_connexion'].'</td>
                                                      </tr>
                                                      ';
                                                    }
                                                    $_SESSION['browsing-identifier']=1; //pour le choix de case
                                                    $_SESSION['search']=$_POST['search'];  //por sauvgarder me search a ma prochaine exécution psk $_POST sera détruite
                                           }

                               }
                        /*user + date*/       
                               elseif ($_POST['choose']=='user-filter' && !empty($_POST['date-filter'])) //2
                               {
                                        $reponse = $bdd->query('SELECT * FROM membres WHERE  user=\''.$_POST['search'].'\' AND date_inscription=\''.$_POST['date-filter'].'\' LIMIT '.$_SESSION['BEG'].',22');
                                      $reponse->rowCount();
                                       $count=$reponse->rowCount();
                                  if($count>0)
                                  {
                                        while($line = $reponse->fetch())
                                          {echo '
                                            <tr>
                                                <td>'.$line['user'].'</td>
                                                <td>'.$line['password'].'</td>
                                                <td>'.$line['profile'].'</td>
                                                <td>'.$line['date_inscription'].'</td>
                                                <td>'.$line['date_last_connexion'].'</td>
                                            </tr>
                                            ';
                                          }
                                          $_SESSION['browsing-identifier']=2;
                                           $_SESSION['search']=$_POST['search'];
                                            $_SESSION['date-filter']=$_POST['date-filter'];
                                  }
                               }
                        /*profile+nodate*/
                               elseif ($_POST['choose']=='profile-filter' && empty($_POST['date-filter'])) //3
                               { /*type date peut etre verifié par empty seulement*/
                                         
                                        $reponse = $bdd->query('SELECT * FROM membres WHERE profile=\''.$_POST['search'].'\' LIMIT '.$_SESSION['BEG'].',22'); 
                                         $reponse->rowCount();
                                       $count=$reponse->rowCount();
                                if($count>0)
                                {
                                        while($line = $reponse->fetch())
                                          {echo '
                                            <tr>
                                                <td>'.$line['user'].'</td>
                                                <td>'.$line['password'].'</td>
                                                <td>'.$line['profile'].'</td>
                                                <td>'.$line['date_inscription'].'</td>
                                                <td>'.$line['date_last_connexion'].'</td>
                                            </tr>
                                            ';
                                          }
                                    $_SESSION['browsing-identifier']=3;
                                    $_SESSION['search']=$_POST['search'];
                                  }
                               } 
                         /*profile+date*/           
                               elseif ($_POST['choose']=='profile-filter' && !empty($_POST['date-filter'])) //4
                               {       
                                        $reponse = $bdd->query('SELECT * FROM membres WHERE  profile=\''.$_POST['search'].'\' AND date_inscription=\''.$_POST['date-filter'].'\' LIMIT '.$_SESSION['BEG'].',22'); 
                                         $reponse->rowCount();
                                       $count=$reponse->rowCount();
                                        if($count>0)
                                        {
                                              while($line = $reponse->fetch())
                                                {echo '
                                                  <tr>
                                                      <td>'.$line['user'].'</td>
                                                      <td>'.$line['password'].'</td>
                                                      <td>'.$line['profile'].'</td>
                                                      <td>'.$line['date_inscription'].'</td>
                                                      <td>'.$line['date_last_connexion'].'</td>
                                                  </tr>
                                                  ';
                                                }  
                                                 $_SESSION['browsing-identifier']=4; 
                                                 $_SESSION['date-filter']=$_POST['date-filter']; 
                                        } 
                               }           
                       }
                      else
                       {  
                          if (empty($_POST['search'])) 
                             { /* ici $_POST['choose'] est tjr set*/ /* ici pas de post[search]*/
                                 
                                            if(!empty($_POST['date-filter']) )  //5
                                             {
                                                 
                                                      $reponse = $bdd->query('SELECT * FROM membres WHERE  date_inscription=\''.$_POST['date-filter'].'\' LIMIT '.$_SESSION['BEG'].',22');  
                                                 $reponse->rowCount();
                                                 $count=$reponse->rowCount();
                                                  if($count>0)
                                                  {
                                                      while($line = $reponse->fetch())
                                                      {
                                                        echo '
                                                          <tr>
                                                              <td>'.$line['user'].'</td>
                                                              <td>'.$line['password'].'</td>
                                                              <td>'.$line['profile'].'</td>
                                                              <td>'.$line['date_inscription'].'</td>
                                                              <td>'.$line['date_last_connexion'].'</td>
                                                          </tr>
                                                          ';
                                                      }

                                                      $_SESSION['browsing-identifier']=5;
                                                      $_SESSION['date-filter']=$_POST['date-filter'];
                                                  }
                                             }
                                             elseif(empty($_POST['date-filter'])) //6
                                             {
                                                           $reponse = $bdd->query('SELECT * FROM membres LIMIT '.$_SESSION['BEG'].',22');  
                                                           $reponse->rowCount();
                                                           $count=$reponse->rowCount();
                                                            if($count>0)
                                                            {
                                                                          while($line = $reponse->fetch())
                                                                          {
                                                                            echo '
                                                                              <tr>
                                                                                  <td>'.$line['user'].'</td>
                                                                                  <td>'.$line['password'].'</td>
                                                                                  <td>'.$line['profile'].'</td>
                                                                                  <td>'.$line['date_inscription'].'</td>
                                                                                  <td>'.$line['date_last_connexion'].'</td>
                                                                              </tr>
                                                                              ';
                                                                          }
                                                                          $_SESSION['browsing-identifier']=6;
                                                            }
                                              }
                                  
                            }
       
                        }
      }
     else
      {   
       $reponse = $bdd->query('SELECT * FROM membres LIMIT '.$_SESSION['BEG'].',22'); 
       while($line = $reponse->fetch())
       {
           echo '
           <tr>
           <td>'.$line['user'].'</td>
           <td>'.$line['password'].'</td>
           <td>'.$line['profile'].'</td>
           <td>'.$line['date_inscription'].'</td>
           <td>'.$line['date_last_connexion'].'</td>
           </tr>
              ';
       }
       $_SESSION['browsing-identifier']=0;

      }  
}


?>

                       	 	</table>

                       	<nav class="browse">
                            <form method="post" action="afficher_utilisateurs.php">
                              <input type="submit" name="REVENIR" value="REVENIR">
                              <input type="submit" name="SUIVANT" value="SUIVANT">
                            </form>

                       	</nav>

   </div>
</body>
</html>