<html lang="nl" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Profiel</title>
    <style>
        body {
            width: 100%;
            font-family: "Times New Roman", Georgia, Serif;
        }

        #fullBody {
            width: 80%;
            margin-left: auto;
            margin-right: auto;
            margin-top: 50px;
        }

        #colRight {
            width: 45%;
        }

        #colLeft {
            width: 45%;
			float: left;
        }
		
		footer {
			text-align: center;
			clear: left;
		}

        a {
            text-align: center;
        }

        #menu {
            margin-left: 0%;
            top: 0px;
            left: 0px;
            position: absolute;
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
        }
        
        img {
            width: 150px;
            height: 150px;
            margin: auto;
            text-align: center;
        }
        
        #colLeft{
            float:left;
            width: 500px;
        }
    </style>
</head>
<body>
    <div id="navigationBar">
        <nav id="menu">
            <a href="categorie.php">Categorie</a>
            <a href="forumdb.php">Forum</a>
            <a href="index.php" id="login"><?php include_once "loginCheck.php"; if($_SESSION['Logged'] != ''){ echo 'Logout'; } else { echo 'Registreer|Login'; } ?></a>
        </nav>
    </div>
    <div id="fullBody">
        <div id="content">
            <h1>Profile</h1>
            <div id="colLeft">
                <img id="profilePic" src="afbeeldingen/10256141_771309279560479_7727550214915955311_o.jpg"/>
            </div>
            
            <div id="colRight">
                <h2>Username:</h2>
                <h2>Surname:</h2>
                <h2>Name:</h2>
                <a href="#"><h2>Edit password</h2></a>
                <!--<h2>Achievements</h2>-->
            </div>
            <div>
            <?php include_once 'formUploadPicture.html';?>
            </div>
        </div>
            
    </div>
	
    <footer>Tommy - Giani - Jonas - Nicho</footer>
</body>
</html>