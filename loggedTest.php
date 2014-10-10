<?php
/**
 * Created by PhpStorm.
 * User: Giani
 * Date: 9/10/2014
 * Time: 19:39
 */
session_start();
if (isset($_SESSION['Logged']))
{
    echo "Logged In <br /> <br /> <a href='logout.php'>Log Out</a>";
}else{
    header('Location: index.php');
    die();
}