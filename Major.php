 <?php

/* 
 * Show major information to be edited or deleted
 * 
 * @author: Robert Vines
 */
 
    include('Header.php');
?>
<?php
    //delete specific degree
    if(isset($_GET['delete_id']))
    {               
        $degreeID = $_GET['delete_id'];
        
        $sql= "DELETE FROM degree WHERE DegreeID=".$degreeID;
        $pdo->query($sql);
 
        header("Location: Major.php");
    }
    $degreeID = NULL;
?>
<div id='page'>
    <h1>List of Majors</h1>
        <div id="body">
            <p><a href="MajorView.php?edit_id=<?php echo $degreeID ?>"<button id="button">Add Major</button></a></p>
            <table>
                <thead>
                    <tr>
                        <th>College</th>
                        <th>Type</th>
                        <th>Major</th>
                        <th>Department</th>
                        <th> </th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql2 = "SELECT degree.DegreeID, degree.Type, degree.Name, degree.College, department.DeptName"
                                . " FROM degree "
                                . "JOIN department "
                                . "ON degree.Department_DepartmentID = department.DepartmentID ";
                        $result = $pdo->query($sql2);

                        while($val=$result->fetch()):

                        $degreeID = $val['DegreeID'];
                        $degreeCollege = $val['College'];
                        $degreeType = $val['Type'];
                        $degreeMajor = $val['Name'];
                        $deptName = $val['DeptName'];
                    ?>
                    <tr>
                        <td><?php echo $degreeCollege; ?></td>
                        <td><?php echo $degreeType; ?></td>
                        <td><?php echo $degreeMajor; ?></td>
                        <td><?php echo $deptName; ?></td>
                        <td><a href="MajorView.php?edit_id=<?php echo $degreeID ?>"><button type="button">Edit</button></a></td>
                        <td><a href="Major.php?delete_id=<?php echo $degreeID ?>" onclick="return confirm('Are you sure you want to delete this major?');"><input type="submit" value="Delete"></td>
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
