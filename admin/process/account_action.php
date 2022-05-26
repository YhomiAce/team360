<?php
include 'config/config.php';
if(isset($_GET['id']) && isset($_GET['act']) && $_GET['act'] == 'activate' )
{
      $id = $_GET['id'];
      $sqlx = $con->query("UPDATE  auth  SET status = 'active' WHERE id = '$id'") or die("error: ".mysqli_error($con));
      
      if($sqlx)
      {
      $suc = "Yes";
      }
      else
      {
      $suc = "No";
      }
 
      $output = array('success'=>$suc);
      echo $_GET['callback']."(".json_encode($output).")"; //output JSON data	
}






if(isset($_GET['id']) && isset($_GET['act']) && $_GET['act'] == 'deactivate' )
{
      $id = $_GET['id'];
      $sqlx = $con->query("UPDATE  auth  SET status = 'deactivated' WHERE id = '$id'") or die("error: ".mysqli_error($con));
      
      if($sqlx)
      {
      $suc = "Yes";
      }
      else
      {
      $suc = "No";
      }
 
      $output = array('success'=>$suc);
      echo $_GET['callback']."(".json_encode($output).")"; //output JSON data	
}

             
      ?>