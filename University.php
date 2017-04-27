<?php

/* 
 * Display a university to update and delete. Also, navigate to add a university.
 * 
 * @author: Robert Coleman
 */

    include('Header.php');
?>
<div id='page'>
    <h1>University</h1>
        <div id="body">
            <?php
                //delete specific university
                if(isset($_GET['delete_id']))
                {               
                    $sql="DELETE FROM university WHERE UniversityID=".$_GET['delete_id'];
                    $pdo->query($sql);           

                    header("Location: University.php");
                }
            ?>
            <?php
                $uniID=NULL;
            ?>
            <p><a href="UniversityView.php?edit_id=<?php echo $uniId ?>"><button id="button">Add University</button></a></p>
            <table>
                <thead>
                    <tr id="tableHead">
                        <th>University Name</th>
                        <th> </th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        //get info from application

                        $sql = "SELECT * FROM university ORDER BY UniName";
                        $result = $pdo->query($sql);

                        while($val=$result->fetch()):

                        $uniId= $val['UniversityID'];
                        $uniName= $val['UniName'];                  
                    ?>
                    <tr id="tablebody">
                        <td><?php echo $uniName; ?></td>
                        <td><a href="UniversityView.php?edit_id=<?php echo $uniId ?>"><input type="submit" value="Edit"></a></td>
                        <td><a href="University.php?delete_id=<?php echo $uniId ?>" onclick="return confirm('Are you sure you want to delete this university?');"><input type="submit" value="Delete"></a></td>
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
