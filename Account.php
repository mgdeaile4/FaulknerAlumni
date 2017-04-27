<?php
/*
 * Display Accounts to edit and delete them.
 *
 * @author Robert Vines
 */
   
    include('Header.php');
?>
<script type="text/javascript">
//    javascript to show/hide information table
    $(document).ready(function ()) 
        {
            $('#information').hide();
            
            $('#view').scrollTop(0);  
       });
</script>

<?php
    //delete specific account
    if(isset($_GET['delete_account']))
    {               
        $employeeId = $_GET['delete_account'];
        
        $sql="DELETE FROM schoolemployee, login, department_has_schoolemployee "
                . "JOIN department_has_schoolemployee "
                . "ON schoolemployee.EmployeeID = department_has_schoolemployee.SchoolEmployee_EmployeeID "
                . "JOIN login "
                . "ON schoolemployee.Login_LoginID = login.LoginID "
                . "WHERE schoolemployee.EmployeeID = '".$employeeId."'; ";
        $pdo->query($sql);
        
        header("Location: Account.php");
    }
?>
<div id='page'>
    <h1>Accounts</h1>  
    <div id="body">
        <p><a href="CreateAccount.php"><button id="button" type="submit">Add Account</button></a></p>
        
<!------ Show Selected Employee Information ----------------------------------->
    <div id="information">    
        <?php
        if(isset($_GET['view']))
        {               
            $employeeId = $_GET['view'];

            $sql3="SELECT schoolemployee.EmployeeID, schoolemployee.FirstName, schoolemployee.LastName, "
                    . "schoolemployee.Email, schoolemployee.Role, login.UserName, login.Password "
                    . "FROM schoolemployee "
                    . "JOIN login "
                    . "ON schoolemployee.Login_LoginID = login.LoginID "
                    . "JOIN department_has_schoolemployee "
                    . "ON schoolemployee.EmployeeID = department_has_schoolemployee.SchoolEmployee_EmployeeID "
                    . "JOIN department "
                    . "ON department_has_schoolemployee.Department_DepartmentID = department.DepartmentID WHERE EmployeeID='".$employeeId."' ";

            $result = $pdo->query($sql3);

            //loop though and values from specific tables for an employee
            while($val=$result->fetch()):

                $empID = $val['EmployeeID'];
                $firstName = $val['FirstName'];
                $lastName = $val['LastName'];
                $email = $val['Email'];
                $role = $val['Role'];
                $userName = $val['UserName'];
                $password = $val['Password'];

                endwhile;
                ?>
        <table style="width: 60%; ">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Username</th>
                </tr>
                <tr>
                    <td><?php echo $firstName; ?></td>
                    <td><?php echo $lastName; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $role; ?></td>
                    <td><?php echo $userName; ?></td>
                </tr>
                <tr>
                <td><b>Departments: </b></td>
                    <td colspan="5" rowspan=""> 
                        <?php 
                            $sql4 = "SELECT DeptName FROM department "
                                    . "JOIN department_has_schoolemployee "
                                    . "ON department.DepartmentID = department_has_schoolemployee.Department_DepartmentID "
                                    . "WHERE department_has_schoolemployee.SchoolEmployee_EmployeeID='".$employeeId."' "
                                    . "ORDER BY DeptName";
                            $result = $pdo->query($sql4);
                            //show all departments for a specific person
                            while($val=$result->fetch()):

                                echo $val['DeptName'] . ", ";
                                endwhile;
                                ?></td>
                </tr>
                <tr>
                    <td><a href="EditAccount.php?edit_account=<?php echo $empID ?>"><button type="button">Edit</button></a></td>
                    <td><a href="Account.php?delete_account=<?php echo $empID ?>" onclick="return confirm('Are you sure you want to delete this Account?');"><button type="button">Delete</button></a></td>
                    <td></td><td></td><td></td>
                </tr>
            </table>           
            <br>
            <?php  
            }//end if(isset($_GET['view']))
            ?>
    </div>
            <br>
    
<!-------- Show all Accounts -------------------------------------------------->  
        <table>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    //get info from application
                    $sql2 = "SELECT EmployeeID, FirstName, LastName "
                            . "FROM schoolemployee "
                            . "ORDER BY FirstName, LastName";

                    $result = $pdo->query($sql2);
                    
                    //show all values from schoolemployee and echo them in a table  
                    while($val=$result->fetch()):

                    $employeeId = $val['EmployeeID'];
                    $firstName = $val['FirstName'];
                    $lastName = $val['LastName'];

                ?>
                <tr>
                    <td><?php echo $firstName; ?></td>
                    <td><?php echo $lastName; ?></td>
                    <td><a href="Account.php?view=<?php echo $employeeId ?>"><button type="button" id="view">View</button></a></td>
                </tr>
                <?php
                    endwhile;
                ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>