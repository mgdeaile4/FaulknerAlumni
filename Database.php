<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Database extends PDO 
{
    private $connString;
    private $dbname;
    private $user;
    private $pass;
    
    public function __construct()
    {
        $connString = "localhost";
        $dbname = "alumnitracker";
        $user ="root";
        $pass ="root";
        try
        {
            echo "Database construct";
            parent::_construct("mysql:host=$connString;dbname=$dbname,$user, $pass");
        } 
        catch (Exception $ex) 
        {
            echo $ex->getMessage();
        }
        
    }
}