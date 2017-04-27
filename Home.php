<?php
/* 
 * Home page for an admin
 * 
 * @author: Robert Vines
 */
    
    include ('Header.php');
?>
<div id="page">
    <p>
    <h1><?php session_start();
            $fName = $_SESSION[fName];
            $lName = $_SESSION[lName];
            echo 'Hello '. $fName .' '. $lName .','; 
            ?></h1>
    </p>
    <div id='body' style=" float:left; width: 40%;">
<body>
    <div id="page">
        <div id="body">
            <label class="title">
                <h1> <?php session_start();
                    $fName = $_SESSION[fName];
                    $lName = $_SESSION[lName];
                    $role = $_SESSION[role];
                    echo 'Hello '. $fName .' '. $lName .','; 
                ?></h1>
            </label>
          <?php
         
       
                //Show Alumni
                echo "
                    
                     <div id='body' style='width: 40%;'>
            <table id = 'adminHomeAlumniTable'>
                <thead>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Primary Email</th>
                </thead>
                <tbody>";
                 $sql = "SELECT FirstName, LastName, PrimaryEmail FROM person "
                            . " ORDER BY FirstName, LastName ";
                    $result = $pdo->query($sql);
                     while($val=$result->fetch()):
                        $firstName = $val['FirstName'];
                        $lastName = $val['LastName'];
                        $email = $val['PrimaryEmail'];
                echo "
                   <tr>
                        <td>".$firstName."</td>
                        <td>".lastName."</td>
                        <td>". $email."</td>
                    </tr>
                  ";
                 
                  endwhile;
                  echo "
                        </tbody>
                        </table>
                        </div>";
              
          
        
            ?>
</body>
