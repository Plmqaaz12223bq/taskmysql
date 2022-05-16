<?php
session_start();
include_once '../config/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Welcome</title>
    <style>
        body{
            text-align: center;
            font-size: 20px;
            font-family: 'Josefin Sans', sans-serif;
        }
        #container{padding: 2%;}
        h1{margin: 1%;}
        p{margin: 1%;}
       
        #box p {
            text-align: left;
            margin: 3%;
        }
        img{
            width: 40%;
            height: 40%;
            margin: 1%;
        }
        #logouta{
            text-decoration: none;
            color: #5A54FF;
            margin: 2%;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div id="container">
        <img src="https://thumbs.dreamstime.com/b/welcome-vector-illustration-opening-web-page-banner-presentation-social-media-documents-posters-greeting-cards-217942470.jpg">
        <div id="box">
            <p>Full Name: <?php echo "<span style='color:#5A54FF; font-weight: bold;'>" .$_SESSION["userName"] 
            ."</span>"; ?></p>
            <p>Email: <?php echo "<span style='color:#5A54FF; font-weight: bold;'>" .$_SESSION["userEmail"] 
            ."</span>"; ?></p>
            <p>Mobile: <?php echo "<span style='color:#5A54FF; font-weight: bold;'>" .$_SESSION["userMobile"] 
            ."</span>"; ?></p>
        </div>
        <a id="logouta" href="../index.html">Log Out</a>
    </div>
</body>
</html>