<?php

/*
 * Form to edit a major.
 *
 * @author Robert Vines
 */
    include('Header.php');
    $degreeID = $_GET['edit_id'];
    
    if($degreeID != NULL){
        $title = "Edit Degree";
        $sql = "SELECT degree.DegreeID, degree.Type, degree.Name, degree.College, department.DeptName"
                . " FROM degree "
                . "JOIN department "
                . "ON degree.Department_DepartmentID = department.DepartmentID WHERE DegreeID=".$degreeID;
        $result = $pdo->query($sql);
        $val=$result->fetch();
        
        $degreeType = $val['Type'];
        $degreeMajor = $val['Name'];
        $degreeCollege = $val['College'];
        $deptName = $val['DeptName'];
    }
    else{
        $title = "Add Degree";
    }
    ?>
<style>
    td {
        font-weight: bold;
    }
</style>

<div id='page'>
    <h1><?php echo $title ?></h1>
        <div id="body">
            <form method='post' action='/AlumniTracker/Controller/MajorController.php?edit_major=<?php echo $degreeID ?>'>
                <table id="formTable">
                    <tr>
                        <td>College:</td>
                        <td><select name="College">
                                <option><?php echo $degreeCollege; ?></option>
                                <option>College of Arts and Sciences</option>
                                <option>College of Business</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Type:</td><td><input type="text" name="Type" value="<?php echo $degreeType; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Major:</td><td><input type="text" name="Major" value="<?php echo $degreeMajor; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Department:</td>
                            <td><select name="Dept">
                                <option><?php echo $deptName; ?></option>
                                <?php 
                                    $sql = "SELECT DeptName FROM department ORDER BY DeptName";
                                    $result = $pdo->query($sql);

                                    while ($val = $result->fetch()):

                                    $deptName = $val['DeptName'];    
                                    {
                                        echo "<option>" . $deptName . "</option>";
                                    }endwhile;
                                ?>
                            </select></td>
                    </tr>
                </table>
                <br>
                <input type="submit" value="Save Major" />
            </form>
    </div>
</div>
</body>
</html>