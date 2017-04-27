<?php

/* 
 * Database connection
 * 
 * @author: Robert Vines
 */
    $connString = "mysql:host=localhost;dbname=alumnitracker";
    $user ="root";
    $pass ="root";
    
    try
    { 
        $pdo = new PDO($connString, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch (Exception $ex) 
    {
        echo "Connection Failed: " . $ex->getMessage();
    }
?>