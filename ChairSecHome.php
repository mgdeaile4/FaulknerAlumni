<?php
/* 
 * Home page for secretary and department chair.
 * 
 * @author: Robert Vines
 */

    include('Header.php');
?>

<div id='page'>
    <h1><?php session_start();
            $fName = $_SESSION[fName];
            $lName = $_SESSION[lName];
            echo 'Hello '. $fName .' '. $lName .','; ?></h1>
        <div id="body">
          
          <p><a href="CreateAlumni.php"><button id="button">Add Alumni</button></a></p>
            <table>
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>First Name</th>
                        <th>Month Graduated</th>
                        <th>Year Graduated</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT person.FirstName, person.LastName, graduated.MonthGraduated, "
                        . "graduated.YearGraduated FROM person "
                        . "JOIN graduated "
                        . "ON graduated.Person_PersonID = person.PersonID ";
                        $result = $pdo->query($sql);

                        while($val=$result->fetch()):

                        $firstName= $val['FirstName'];
                        $lastName= $val['LastName'];   
                        $monthGrad = $val['MonthGraduated'];
                        $yearGrad = $val['YearGraduated'];
                    ?>
                    <tr>
                        <td><?php echo $firstName; ?></td>
                        <td><?php echo $lastName; ?></td>
                        <td><?php echo $monthGrad; ?></td>
                        <td><?php echo $yearGrad; ?></td>
                        <?php
                            endwhile;
                        ?>
                    </tr>
                </tbody>
            </table>
    </div>
</div>
</body>
</html>