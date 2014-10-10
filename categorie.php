<!DOCTYPE html>
<html>
<head>
    <title>Categorie - Honeypot</title>
    
    <style>
        body {
            width: 80%;
            margin-left: 10%;
            margin-right: 10%;
            margin-top: 50px;
            font-family: "Times New Roman", Georgia, Serif;
        }

        .catStyle {
            padding: 20px;
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


    <nav id="menu">
        <a href="categorie.php">Categorie</a>
        <a href="index.php"><?php include_once "loginCheck.php"; if($_SESSION['Logged'] != ''){ echo 'Logout'; } else { echo 'Registreer|Login'; } ?></a>
    </nav>
    <?php
    include_once "DBConnect.php";
    if($dbh->connect_errno){
        echo "Failed to connect to database. Error: " . $dbh->connect_error;
        die();
    }else{
        RedirectCategorie();

        $result = mysqli_query($dbh,"SELECT * FROM tblCategorie");

        while( $row = mysqli_fetch_array($result)) {
            $catID = str_replace(" ", "", $row['CategorieID']);
            echo "<div class='catStyle'>";
            echo "<a class='catStyle' href='?cat=".$catID."'>".$row['Title']."</a>";
            echo "</div>";
            echo "<hr><br>";
        }

        $dbh->close();
    }


    function RedirectCategorie() {
        global $dbh;
        if (isset($_GET['cat'])) {
            $cat = $_GET['cat'];
            var_dump($_GET);

            $result = mysqli_query($dbh,"SELECT CategorieID FROM tblCategorie WHERE CategorieID='".$cat."'");
            $row = mysqli_fetch_array($result);
            header("Location: thread.php?cat=".$row[0]);

        }
    }
    ?>
</body>
</html>