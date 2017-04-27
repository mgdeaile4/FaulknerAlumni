<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require ($_SERVER["DOCUMENT_ROOT"].'/AlumniTracker/Model/Database.php');
class Model
{
    function __construct()
    {
        $this->db = new Database();
    }
}