<?php
/**
 * Created by PhpStorm.
 * User: Giani
 * Date: 8/10/2014
 * Time: 20:53
 */

?>
<form id="frmLogin" action="srcLogin.php" method="POST">
    <table>
        <tr>
            <td><label for="inUsername">Username: </label></td>
            <td><input type="text" name="inUsername" placeholder="Enter a Username" /></td>
            <td>
            <td>
                <?php
                if($error == 6){
                    echo 'Wrong Username or Password';
                }
                ?>
            </td>

            </td>
        </tr>
        <tr>
            <td><label for="inPassword">Password: </label></td>
            <td><input type="password" name="inPassword" placeholder="Enter Your Password"/></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td><input id="btnRegister" type="submit" value="Login"></td>
            <td>
                <?php
                if($error == 5){
                    echo 'Fill in all the required fields';
                }
                ?>
            </td>
        </tr>
    </table>
</form>
