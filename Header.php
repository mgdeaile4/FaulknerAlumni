<?php

/* 
 * Page to add a certain header based on role.
 * 
 * @author: Robert Vines 
 */

    session_start();
    $session = $_SESSION[role];
    
    switch($session)
    {
        case 'Admin':
            include('AdminHeader.php');
            break;
        case 'Department Chair':
            include('ChairSecHeader.php');
            break;
        case 'Secretary':
            include('ChairSecHeader.php');
            break;
        case 'Dean':
            include('DeanHeader.php');
            break;
        default :
            header('location:Login.php');
            exit();
    }    
    
    include($_SERVER["DOCUMENT_ROOT"]. '/AlumniTracker/Database/Config.php');
?>