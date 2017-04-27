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

<!-------- Show Accounts ------------------------------------------------------>
    <h3>Search Accounts</h3>
        <form method='post' action="AdminHome.php">
            <p><b>Role: </b>
                <select name="role">
                    <option></option>
                      <?php 
                          $sql = "SELECT DISTINCT Role FROM schoolemployee ORDER BY Role";
                          $result = $pdo->query($sql);

                          while ($val = $result->fetch()):

                          $deptName = $val['Role'];    
                          {
                              echo "<option>" . $deptName . "</option>";
                          }endwhile;
                      ?>
                      </select></p>
            <p><b>Last Name: </b><input type="text" name="LastName"></p>
            <p><input type="submit" value="Search"></p>
        </form>
        <table>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT FirstName, LastName, Role FROM schoolemployee "
                            . " ORDER BY FirstName, LastName ";
                    $result = $pdo->query($sql);

                    while($val=$result->fetch()):

                        $firstName = $val['FirstName'];
                        $lastName = $val['LastName'];
                        $role = $val['Role'];
                ?>
                <tr>
                    <td><?php echo $firstName; ?></td> 
                    <td><?php echo $lastName; ?></td>
                    <td><?php echo $role; ?></td>
                </tr>
            <?php
                endwhile;
            ?>
            </tbody>
        </table>
        </div>
        <div id="body" style=" width: 40%;">
            
<!---------- Show Alumni ------------------------------------------------------>
            <h3>Search Alumni</h3>
            <form method='post' action="AdminHome.php">
                <p><b>First Name: </b> <input type="text" name="FirstName" /></p>
                <p><b>Last Name: </b><input type="text" name="LastName"></p>
                <p><input type="submit" value="Search"></p>
            </form>
            <table id = "adminHomeAlumniTable">
                <thead>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Primary Email</th>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT FirstName, LastName, PrimaryEmail FROM person "
                            . " ORDER BY FirstName, LastName ";
                    $result = $pdo->query($sql);

                    while($val=$result->fetch()):

                        $firstName = $val['FirstName'];
                        $lastName = $val['LastName'];
                        $email = $val['PrimaryEmail'];
                ?>
                    <tr>
                        <td><?php echo $firstName; ?></td>
                        <td><?php echo $lastName; ?></td>
                        <td><?php echo $email; ?></td>
                    </tr>
                <?php
                    endwhile;
                ?>
                </tbody>
            </table>
            <?php

            ?>
    </div>
</div>
</body>
</html>