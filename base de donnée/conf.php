<?php     
        $dsn = 'mysql:host=localhost;dbname=panneau;charset=UTF8';
        $username = 'root';
        $password = '';
        $dbh = new PDO($dsn, $username, $password) or die("Pb de connexion !");
?>   
    
   