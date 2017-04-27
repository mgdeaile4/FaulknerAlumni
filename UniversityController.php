<?php
 
/* 
 * MySQL to edit information about a university.
 * 
 * @author: Robert Coleman
 */
         
    include($_SERVER["DOCUMENT_ROOT"]. '/AlumniTracker/Database/Config.php');    
           
    $uniId = $_GET['edit_id'];
    $uniName = $_POST['uniName'];

    if($uniID==Null)
    {
        $sql = "INSERT INTO university (UniName) VALUES ('".$uniName."')";
    }
    else 
    {
    $sql="UPDATE university "
         . "SET UniName= '".$uniName."' WHERE UniversityID=".$uniId;
    }
    $pdo->query($sql);           
    
    
    header("Location: /AlumniTracker/View/University.php");
?>