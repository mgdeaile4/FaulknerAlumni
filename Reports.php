<?php

/* 
 * To show printable collections of alumni. 
 * 
 * @author: Robert Vines 
 */
    
    include('Header.php');
?>
<style>
    #title {
        font-weight: bold;
        font-size: 20px;
        margin-left: 2px;
    }
    
    #content {
        margin-left: 20px; 
    }
    
    #group {
        font-weight: bold;
        font-size: 15px;
        border-bottom: 2px solid #9D9D9D;
    }
    
    #box {
        padding: 2px;
        margin-top: 5px;
        position: relative;
        width: 95%;
        background: #FFFFFF;
        border: 1px solid #9D9D9D;
    }
    
    td {
        font-size: 13px;
    }
    
    #border {
        border-right: 1px solid #9D9D9D;
    }
</style>

<div id='page'>
    <h1>Reports</h1>  
    <div id="body">
        Search: <input type="text" />
     
<!---------- PHP and boxes to show/format information ----------------------------------->
            <?php
                $sql="SELECT person.FirstName, person.MiddleName, person.LastName, person.PrimaryEmail, person.SecondEmail, "
                    . "person.Tracked, address.StreetAddress, address.City, address.State, address.ZipCode, address.Country, "
                    . "address.CellNum, address.WorkNum, address.HomeNum, gradschool.Applied, gradschool.Accepted, "
                    . "gradschool.Status, gradschool.University_UniversityID, graduated.MonthGraduated, graduated.YearGraduated, "
                    . "graduated.Degree_MajorID, graduated.Degree_MinorID, employment.CurrentJob, employment.InField, employment.Employer_EmployerID "
                    . "FROM person "
                    . "JOIN address "
                    . "ON address.Person_PersonID = person.PersonID "
                    . "JOIN gradschool "
                    . "ON gradschool.Person_PersonID = person.PersonID "
                    . "JOIN graduated "
                    . "ON graduated.Person_PersonID = person.PersonID "
                    . "JOIN employment "
                    . "ON employment.Person_PersonID = person.PersonID "
                    . "ORDER BY graduated.YearGraduated; ";

                $result = $pdo->query($sql);

                while($val=$result->fetch()):
                    
                    $fName = $val['FirstName'];
                    $mName = $val['MiddleName'];
                    $lName = $val['LastName'];               
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
       
            ?>        
            <div id='box'>
            <div id='title'>
                <?php echo $fName.' '.$mName.' '.$lName; ?>
            </div>
            <table id='content'>
                <tr>
                    <td colspan="2" id='group' style="border-right: 1px solid #9D9D9D;">
                        Personal Information
                    </td>
                    <td colspan="2" id='group' style="border-right: 1px solid #9D9D9D;">
                        Address
                    </td>
                    <td colspan="2" id='group' style="border-right: 1px solid #9D9D9D;">
                        Phone Numbers
                    </td>
                    <td colspan="2" id='group'>
                        Degrees
                    </td>
                </tr>
                <tr>
                    <td><b>Primary Email:</b></td>
                    <td id='border'><?php echo $primEmail; ?></td>
                    <td><b>Street:</b></td>
                    <td id='border'><?php echo $streetAdd; ?></td>
                    <td><b>Cell:</b></td>
                    <td id='border'><?php echo $cell; ?></td>
                    <td><b>Major Type:</b></td>
                    <td>
                        <?php 
                            $sql2 = "SELECT Type FROM degree "
                                    . "WHERE DegreeID = ".$majorId;
                            
                            $result2=$pdo->query($sql2);

                            while($val=$result2->fetch()):
                            
                                $majorType = $val['Type'];
                                
                                echo $majorType;
                                
                            endwhile;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><b>Secondary Email:</b></td> 
                    <td id='border'><?php echo $secEmail; ?></td>
                    <td><b>City:</b></td>
                    <td id='border'><?php echo $city; ?></td>
                    <td><b>Work:</b></td>
                    <td id='border'><?php echo $work; ?></td>
                    <td><b>Major Name:</b></td>
                    <td>
                        <?php 
                            $sql3 = "SELECT Name FROM degree "
                                    . "WHERE DegreeID = ".$majorId;
                            
                            $result3=$pdo->query($sql3);

                            while($val=$result3->fetch()):
                            
                                $majorName = $val['Name'];
                                
                                echo $majorName;
                                
                            endwhile; 
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><b>Tracked:</b></td> 
                    <td id='border'>
                        <?php 
                            if ($tracked == 0)
                            {
                                echo 'Yes'; 
                            }
                            else 
                            {
                                echo 'No';
                            } 
                        ?>
                    </td>
                    <td><b>State:</b></td>
                    <td id='border'><?php echo $state; ?></td>
                    <td><b>Home:</b></td>
                    <td id='border'><?php echo $home; ?></td>
                    <td><b>Minor:</b></td>
                    <td>
                        <?php 
                            $sql4 = "SELECT Name FROM degree "
                                    . "WHERE DegreeID = ".$minorId;
                            
                            $result4=$pdo->query($sql4);

                            while($val=$result4->fetch()):
                            
                                $minorName = $val['Name'];
                                
                                echo $minorName;
                                
                            endwhile;  
                        ?>
                    </td>
                </tr> 
                <tr>
                    <td></td>
                    <td id='border'></td>
                    <td><b>Country:</b></td>
                    <td id='border'><?php echo $country; ?></td>
                    <td></td>
                    <td id='border'></td>
                    <td><b>Month Graduated:</b></td>
                    <td><?php echo $monthGrad; ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td id='border'></td>
                    <td><b>Zip Code:</b></td>
                    <td id='border'><?php echo $zip; ?></td>
                    <td></td>
                    <td id='border'></td>
                    <td><b>Year Graduated:</b></td>
                    <td><?php echo $yearGrad; ?></td>
                </tr>
            </table>
            <table id='content'>
                <tr>
                    <td colspan="8" id='group'>
                        Grad School
                    </td>
                </tr>
                <tr>
                    <td><b>Applied:</b></td> 
                    <td><?php echo $applied; ?></td>
                    <td><b>Accepted:</b></td> 
                    <td><?php echo $accepted; ?></td>
                    <td><b>School:</b></td> 
                    <td><?php echo $schoolId; ?></td>
                    <td><b>Status:</b></td> 
                    <td><?php echo $status; ?></td>

                </tr>
            </table>
            <table id='content'>
                <tr>
                    <td colspan="12" id='group'>
                        Employment
                    </td>
                </tr>
                <tr>
                    <td><b>Job Title:</b></td> 
                    <td><?php echo $empID; ?></td>
                    <td><b>In Field:</b></td> 
                    <td><?php echo $empID; ?></td>
                    <td><b>Employer Name:</b></td> 
                    <td><?php echo $empID; ?></td>
                    <td><b>Company:</b></td> 
                    <td><?php echo $empID; ?></td>
                    <td><b>Number:</b></td> 
                    <td><?php echo $empID; ?></td>
                    <td><b>Email:</b></td>
                    <td><?php echo $empID; ?></td>
                </tr>
            </table>  
        </div>
        <?php
            endwhile;
        ?>
    </div>
</div>