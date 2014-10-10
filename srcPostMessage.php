<?php
include_once "DBConnect.php";
if($dbh->connect_errno){
    echo "Failed to connect to database. Error: " . $dbh->connect_error;
    die();
}else{
    session_start();
    if ($_POST['captcha'] == $_SESSION['captchaResult'])
    {
        $message = $_POST['txtSendMessage'];
        if (strlen($message) > 0)
        {
            $username = $_SESSION['Logged'];
            $currentThread = $_SESSION['Logged'];
            date_default_timezone_set("Europe/Brussels");
            $DateTime = date("Y-m-d H:i:s", time());
            $clientip = $_SERVER['REMOTE_ADDR'];

            $resultUserId = mysqli_query($dbh, "SELECT UserID FROM tblusers WHERE UserName='".htmlentities($username)."'");
            $resUserID = mysqli_fetch_array($resultUserId);
            if($resUserID['UserID'] != '')
            {
                global $currentThread;
                var_dump($currentThread);
                $result = mysqli_query($dbh,"INSERT INTO `honeypot`.`tblMessages` (`PostID`, `Body`, `UserID`, `ThreadID`, `DateTime`, `PostIP`) VALUES (NULL, '".htmlentities($message)."', '".htmlentities($resUserID['UserID'])."', '".htmlentities($currentThread)."', '".htmlentities($DateTime)."', '".htmlentities($clientip)."')");
                var_dump($result);
            }

            //LASTPAGE
            $resultPages = mysqli_query($dbh, "SELECT COUNT(PostID) FROM tblMessages");
            $maxPage = mysqli_fetch_array($resultPages);
            $maxPageCeil = ceil(($maxPage[0]/15));

            $resultPostID = mysqli_query($dbh, "SELECT MAX(PostID) FROM tblMessages");
            $resPostID = mysqli_fetch_array($resultPostID);
            //var_dump($resPostID);
            $dbh->close();
            //header("Location: showthread.php?thread=".htmlentities($_SESSION['currentThread'])."&page=".$maxPageCeil."#".htmlentities($resPostID[0]));
        } else {
            header("Location: showthread.php");

        }
    } else {
        header("Location: showthread.php");

    }

}
?>