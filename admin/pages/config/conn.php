<?php

// localhost
    // $servername="localhost"; //hostname
    // $username="root"; //mysql username
    // $password="6969"; //mysql password
    // $dbName="investment_db"; //Database name

    // Heroku
  // $servername = "us-cdbr-east-05.cleardb.net";
  // $dbName = "heroku_0b87efe5a6815fb";
  // $username = "b33e8c3dfe31bc";
  // $password = "05d1f097";


  // Cpanel
  $servername="localhost"; //hostname
  $username="team360_backend_root"; //mysql username
  $password="Chairman@2022!"; //mysql password
  $dbName="team360_backend"; //Database name


  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
