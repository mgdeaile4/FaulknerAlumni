<?php

/* 
 * Page that starts login session and verifies login information
 * 
 * @author: Robert Vines
 */

    // Start Session because we will save some values to session varaible.
    ob_start();    
    session_start();
    // include config file for php connection
    include($_SERVER["DOCUMENT_ROOT"]. '/AlumniTracker/Database/Config.php');
    // memebers table name
    $tbl_name="login";
    
    // Define $myusername and $mypassword
    $myusername=$_POST['UserName']; 
    $mypassword=$_POST['Password']; 
    
    // To protect MySQL injection
    $myusername = stripslashes($myusername);
    $mypassword = stripslashes($mypassword);
    $myusername = mysql_real_escape_string($myusername);
    $mypassword = mysql_real_escape_string($mypassword);
    
    //below query will check username and password exists in system or not  
    $sql="SELECT * FROM ".$tbl_name." WHERE UserName='".$myusername."' AND Password='".$mypassword."';";
    $result = $pdo->query($sql);
    
    // Mysql_num_row is used for counting table records
    $count = $result->rowCount();
     
    // If result matched $myusername and $mypassword, table record must be equal to 1 	
    if($count==1)
    {
        $sql2="SELECT schoolemployee.FirstName, schoolemployee.LastName, schoolemployee.Role, "
                . " login.UserName, login.Password "
                            . "FROM schoolemployee "
                            . "JOIN login "
                            . "ON schoolemployee.Login_LoginID = login.LoginID "
                            . "WHERE login.UserName='".$myusername."' ";
        $row=$pdo->query($sql2);

        $val=$row->fetch();
        
        $fName = $val['FirstName'];
        $lName = $val['LastName'];
        $role = $val['Role'];
        //$deptName = $val['DeptName'];
            
            $_SESSION[fName]=$fName;
            $_SESSION[lName]=$lName;
            $_SESSION[role]=$role;
            //$_SESSION[deptName]=$deptName;

            echo $_SESSION['role'];
    //Depending on type of user we will redirect to various pages		
            if($role == 'Admin')	 
                { header( "location:Home.php"); 	}
            else if($role == 'Department Chair')	 
                { header( "location:Home.php"); }
            else if($role == 'Secretary')	 
                { header( "location:Home.php"); }
            else if($role == 'Dean')	 
                { header( "location:Home.php"); 	}
            else    
                { header( "location:Login.php");      }
    }
    else
    {
            header("location:Login.php?msg=failed");
    }
    
    ob_end_flush();
?>