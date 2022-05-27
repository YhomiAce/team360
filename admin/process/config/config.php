<?php
# Localhost
// $host="localhost"; //hostname
// $username="root"; //mysql username
// $password=""; //mysql password
// $db_name="newhelper_app"; //Database name


// Heroku
// $host = "us-cdbr-east-04.cleardb.com";
// $db_name = "heroku_f4565c2e7db9247";
// $username = "be2ec2be0cee8b";
// $password = "2f4ac3b3";

// Cpanel
$host = "localhost"; //hostname
$username = "team360_backend_root"; //mysql username
$password = "Chairman@2022!"; //mysql password
$dbName = "team360_backend"; //Database name
//connect to database
$con = mysqli_connect($host, $username, $password, $db_name);
// if(!$con)
// {die('could not connect1 Error:'.mysqli_error());}
//mysql_select_db($db_name,$con)
//or die("could not connect2: ".mysql_error());
