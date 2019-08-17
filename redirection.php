<?php
session_start();
    if( isset($_POST['submit']) && isset($_POST['username']) && isset($_POST['password']) )
      {
              try
              {
                $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
              }
              catch(Exception $e)
              {
                      die('Erreur : '.$e->getMessage());
              }
            
            try{
            $req = $bdd->prepare('SELECT user FROM membres WHERE user=? AND password=? AND profile=?');
            $req->execute(array($_POST['username'],md5($_POST['password']),$_POST['profile']));
             }
            catch(PDOException $e)
            {
              header("location:login.php");
            }

            if (($req->rowCount())==0)
            {
               header("location:login.php");
               /*$_SESSION['nbr_tentative']++;*/
            }
            else
            {
               $_SESSION['username']=$_POST['username'];
               $_SESSION['submited']=$_POST['submit'];
               $_SESSION['profile']=$_POST['profile'];
              // $_SESSION['id']='true'; /*bache maywaliche login en cliquant sur page d'acceuil*/
              $bdd->exec('UPDATE membres SET date_last_connexion=NOW() WHERE user=\''.$_POST['username'].'\'');
              if (isset($_POST['remember-me'])) {
                setcookie('username', $_POST['username'] ,time()+60*60*7);
               }
              if($_POST['profile']=='Administrateur')
              {            
                 header("location:http://localhost/projet/administration.php");
              }
              elseif(stripos($_POST['profile'],"D.")===0)
              {
                 header("location:http://localhost/projet/district/svdc.php");
              }
              elseif($_POST['profile']=='Branche')
              {
                 header("location:http://localhost/projet/branche/branche.php");
              }
              elseif($_POST['profile']=='Directeur')
              {
                header("location:http://localhost/projet/directeur/Directeur.php");
              }
              /*************** ici ajouter les autres directions ************/
              
            }


      }elseif (!isset($_POST['submit']) && !isset($_SESSION['id'])) {
          header("location:login.php");
      }   


        $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
        $reponse2= $bdd->query('SELECT count(*) as users_count FROM membres');
        $line2=$reponse2->fetch();     
        $_SESSION['count_bdd_users']=$line2['users_count'];
        
?>