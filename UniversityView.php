<?php
/*  
 * Form to edit a university.
 * 
 * @author: Robert Coleman
 */

    include('Header.php');

    $uniID = $_GET['edit_id'];
    
    if($uniID!=NULL)
        {
            $sql="SELECT * FROM university WHERE UniversityID=".$uniID;
            $result = $pdo->query($sql);
            $val=$result->fetch();
    
            $uniId = $val['UniversityID'];
            $uniName = $val['UniName'];
        }
        else $title='Add University';
?>
<style>
    td {
        font-weight: bold;
    }
</style>

<div id='page'>
    <h1><?php echo $title ?></h1>
        <div id="body">
            <form method='post' action='/AlumniTracker/Controller/UniversityController.php?edit_id=<?php echo $uniId ?>'>
                <table id="formTable">
                    <tr>
                        <td>University Name:</td>
                        <td><input type="text" name="uniName" value="<?php echo $uniName;?>" /></td>
                    </tr>
                </table>
                <br>
                <input type="submit" value="Save University" />
            </form>
        </div>
</div>
    </body>
</html>