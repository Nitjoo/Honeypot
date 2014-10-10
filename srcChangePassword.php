<?php
/**
Door Tommy
 */
include_once 'DBConnect.php';
session_start();
$inUsername = $_SESSION['Logged'];

$inC = mysqli_query($dbh, "SELECT Password FROM tblusers WHERE UserName ='".htmlentities($inUsername)."'");

$currentPW = mysqli_fetch_array($inC);
$oldPW = $currentPW[0];

$inNewPassword = htmlentities($_POST['inNewPassword']);
$inNewPasswordCheck = htmlentities($_POST['inNewPasswordCheck']);
$inOldPassword = htmlentities($_POST['inOldPassword']);

$copyOfOldPassword = $inOldPassword;

$copyOfOldPassword = md5(md5($copyOfOldPassword) + $copyOfOldPassword);

if(strcmp($copyOfOldPassword,$oldPW) != 0){

    echo 'Verkeerde wachtwoord ingevoerd!';
}


if($_POST['inOldPassword'] && $_POST['inNewPassword'] && $_POST['inNewPasswordCheck']){


}else{
header('Location: '.$_SERVER['HTTP_REFERER']."?error=5");
die();
}

if (strcmp($inNewPassword, $inNewPasswordCheck) !== 0){
echo '<p>De wachtwoorden komen niet overeen. Gelieve opnieuw te proberen.</p>';
echo '<a href="formChangePassword.php">Klik hier om terug te keren.</a>';
die();
}

if($dbh->connect_error){

echo 'fout';
//code

}else{
$inNewPassword = md5(md5($inNewPassword) + $inNewPassword);


if($stmt = $dbh->prepare("UPDATE tblusers SET Password=? WHERE UserName = ? ")){

$stmt->bind_param('ss',$inNewPassword,$inUsername);

$stmt->execute();

    echo 'Gelukt! Uw wachtwoord is veranderd. Klik hier om terug te gaan.';
}
}
?>

