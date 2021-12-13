<!DOCTYPE html>
<html>

<head>
  <title>Login Putin</title>

  <meta charset="UTF-8" />
  <style>
    body{
      text-align:center;
    }
  </style>

</head>

<body>
    
  <form method="POST" action="new_user.php">
      <br><input  name="nom" type="text" placeholder="Username"></br>
      <br><input name="mdp" type="password" placeholder="Password"></br> 
      <br><input type="submit" value="Create Account"></br>
</form>
<p>
<p>Rentrer depuis <a href="login1.html">votre compte</a></p>
</p>
</body>
<?php

  include('fonction.php');
  if (isset($_POST['nom']) && isset($_POST['mdp'])){
    $nom=$_POST['nom'];
    $password=md5($_POST['mdp']);
    add_user($nom, $password);
  };

?>
</html>