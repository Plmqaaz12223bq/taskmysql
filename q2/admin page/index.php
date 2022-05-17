<?php
session_start();
include_once '../Sign Up Page/connection.php';

if(isset($_POST["delete"])){
    $id= $_POST["id"];
    $deletingdata= "DELETE FROM users_data WHERE id=$id;";
    mysqli_query($conn , $deletingdata);
}

if(isset($_POST["updatename"])){
    $idid= $_POST["idid"];
    $newname= $_POST["newname"];
    $query= "UPDATE users_data SET username='$newname' WHERE id=$idid;";
    $x= mysqli_query($conn , $query);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <style>
        body{
            text-align: center;
            font-size: 20px;
            font-family: 'Josefin Sans', sans-serif;
        }
        div{padding: 5%;}
        h1{margin: 1%;}
        th, td {
            border: 1px solid rgb(137, 137, 240) ;
            text-align: center;
            padding: 8px;
        }
        table{
            margin: auto;
            text-align: center;
            padding: 8px;
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
    
    <div>
        <h1>Users Data</h1>
       <table> 
        <tr>
        <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Date Created</th>
                <th scope="col">Date Last Login</th>
                <th scope="col">Update</td>
                <th scope="col">Delete</td>
        </tr>
        <?php
        
        $sql1="SELECT * FROM users_data ;";
        $result= mysqli_query($conn , $sql1);
        $result_check= mysqli_num_rows($result);
    
        if ($result_check > 0) {
            while ($row=mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>".$id."</td>
                    <td>".$row['first_name']."</td>
                    <td>".$row['email']."</td>
                    <td>".$row['user_password']."</td>
                    <td>".$row['date_create']."</td>
                    <td>".$row['last_login']."</td>
                    <td>".$row['edit']."</td>
                </tr>";
            $id++;  
       }
   }
        ?>
    </table>
    <a id="logouta" href="../index.html">Log Out</a>
</div>
</body>
</html>