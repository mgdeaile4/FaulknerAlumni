<?php

/* 
 * Home page for a dean.
 * 
 * @author: Robert Vines
 */
    include('Header.php');
?>
<div id='page'>
    <h1><?php session_start();
                    $fName = $_SESSION[fName];
                    $lName = $_SESSION[lName];
                    echo 'Hello '. $fName .' '. $lName .','; ?></h1>
        <div id="body">
        <p><b>Department: </b>
              <select>
                  <option></option>
                  <?php 
                          $sql = "SELECT DeptName FROM department ORDER BY DeptName";
                          $result = $pdo->query($sql);

                          while ($val = $result->fetch()):

                          $deptName = $val['DeptName'];    
                          {
                              echo "<option>" . $deptName . "</option>";
                          }endwhile;
                      ?>
              </select></p>
              <p><b>Last Name: </b><input type="text"></p>
    </div>
</div>
</body>
</html>
