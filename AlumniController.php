<?php
 
/* 
 * Send CreateAlumni information to specific tables in the database.
 * 
 * @author: Robert Vines
 */

/*Show all values in post array*/
//    echo "<pre>";
//    print_r($_POST);
//    echo "</pre>";

    include($_SERVER["DOCUMENT_ROOT"]. '/AlumniTracker/Database/Config.php');
    $personID = $_GET['PersonID'];
    //Store form information in variables
    $firstName = $_POST['FirstName'];
    $middleName = $_POST['MiddleName'];
    $lastName = $_POST['LastName'];
    $cell = $_POST['CellNum'];
    $home = $_POST['HomeNum'];
    $work = $_POST['WorkNum'];
    $primEmail = $_POST['FirstEmail'];
    $secEmail = $_POST['SecondEmail'];
    $tracked = $_POST['Tracked'];
    $street = $_POST['Street'];
    $city = $_POST['City'];
    $state = $_POST['State'];
    $country = $_POST['Country'];
    $zip = $_POST['Zip'];
    $degreeType = $_POST['DegreeType'];
    $major = $_POST['Major'];
    $minor = $_POST['Minor'];
    $monthGrad = $_POST['MonthGrad'];
    $yearGrad = $_POST['YearGrad'];
    $currentJob = $_POST['CurrentJob'];
    $inField = $_POST['Field'];
    $employerName = $_POST['EmployerName'];
    $employerNum = $_POST['EmployerNum'];
    $employerComp = $_POST['EmployerComp'];
    $employerEmail = $_POST['EmployerEmail'];
    $applied = $_POST['Applied'];
    $accepted = $_POST['Accepted'];
    $status = $_POST['Status'];
    $schoolName = $_POST['SchoolName'];
    
    if($personID==NULL)
       {
            try
            {
                $sql=$pdo->prepare("INSERT INTO Person (FirstName, MiddleName, LastName, PrimaryEmail, SecondEmail, Tracked)
                 VALUES ('".$firstName."', '".$middleName."', '".$lastName."', '".$primEmail."', '".$secEmail."', '".$tracked."')");
            
            $sql->execute();
            }
            catch(Exception $ex)
        
            {
            echo $ex->getMessage();
            }
            
                       
    } else
        {
            try
        {
        $sql="UPDATE Person "
            . "SET FirstName= '".$firstName."', MiddleName= '".$middleName."', LastName= '".$lastName."', "
            . "PrimaryEmail= '".$primEmail."', SecondEmail= '".$secEmail."', Tracked= '".$tracked."'" 
            . "WHERE PersonID='".$personID."';";
        
        $sql->execute();
        }
        catch (Exception $ex)
        {
        }
        }
    //send page back to Alumni.php
    header("Location: /AlumniTracker/View/Alumni.php");

