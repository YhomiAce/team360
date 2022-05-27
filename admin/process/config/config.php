<?php
# Localhost
// $host="localhost"; //hostname
// $username="root"; //mysql username
// $password=""; //mysql password
// $db_name="newhelper_app"; //Database name


// Heroku
$servername = "us-cdbr-east-05.cleardb.net";
  $dbName = "heroku_0b87efe5a6815fb";
  $username = "b33e8c3dfe31bc";
  $password = "05d1f097";

// Cpanel
// $host = "localhost"; //hostname
// $username = "team360_backend_root"; //mysql username
// $password = "Chairman@2022!"; //mysql password
// $dbName = "team360_backend"; //Database name
//connect to database
$con = mysqli_connect($host, $username, $password, $db_name);
// if(!$con)
// {die('could not connect1 Error:'.mysqli_error());}
//mysql_select_db($db_name,$con)
//or die("could not connect2: ".mysql_error());
