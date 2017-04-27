<?php
/*
 * Form to create a new Account.
 * 
 * @author Robert Vines
 */

    include('Header.php');
    //include($_SERVER["DOCUMENT_ROOT"]. '/AlumniTracker/Database/Config.php');
?>
<style>
    td {
        font-weight: bold;
    }
</style>

<div id='page'>
    <h1>Create Account</h1>
        <div id="body"> 
            <form method='post' action='/AlumniTracker/Controller/CreateAccountController.php'>
                <table id="formTable">
                    <tr>
                        <td>First Name:</td><td><input type="text" name="FirstName" required /></td>
                    </tr>
                    <tr>
                        <td>Last Name:</td><td><input type="text" name="LastName" required /></td>
                    </tr>
                    <tr>
                        <td>Email:</td><td><input type="text" name="Email" required /></td>
                    </tr>
                    <tr>
                        <td>Role:</td> 
                        <td><select name="Role">
                                <option>Admin</option>
                                <option>Dean</option>
                                <option>Department Chair</option>
                                <option>Secretary</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td>Username:</td><td><input type="text" name="UserName" required /></td>
                    </tr>
                    <tr>
                        <td>Password:</td><td><input type="text" name="Password" required /></td>
                    </tr>
                    <tr>
                        <td>Department:</td>
                    </tr>
                </table>
                <div id='checkbox'>
                        <?php 
                            $sql = "SELECT DepartmentID, DeptName FROM department ORDER BY DeptName";
                            $result = $pdo->query($sql);

                            while ($val = $result->fetch()):

                            $deptID = $val['DepartmentID'];
                            $deptName = $val['DeptName'];  

                            {
                                echo " <b><input type='checkbox' name='DeptList[]' value='".$deptID."' />" . $deptName . "<br></b>";
                            }endwhile;
                            ?>
                </div>
                <br>
                <input type="submit" value="Create Account" />
            </form> 
        </div>
</div>
</body>
</html>
