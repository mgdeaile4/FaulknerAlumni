<?php

/* 
 * MySQL to change information about account.
 * 
 * @author: Robert Vines
 */

    include($_SERVER["DOCUMENT_ROOT"]. '/AlumniTracker/Database/Config.php');

    $employeeId = $_GET['edit_account'];
    $firstName = $_POST['FirstName'];
    $lastName = $_POST['LastName'];
    $email = $_POST['Email'];
    $role = $_POST['Role'];
    //$deptName = $_POST['DeptName'];
    $userName = $_POST['UserName'];
    $password = $_POST['Password'];
    
    $sql2="UPDATE schoolemployee, login "
            . "SET schoolemployee.FirstName='".$firstName."', schoolemployee.LastName='".$lastName."', "
            . "schoolemployee.Email='".$email."', schoolemployee.Role='".$role."', "
            . "login.UserName='".$userName."', "
            . "login.Password='".$password."' "
            . "WHERE schoolemployee.Login_LoginID = login.LoginID AND EmployeeID='".$employeeId."';";
    $pdo->query($sql2);

    header("Location: /AlumniTracker/View/Account.php");
?>