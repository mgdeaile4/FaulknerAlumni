<?php

/* 
 * Header with no links for login pages.
 * 
 * @author: Robert Vines
 */
    
    include('PlainHeader.php');
?>

<div id="loginPage">
            <div id="loginBox">
                <form method="post" action="/AlumniTracker/Controller/ForgotLoginController.php">
                    <p id='loginHeader'>Forgot Username or Password?</p>
                    <table id="tablebody" align ='center'>
                        <tr>
                            <td style="border-color:white"><p id="loginText">Enter Email:</td>
                            <td style="border-color:white"><input type="text" name="Email" required /></td>
                        </tr>
                    </table>
                    <p id="loginText"><input name="forgot" type="submit" value="Submit"></p>    
                </form>
            </div>
        </div>
    </body>
</html>