<?php


/* 
 * For to edit an employer.
 * 
 * @author: Robert Coleman
 */

    include('Header.php');
    
    $employerID = $_GET['edit_id'];
    
    if($employerID!=NULL)
        {
        
    
    
            $sql="SELECT * FROM employer WHERE EmployerID=".$employerID;
            $result = $pdo->query($sql);
            $val=$result->fetch();
    
            $empID = $val['EmployerID'];
            $empName = $val['EmployerName'];    
            $empNum = $val['EmployerNum'];
            $empComp = $val['EmployerComp'];
            $empEmail = $val['EmployerEmail'];
            $title='Edit Employer';
            
        }
     else $title='Add Employer';      
?>
<style>
    td {
        font-weight: bold;
    }
</style>

<div id='page'>
    <h1><?php echo $title ?></h1>
        <div id="body">   
            <form method='post' action='/AlumniTracker/Controller/EmployerController.php?edit_id=<?php echo $empID ?>'>
                <table id="formTable">
                    <tr>
                        <td>Employer Name:</td><td><input type="text" name="EmpName" value="<?php echo $empName ?>" /></td>
                    </tr>
                    <tr>
                        <td>Phone Number:</td><td><input type="text" name="EmpNum" value="<?php echo $empNum ?>" /></td>
                    </tr>
                    <tr>
                        <td>Employer Company:</td><td><input type="text" name="EmpComp" value="<?php echo $empComp ?>" /></td>
                    </tr>
                    <tr>
                        <td>Employer email:</td><td><input type="email" name="EmpEmail" value="<?php echo $empEmail ?>" /></td>
                    </tr>
                </table>
                <br>
                <input type="submit" value="Save Employer" />
            </form>
    </div>
</div>
</body>
</html>
