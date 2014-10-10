<?php

session_start();
if (isset($_SESSION['Logged']))
{
    header('location: loggedTest.php');
}

?>

<html>
    <head>
        <title></title>
        <style>

            #frmLogin{
                /*width: 80%;*/
                margin: 0 auto;*/
            }

            #frmRegister{
                /*width: 80%;*/
                margin: 0 auto;*/
            }

            label, input{
                display: inline-block;
            }

            label{
                /*width: 20%;*/
                width: 130px;
                text-align: right;
            }

            label + input{
                width: 250px;
                margin: 0 0 0 5px;
            }

            #btnRegister{
                width: 100%;

            }

            #tblRegLog td{
                vertical-align: text-top;
                height: 2em;
            }

            table{

            }

            #tblRegLog{
                margin: auto;
            }

        </style>
    </head>
    <body>
        <table id="tblRegLog">
            <thead>
                <tr>
                    <th>Register</th>
                    <th>Login</th>
                </tr>
            </thead>
            <tr>
                <td>
                    <?php
                        include_once 'formRegister.php';
                    ?>
                </td>
                <td>
                    <?php
                        include_once 'formLogin.php';
                    ?>
                </td>
            </tr>
        </table>
    </body>
</html>