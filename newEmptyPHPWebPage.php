<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require ($_SERVER["DOCUMENT_ROOT"].'/AlumniTracker/Model/Database.php');
        function __construct()
        {
            $this->db = new Database();
        }
        echo $this->db->$connString;
        ?>
    </body>
</html>
