<?php
    $servername='localhost';
    $username='root';
    $password='Root@1234';
    $dbname = "test";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$conn){
          die('Could not Connect MySql Server:');
        }

?>
