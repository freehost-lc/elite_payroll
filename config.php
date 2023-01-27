<?php
    $servername='localhost';
    $username='root';
    $password='';
    $dbname = "elite_db";
    $conn=@mysqli_connect($servername,$username,$password,"$dbname");
      if(!$conn){
          echo "not connected to database.";
        }else{
          echo "connected to database. ";
        }
?>