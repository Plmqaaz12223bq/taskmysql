<?php  
    $dbHost="localhost";  
    $dbName="test";  
    $dbUser="root";      
    $dbPassword="";       
    try{  
        $dbConn= new PDO("mysql:host=$dbHost;dbname=$dbName",$dbUser,$dbPassword); 
        Echo "Successfully connected with myDB database";  
    } catch(PDOException $e){  
    Echo "Connection failed" . $e->getMessage();  
    }
        $x= "INSERT INTO students ( std_name ,std_dob , city ) VALUES ( 'ghufran','1998-1-28', 'aqaba' );";
        
        $y="DELETE FROM students WHERE std_id='3'";
    
        $sql1="UPDATE students SET std_name ='marwa' WHERE std_id='6';";
    
        $sql2="CREATE TABLE namename(first_name VARCHAR(255) NOT NULL,last_name VARCHAR(255) NOT NULL );";

    $dbConn -> exec($x);
    $dbConn->exec($y);
    $dbConn->exec($sql1);
    $dbConn->exec($sql2);

    $sql3 = "INSERT INTO namename (id,std_name,std_dob) VALUES ('1','ghufran','1998-1-28');";
    $sql4="SELECT * FROM students
    INNER JOIN namename ON students.id=namename.id;";
    $users=$conn->query($sql4);
    
    foreach ($users as $row) {
        print $row["user_name"] . " - " . $row["id"] . "<br/>";
    }
?>