<?php

/* 
 * MySQL to edit a specific department. 
 * 
 * @author: Robert Vines
 */
    
    include($_SERVER["DOCUMENT_ROOT"]. '/AlumniTracker/Database/Config.php');  
           
    $dept = $_GET['edit_dept'];
    $deptName = $_POST['DeptName'];
    $name = $_POST['DeptName'];

    if($dept !=NULL)
    {
    $sql="UPDATE department "
            . "SET DeptName= '".$name."' WHERE DepartmentID=".$dept;
    }
    else
       
    $sql="INSERT INTO department (DeptName)
          VALUES ('".$deptName."')";
    
    
    $pdo->query($sql);           

    header("Location: /AlumniTracker/View/Department.php");
?>