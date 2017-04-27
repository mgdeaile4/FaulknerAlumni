<?php
/* 
 * Show information, ability to edit or delete.
 * 
 * @author: Robert Vines
 */

    include('Header.php'); 
?>
<div id='page'>
    <h1>Department</h1>
        <div id="body">
            <?php
                if(isset($_GET['delete_dept']))
                {               
                    $dept = $_GET['delete_dept'];
                    
                    $sql="DELETE FROM department WHERE DepartmentID = ".$dept;
                    $result = $pdo->query($sql);           

                    header("Location: Department.php");
                }
              
                $deptId = NULL;
                
                
                ?>
            <p><a href="DepartmentView.php?edit_id=<?php echo $deptId ?>"><button id="button">Add Department</button></a></p>
            <table>
                <thead>
                    <tr>
                        <th>Department Name</th>
                        <th> </th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    //get info from application
                    $pdo = new PDO($connString, $user, $pass);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    $sql = "SELECT * FROM department ORDER BY DeptName";
                    $result = $pdo->query($sql);
                    
                    while($val=$result->fetch()):
                         
                    $deptId= $val['DepartmentID'];
                    $deptName= $val['DeptName'];                  
                ?>
                    <tr>
                        <td><?php echo $deptName; ?></td>
                        <td><a href="DepartmentView.php?edit_id=<?php echo $deptId ?>"><input type="submit" value="Edit"></a></td>
                        <td><a href="Department.php?delete_dept=<?php echo $deptId ?>" onclick="return confirm('Are you sure you want to delete this department?');"><input type="submit" value="Delete"></a></td>
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