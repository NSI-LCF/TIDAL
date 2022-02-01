<?php     
        $dsn = 'mysql:host=109.111.109.101:443;dbname=tidal;charset=UTF8';
        $username = 'tidal';
        $password = 'TIDAL-db-2022';
        $dbh = new PDO($dsn, $username, $password) or die("Pb de connexion !");

