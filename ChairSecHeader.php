<?php

/* 
 * Header/Nav bar for department chair and secretary
 * 
 * @author: Robert Vines
 */
?>
<html>
    <head>
        <title>Faulkner Alumni Tracker</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/AlumniTracker/CSS/AlumniTracker.css" type="text/css"/>
    </head>
    <body>
    <header>
        <a href="ChairSecHome.php"><img style="float:left; z-index: 1" src="/AlumniTracker/Images/AlumniTrackerLogo.jpg" alt="Faulkner University Alumni 
                        Tracker" id="logo"></a>
        <div id="logout"><a id="user" href="Logout.php">Log out</a></div>
        <hr noshade />
    </header>
        
        <div id="navigation">
            <ul>
                <li><a id="user" href="Home.php">Home</a></li>
                <li><a href="Major.php">Major</a></li>
                <li><a href="Department.php">Department</a></li>
                <li><a href="Employer.php">Employer</a></li>
                <li><a href="University.php">University</a></li>
                <li><a href="Alumni.php">Alumni</a></li>
                <li><a>Reports</a></li>
            </ul>    
        </div>    