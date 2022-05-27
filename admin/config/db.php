<?php
    // $servername = "localhost";
    // $dbName = "investment_db";
    // $username = "root";
    // $password = "6969";

     // Heroku
  // $servername = "us-cdbr-east-04.cleardb.com";
  // $dbName = "heroku_f4565c2e7db9247";
  // $username = "be2ec2be0cee8b";
  // $password = "2f4ac3b3";


  // Cpanel
  $servername="localhost"; //hostname
  $username="team360_backend_root"; //mysql username
  $password="Chairman@2022!"; //mysql password
  $dbName="team360_backend"; //Database name

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbName;charset=UTF8", $username, $password);
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $conn -> setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

?>