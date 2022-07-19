<?php     
        $db_port = getenv('MYSQL_PORT', true) ?: getenv('MYSQL_PORT');
        $db_name = getenv('MYSQL_DATABASE', true) ?: getenv('MYSQL_DATABASE');
        $db_user = getenv('MYSQL_USER', true) ?: getenv('MYSQL_USER');
        $db_pwd  = getenv('MYSQL_PASSWORD', true) ?: getenv('MYSQL_PASSWORD');

        $dsn = "mysql:host=mysql:{$db_port};dbname={$db_name};charset=UTF8";
        $dbh = new PDO($dsn, $db_user, $db_pwd) or die("Pb de connexion !");