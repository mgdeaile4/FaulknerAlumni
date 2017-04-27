<?php

/*
 * Page to login, sending input to check login.
 * 
 * @author Robert Vines
 */

    include('PlainHeader.php'); 
 ?>
        <div id="loginPage">
            <div id="loginBox">
                <form method="post" action="CheckLogin.php">
                    <p id='loginHeader'>Enter User Name and Password to Login</p>
                    <table id="tablebody" align ='center'>
                        <tr>
                            <td colspan="2" style="color:red;"> 
                                <!--gets failed password or username message and shows text-->
                                <?php if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
                                echo "Wrong Username / Password";
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="border-color:white; background-color: white;"><p id="loginText">User Name:</td>
                            <td style="border-color:white; background-color: white;"><input type="text" name="UserName" required /></td>
                        </tr>
                        <tr style="background-color : white">
                            <td style="border-color:white"><p id="loginText">Password:</td>
                            <td style="border-color:white"><input type="password" name="Password" required /></td>
                        </tr>
                    </table>
                    <p id="loginText"><input type="submit" value="Sign In"></p>    
                </form>
                <div style="float:right; padding-right: 15px;">
                    <a href="ForgotLogin.php"><button>Forgot Login?</button></a>
                </div>
            </div>
        </div>
    </body>
</html>
