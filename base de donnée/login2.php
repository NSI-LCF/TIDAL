<?php session_start(); 
  include('conf.php');
  if ( isset($_POST["id_user"]) && isset($_POST["mdp"]) )
  {
      $id_user=$_POST["id_user"];
      $mdp=md5($_POST["mdp"]);
  
  $sql =" SELECT * FROM `utilisateur` WHERE `username` = '$id_user' and `password`= '$mdp'";
  $sth = $dbh->prepare($sql);
     $sth->execute(); 
     $users = $sth->fetchAll(); 

    if ($users)
    {

      $user = $les_users[0];
     $_SESSION ["id_user"]=$id_user;
     $_SESSION ["id"] = $user["id"];
     $_SESSION ["num_question"] = 0 ;
     $_SESSION ["score_partie"] = 0 ;
     
     header("Location: admin.html");

    }   
    else{
      print("erreur");
      header("Location: login1.html");
    }
  }  
