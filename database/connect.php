<?php

    require_once  'config.php';

    function connect($host,$db,$user,$password){
        $dsn = "mysql:host=$host;dbname=$db;charset=utf8";

        try{
            $pdo = new PDO ($dsn,$user,$password);

            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }catch(PDOException $e){
            echo "Connection failed: ". $e->getMessage();
            exit();
        }
    }
    
    $pdo = connect($host,$db,$user,$password);

    if($pdo){
        echo "connected to the $db successfully";
    }