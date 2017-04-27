<?php
/* 
 * Form to collect alumni information.
 * 
 * @author: Robert Vines
 */

    include('Header.php');
  
    $personId = $_GET['edit_id'];
        
        if($personID!=NULL){
        $title = "Edit Alumni";
       
        $sql="SELECT person.FirstName, person.MiddleName, person.LastName, person.PrimaryEmail, person.SecondEmail, "
                . "person.Tracked, address.StreetAddress, address.City, address.State, address.ZipCode, address.Country, "
                . "address.CellNum, address.WorkNum, address.HomeNum, gradschool.Applied, gradschool.Accepted, "
                . "gradschool.Status, gradschool.University_UniversityID, graduated.MonthGraduated, graduated.YearGraduated, "
                . "graduated.Degree_MajorID, graduated.Degree_MinorID, employment.CurrentJob, employment.InField, employment.Employer_EmployerID "
                . "FROM person "
                . "JOIN address "
                . "ON address.Person_PersonID = person.PersonID "
                .  "WHERE PersonID='".$personID."' ";
                   "FROM person"
                . "JOIN gradschool "
                . "ON gradschool.Person_PersonID = person.PersonID "
                . "WHERE PersonID='".$personID."' ";     
                  "FROM person"
                . "JOIN graduated "
                . "ON graduated.Person_PersonID = person.PersonID "
                . "WHERE PersonID='".$personID."' ";
                  "FROM person"
                . "JOIN employment "
                . "ON employment.Person_PersonID = person.PersonID "
                . "WHERE PersonID='".$personID."' ";

             $result = $pdo->query($sql);

            $val=$result->fetch();

            $firstName = $val['FirstName'];
            $middleName = $val['MiddleName'];
            $lastName = $val['LastName'];               
            $primEmail = $val['PrimaryEmail'];
            $secEmail = $val['SecondEmail'];
            $tracked = $val['Tracked'];
            $streetAdd = $val['StreetAddress'];
            $city = $val['City'];
            $state = $val['State'];
            $zip = $val['ZipCode'];
            $country = $val['Country'];
            $cell = $val['CellNum'];
            $work = $val['WorkNum'];
            $home = $val['HomeNum'];
            $applied = $val['Applied'];
            $accepted = $val['Accepted'];
            $status = $val['Status'];
            $schoolId = $val['University_UniversityID'];
            $monthGrad = $val['MonthGraduated'];
            $yearGrad = $val['YearGraduated'];
            $majorId = $val['Degree_MajorID'];
            $minorId = $val['Degree_MinorID'];
            $currentJob = $val['CurrentJob'];
            $inField = $val['InField'];
            $empID = $val['Employer_EmployerID'];
           
           
    }
    else
    {
       
        $title = "Create Alumni";
    }
        
?>
<html>
<style>
    td {
        font-weight: bold;
    }
</style>

<body onload="if ($personId === NULL) document.getElementById('MoreInfo').style.display='none';">
<div id='page'>
    <h1><?php echo $title ?></h1>
        <div id="body">
            <form method='post' action='/AlumniTracker/Controller/AlumniController.php?edit_id=<?php echo $personID; ?>'>
                <table id="formTable">
                   <tr>
                       <td>First Name:</td> <td><input type="text" name="FirstName" value="<?php echo $firstName; ?>" required />*</td>
                       <td>Middle Name:</td> <td><input type="text" name="MiddleName" value="<?php echo $middleName; ?>" /></td>
                       <td>Last Name:</td> <td><input type="text" name="LastName" value="<?php echo $lastName; ?>" required />*</td>
                   </tr>
                   <tr>
                        <td>Cell Number:</td> <td><input type="text" name="CellNum" value="<?php echo $cell; ?>" /></td>
                        <td>Home Number:</td> <td><input type="text" name="HomeNum" value="<?php echo $home; ?>" /></td>
                        <td>Work Number:</td> <td><input type="text" name="WorkNum" value="<?php echo $work; ?>" /></td>
                   </tr>
                   <tr>
                        <td>Primary Email:</td> <td><input type="email" name="FirstEmail" value="<?php echo $primEmail; ?>" /></td>
                        <td>Secondary Email:</td> <td><input type="email" name="SecondEmail" value="<?php echo $secEmail; ?>" /></td>
                        <td>Tracked:</td>   
                        <td><select name="Tracked">
                                    <?php 
                                        if ($tracked == 0)
                                        {
                                            echo '<option>Yes</option>';
                                            echo '<option>No</option>';
                                        }
                                        else
                                        {
                                            echo '<option>No</option>';
                                            echo '<option>Yes</option>';
                                        }
                                ?>
                            </select></td>
                   </tr>
                   <br>
                   <tr>
                        <td>Street:</td> <td><input type="text" name="Street" value="<?php echo $streetAdd; ?>" /></td>
                        <td>City:</td> <td><input type="text" name="City" value="<?php echo $city; ?>" /></td>
                        <td>State:</td> <td><input type="text" name="State" value="<?php echo $state; ?>" /></td>
                   </tr>
                   <input type="submit" value="Save Alumni" />
                   <tr>
                        <td>Country:</td> <td><input type="text" name="Country" value="<?php echo $country; ?>" /></td>
                        <td>Zip:</td> <td><input type="text" name="Zip" value="<?php echo $zip; ?>" /></td>
                        <td></td><td></td>
                   </tr>
                  
               <!--  <td>Major:</td>
                        <td><select name="Major" required>
                                <?php 
                                
                                    $sql = "SELECT DISTINCT Name FROM degree WHERE DegreeID=".$majorId;
                                    $result = $pdo->query($sql);
                                    while ($val = $result->fetch()):
                                    $major = $val['Name'];

                                    {
                                        echo "<option>" . $major . "</option>";
                                    }endwhile;
                                   
                                    ?>
                            </select>*</td>
                                                        
                       <tr>
                        <td>Minor:</td>
                        <td><select name="Minor">
                                <?php 
                                    $sql = "SELECT DISTINCT Name FROM degree WHERE DegreeID=".$minorId;
                                    $result = $pdo->query($sql);
                                    while ($val = $result->fetch()):
                                    $minorName = $val['Name'];

                                    {
                                        echo "<option>" . $minorName . "</option>";
                                    }endwhile;
                                
                                    $sql4 = "SELECT Name FROM degree ORDER BY Name";
                                    $result4 = $pdo->query($sql4);
                                    while ($val = $result4->fetch()):
                                    $minor = $val['Name'];

                                    {
                                        echo "<option>" . $minor  . "</option>";
                                    }endwhile;
                                    ?>
                            </select></td>
                            <td></td><td style="border:white"></td>
                   </tr>
                   <tr>
                        <td>Month Graduated:</td>
                        <td><select name="MonthGrad" required>
                                <option><?php echo $monthGrad; ?></option>
                                <option>January</option><option>February</option>
                                <option>March</option><option>April</option>
                                <option>May</option><option>June</option>
                                <option>July</option><option>August</option>
                                <option>September</option><option>October</option>
                                <option>November</option><option>December</option>
                            </select>*</td>
                        <td>Year Graduated:</td> <td><input type="text" name="YearGrad" value="<?php echo $yearGrad; ?>" /></td>
                        <td></td>
                        <td></td>
                   </tr>
                </table>
               
 
                <div id="MoreInfo" class="tabs">
                    <div class="tab">
                        <input type="radio" id="tab-1" name="tab-group-1" checked>
                            <label for="tab-1"><b>Employment</b></label>
                                <div class="content">
                                    <button id="button" type="submit" style="float: right;" onclick="javascript:void window.open('SelectEmployer.php','1443811554743','width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;" >Add Employer</button>
                                    <table style="float: left;">
                                        <thead>
                                            <tr>
                                                <th>Job Title</th>
                                                <th>In Field</th>
                                                <th>Employer Name</th>
                                                <th>Employer Company</th>
                                                <th>Employer Number</th>
                                                <th>Employer Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" name="CurrentJob" value="N/A" readonly /></td>
                                                <td><select name="Field">
                                                        <option>Yes</option>
                                                        <option>No</option>
                                                    </select></td>
                                                <td><input type="text" name="EmployerName" value="N/A" readonly /></td>
                                                <td><input type="text" name="EmployerComp" value="N/A" readonly /></td>
                                                <td><input type="text" name="EmployerNum" value="000-000-0000" readonly /></td>
                                                <td><input type="text" name="EmployerEmail" readonly value="N/A@none.com" /></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> 
                    </div> 
                    <div class="tab">
                        <input type="radio" id="tab-2" name="tab-group-1">
                            <label for="tab-2"><b>Grad School</b></label> 
                                <div class="content">
                                    <a href="CreateAlumni.php"><button id="button" type="submit" style="float: right;">Add Grad School</button></a>
                                    <table style="float: left;">
                                        <thead>
                                            <tr>
                                                <th>Applied</th>
                                                <th>Accepted</th>
                                                <th>Status</th>
                                                <th>School Name</th>
                                                <th>Degree</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><select name="Applied">
                                                        <option>Yes</option>
                                                        <option>No</option>
                                                    </select>  
                                                </td>
                                                <td><select name="Accepted">
                                                        <option>Yes</option>
                                                        <option>No</option>
                                                        <option>In Progress</option>
                                                    </select>
                                                </td>
                                                <td><input type="text" name="Status" value="N/A" readonly /></td>
                                                <td><input type="text" name="SchoolName" value="None" readonly /></td>
                                                <td><input type="text" name="Degree" value="N/A" readonly /></td>
                                            </tr>
                                        </tbody>-->
                   </table>
                                         
                                    
                                </div>
                                </div>                           
                            </div>
                <br>
                
            </form>
              
            
</div>                  
</div>
</body>
</html>
