<?php
    
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=zooproject;charset=utf8', 'root', '' ,array( 
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING  
        ));
      
    }catch(Exception $e)
    {
        die('Erreur' .$e->getMessage());
    }