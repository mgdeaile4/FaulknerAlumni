<?php
 
/* 
 * Send employer info to database.
 * 
 * @author: Robert Coleman
 */
    //require ($_SERVER["DOCUMENT_ROOT"].'/AlumniTracker/Model/EmployerClass.php');
    include($_SERVER["DOCUMENT_ROOT"]. '/AlumniTracker/Database/Config.php');
    echo 'I am in Employer Controller';
      $empID = $_GET['edit_id'];  
     //data from CreateEmployer form
    $empName = $_POST['EmpName'];
    $empNum = $_POST['EmpNum'];
    $empComp = $_POST['EmpComp'];
    $empEmail = $_POST['EmpEmail'];
    //$empClass = new EmployerClass($empName, $empNum, $empComp, $empEmail);
    //echo $empClass->getName();
            
    if($empID==NULL)
        {
            try
            {
                $sql=$pdo->prepare("INSERT INTO employer (EmployerName, EmployerNum, EmployerComp, EmployerEmail)
                VALUES ('".$empName."', '".$empNum."', '".$empComp."', '".$empEmail."')");
            
            $sql->execute();
        }
        catch (Exception $ex)
        {
            echo $ex->getMessage();
        }
        
            //$empClass->createEmployer();
            
    } else
        {
            try
        {
        $sql="UPDATE employer "
            . "SET EmployerName= '".$empName."', EmployerNum= '".$empNum."', EmployerComp= '".$empComp."', "
            . "EmployerEmail= '".$empEmail."' "
            . "WHERE EmployerID='".$empID."';";
        
        $sql->execute();
        }
        catch (Exception $ex)
        {
            echo $ex->getMessage();
        }
            
            //$empClass->setID($empID);
            //$empClass->updateEmployer();
            
            
        }
    //$pdo->exec($sql);
    
    header("Location: /AlumniTracker/View/Employer.php");
?>
