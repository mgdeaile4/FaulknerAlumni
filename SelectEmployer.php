<?php

/* 
 * Pop-up from create alumni page to add an employer.
 * 
 * @author: Robert Vines
 */

include($_SERVER["DOCUMENT_ROOT"]. '/AlumniTracker/Database/Config.php');
?>

<html>
    <head>
        <title>Faulkner Alumni Tracker</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/AlumniTracker/CSS/AlumniTracker.css" type="text/css"/>
    </head>
    <body>
        <table>
                <thead>
                    <tr>
                        <th>Employer Name</th>
                        <th>Employer Number</th>
                        <th>Employer Company</th>
                        <th>Employer Email</th>
                        <th> </th>
                    </tr>
                </theah>
                <tbody>
                    <?php
                        //get info from application
                        $pdo = new PDO($connString, $user, $pass);
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        $sql = "SELECT * FROM employer ORDER BY EmployerName";
                        $result = $pdo->query($sql);

                        while($val=$result->fetch()):

                        $empID = $val['EmployerID'];
                        $empName = $val['EmployerName'];    
                        $empNum = $val['EmployerNum'];
                        $empComp = $val['EmployerComp'];
                        $employerEmail = $val['EmployerEmail'];
                    ?>
                    <tr>
                        <td><?php echo $empName; ?></td>
                        <td><?php echo $empNum; ?></td>
                        <td><?php echo $empComp; ?></td>
                        <td><?php echo $employerEmail; ?></td>
                        <td><a><input type="submit" value="Add"></a></td>
                        <?php
                            endwhile;
                        ?>
                    </tr>
                </tbody>
            </table>
    </body>
</html>