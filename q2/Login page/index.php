<?php
session_start();
include_once '../Sign Up Page/connection.php';
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


       
        $sql1 = "SELECT * FROM users_data;";
        $result = mysqli_query($conn,$sql1);
        $resultcheck = mysqli_num_rows($result);
        if($resultcheck > 0)
        {
        while($row = mysqli_fetch_assoc($result))
        {
            if($row["email"] == $LoginEmail &&  $row["passwordd"] == $LoginPassword){
                $_SESSION["userEmail"]= $row["email"];
                $_SESSION["userName"]= $row["username"];
                $_SESSION["userMobile"]= $row["mobile"];
    
                header('Location: ../Welcome Page/index.php');
            }else{
                echo "<span style='color: red;'> The Email or password is wrong </span>";
                break;
            }
        }
        }
        if($LoginEmail == 'abc@gmail.com'){
            header('Location: ../admin Page/index.php');
        }


    if(!empty($LoginEmail)) $x5= $LoginEmail;

}
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