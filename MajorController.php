<?php

/* 
 * MySQl to change the information about a major.
 * 
 * @author: Robert Vines
 */

    include($_SERVER["DOCUMENT_ROOT"]. '/AlumniTracker/Database/Config.php');
    
    $degreeID = $_GET['edit_major'];

    $type = $_POST['Type'];
    $major = $_POST['Major'];
    $college = $_POST['College'];
    $department = $_POST['Dept'];
    
    try
    { 
    $sql="SELECT DepartmentID FROM department WHERE DeptName='".$department."' ";
    $result = $pdo->query($sql);
    $val=$result->fetch();
    
    $deptID = $val['DepartmentID'];
    } 
    catch (Exception $ex) 
    {
        echo "Connection Failed: " . $ex->getMessage();
    }
    if($degreeID == NULL){
      $sql2 = "INSERT INTO degree (Type, Name, College, Department_DepartmentID)
             VALUES ('".$type."','".$major."','".$college."','".$deptID."')";
    }
    else {
    $sql2="UPDATE degree "
            . "SET Type='".$type."', Name='".$major."', College='".$college."', Department_DepartmentID='".$deptID."' "
            . " WHERE DegreeID=".$degreeID;
    }
    $pdo->query($sql2);

    header("Location: /AlumniTracker/View/Major.php");
?>