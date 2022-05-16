<?php
session_start();
include_once '../config/connection.php';
if (isset($_POST['submit']))

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $LoginEmail= $_POST["LoginEmail"];
    $LoginPassword= $_POST["LoginPassword"];

    if(empty($LoginEmail)){
        $LoginEmailReq= "<span style='color: red;'> Please enter your email </span>";
        echo $LoginEmailReq;
    }
    else if(empty($LoginPassword)){
        $LoginPasswordReq= "<span style='color: red;'> Please enter your password </span>";
        echo $LoginPasswordReq;
    }
    else{
        if($LoginEmail == "Admin@admin.com" && $LoginPassword == "SuperUser Admin*22"){
            header('Location: ../admin Page/index.php');
        }else if($LoginEmail == "Admin@admin.com" && $LoginPassword != "SuperUser Admin*22"){
            echo "<span style='color: red;'> The password is wrong </span>";
        }
        foreach ($_SESSION["usersData"] as $key => $value) {
            if($LoginEmail == $value["email"] && $LoginPassword == $value["password"]){
                $_SESSION["userEmail"]= $value["email"];
                $_SESSION["userName"]= $value["name"];
                $_SESSION["userMobile"]= $value["mobile"];
                $_SESSION["usersData"][$key]["Last-Login-Date"]= date("d-m-Y");
                header('Location: ../welcome Page/index.php');
            }else if($LoginEmail == $value["email"] && $LoginPassword != $value["password"]){
                echo "<span style='color: red;'> The password is wrong </span>";
                break;
            }else if($value == $_SESSION["usersData"][count($_SESSION["usersData"])-1]){
                $notFound= "<span style='color: red;'> You are not registered </span>";
            }
        }
    }
    if(isset($notFound) && $LoginEmail != "Admin@admin.com"){
        echo $notFound;
    }



    if(!empty($LoginEmail)) $x5= $LoginEmail;

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body{
            text-align: center;
            font-size: 20px;
            font-family: 'Josefin Sans', sans-serif;
        }
        div{padding: 5%;}
        h1{margin: 2%;}
        #p1{margin: 2%;}
        label{
            margin-top: 2%;
        }
        #LoginEmailLabel{
            position: relative;
            left: -11%;
        }
        #LoginPasswordLabel{
            position: relative;
            left: -10%;
        }
        input{
            width: 25%;
            height: 5vh;
            margin-bottom: 2%;
            font-size: 20px;
            font-family: 'Josefin Sans', sans-serif;
        }
        input::placeholder {
            font-size: 18px;
            font-family: 'Josefin Sans', sans-serif;
        }
        button{
            width: 25%;
            height: 6vh;
            border-radius: 25px;
            margin-top: 2%;
            border: solid rgb(137, 137, 240) 1px;
            background-color:rgb(137, 137, 240) ;
            color: white;
            font-size: 20px;
            font-family: 'Josefin Sans', sans-serif;
        }
        a{
            text-decoration: none;
            font-weight: bold;
            color: black;
        }
    </style>
</head>
<body>
    <div>
        <h1>Login</h1>
        <form action="" method="post">
            <p id="p1">Welcome back! Login with your credentials.</p>

            <label for="LoginEmail" id="LoginEmailLabel">Email</label> <br>
            <input type="text" id="LoginEmail" name="LoginEmail" placeholder="ghufran@gmail.com" 
            value="<?php if(isset($x5)) echo $x5;?>"> <br>

            <label for="LoginPassword" id="LoginPasswordLabel">Password</label> <br>
            <input type="password" id="LoginPassword" name="LoginPassword"> <br>

            <button type="submit">Login</button> <br>
        </form>
        <p id="p2">Dont have an account?<a href="../Sign Up Page/index.php">Sign Up</a></p>
    </div>
</body>
</html>