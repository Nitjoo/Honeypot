<!DOCTYPE html>
<html>
<head>
    <title>FORUM - Honeypot</title>
    <style>
        body {
            width: 100%;
            font-family: "Times New Roman", Georgia, Serif;
            position: relative;
            top: 50px;
        }

        #fullBody {
            width: 80%;
            margin-left: auto;
            margin-right: auto;
        }

        #historyMessages {
            width: 100%;
            height: auto;
        }

        td  {
            vertical-align: top;
        }

        a {
            text-align: center;
        }

        #header {
            color: red;
            margin-top: 30px;
        }

        #menu {
            background-color: red;
            margin-left: 5%;
            left: 0px;
            top:0px;
            position: fixed;
            width: 100px;
            height: 100%;
            background-color: red;
            margin-left: 0px;
        }

        #menu a {
            color: white;
            display: inline-block;
            height: 35px;
            width: 60px;
            padding-left: 10px;
            padding-right: 10px;
            padding-top: 20px;
            padding-bottom: 20px;
            text-decoration: none;
        }

        .userlink {
            color: red;
            text-decoration: none;
        }

        img {
            width: 150px;
            height: 150px;
            margin: auto;
            text-align: center;
        }

        #divPages {
            width: 100%;
            text-align: right;
        }

        .fontPagesNormal {
            text-decoration: none;
            color: black;
            text-align: right;
        }

        .fontPagesCurrent {
            text-decoration: none;
            color: red;
            text-align: right;
        }
    </style>
</head>
<body>
<div id="fullBody">
    <nav id="menu">
        <a href="categorie.php">Categorie</a><br>
        <a href="forumdb.php">Forum</a><br>
        <a href="index.php" id="login"><?php include_once "loginCheck.php"; if($_SESSION['Logged'] != ''){ echo 'Logout'; } else { echo 'Registreer|Login'; } ?></a>
    </nav>
    <div id="header">
        <h1>THREADS</h1>
    </div>

    <div id='divMain'>
        <div id='history'>
            <div id='historyMessages' >
                <?php
                include_once 'DBConnect.php';
                if (isset($_GET['cat'])) {
                    $cat = $_GET['cat'];
                    if ($dbh->connect_errno) {
                        echo "Failed to connect to database. Error: " . $dbh->connect_error;
                        die();
                    } else {
                        global $cat;
                        loadThreads($cat);
                        $dbh->close();
                    }
                } else {
                    header("Location: categorie.php");
                }

                function loadThreads($categorie) {
                    global $dbh;
                    $resultThreads = mysqli_query($dbh, "SELECT Title, UserID, DateTime, ThreadID FROM tblThreads WHERE CategorieID='".$categorie."'");
                    echo "<table>";
                    while ($resultThread = mysqli_fetch_array($resultThreads)) {
                        echo "<tr>";
                        echo "<td>";
                        echo "<a href='showthread.php?cat=".$categorie."&thread=".$resultThread['ThreadID']."'>".$resultThread['Title']."</a>";
                        echo "</td>";
                        echo "<td>";
                        echo "<a href='profiel.php?Username=".getUsername($resultThread['UserID'])."'>".getUsername($resultThread['UserID'])."</a>";
                        echo "</td>";
                        echo "<td>";
                        echo $resultThread['DateTime'];
                        echo "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";

                }

                function getUsername($id) {
                    global $dbh;
                    $resultUsername = mysqli_query($dbh, "SELECT UserName FROM tblusers WHERE UserID='".$id."'");
                    $resultUsername = mysqli_fetch_array($resultUsername);
                    return $resultUsername['UserName'];
                }




                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>