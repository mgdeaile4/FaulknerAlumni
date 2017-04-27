<?php
/* 
 * Choose an employer to edit or delete.
 * 
 * @author: Robert Coleman
 */

    include('Header.php'); 
?>
<div id='page'>
    <h1>Employer</h1>
        <div id="body">
            <?php
                //delete specific employer
                if(isset($_GET['delete_id']))
                {               
                    $sql="DELETE FROM employer WHERE EmployerID=".$_GET['delete_id'];
                    $result = $pdo->query($sql);           

                    header("Location: Employer.php");
                }
            ?>
            <?php
                 $empID=NULL;
            ?>
            <p><a href="EmployerView.php?edit_id=<?php echo $empID ?>"><button id="button">Add Employer</button></a></p>
            
            <table>
                <thead>
                    <tr>
                        <th>Employer Name</th>
                        <th>Employer Number</th>
                        <th>Employer Company</th>
                        <th>Employer Email</th>
                        <th> </th>
                        <th> </th>
                    </tr>
                </thead>
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
                        $empEmail = $val['EmployerEmail'];
                    ?>
                    <tr>
                        <td><?php echo $empName; ?></td>
                        <td><?php echo $empNum; ?></td>
                        <td><?php echo $empComp; ?></td>
                        <td><?php echo $empEmail; ?></td>
                        <td><a href="EmployerView.php?edit_id=<?php echo $empID ?>"><input type="submit" value="Edit"></a></td>
                        <td><a href="Employer.php?delete_id=<?php echo $empID ?>" onclick="return confirm('Are you sure you want to delete this employer?');"><input type="submit" value="Delete"></a></td>
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
