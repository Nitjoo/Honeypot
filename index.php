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
            body {
                margin-top: 50px;
                font-family: "Times New Roman", Georgia, Serif;
            }
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
            }

            #tblRegLog{
                margin: auto;
            }

            a {
                text-align: center;
            }

            #menu {
                margin-left: 0%;
                top: 0px;
                left: 0px;
                position: fixed;
                width: 100%;
                height: 41px;
                padding-left: 10%;
                background-color: red;
                margin-left: auto;
                margin-right: 5%;
            }

            #menu a {
                color: white;
                display: inline-block;
                height: 35px;
                width: 60px;
                padding-left: 20px;
                padding-right: 20px;
                padding-top: 10px;
                padding-bottom: 10px;
                text-decoration: none;
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

        <nav id="menu">
            <a href="categorie.php">Categorie</a>
            <a href="index.php">Registreer|Login</a>
        </nav>

    </body>
</html>