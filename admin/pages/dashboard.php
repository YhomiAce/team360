<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <p><a href="#"><i class="fa fa-dashboard"></i> Home</a> &nbsp;&nbsp; > &nbsp;&nbsp; <a class="active">Dashboard</a>
    </section>
    
    <!-- Main content -->
 

    <a href="?p=customers">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner mx-5">
  
          <?php
              error_reporting(E_ALL);
              ini_set('display_errors', 1);
              
                  require 'config/config.php';
                $sql2=$con->query("SELECT * FROM  auth") or die("Error2 : ". mysqli_error($con));
                  $count2 = mysqli_num_rows($sql2);

                if($count2 >= 1000)
                  {
                    $count2 = $count2/1000;
                    $count2 = ceil($count2);
                    $count2 = $count2."K";
                }
                elseif ($count2 >= 1000000)
                {
                  $count2 = $count2 / 1000000;
                  $count2 = ceil($count2);
                  $count2 = $count2."M";
                }   
            ?>
    
            <h3 style="font-style: italic; font-size: 50px;"><?php echo $count2; ?></h3>
             <!-- <p style="font-size: 20px; font-weight: bold; dfont-style: italic;">G / M</p>-->
             <h3 style="font-size: 15px; font-style: italic; padding-top: 30px; ">Total users</h3>
            </div>
          </div>
        </div>
</a>


    <a href="?p=withdrawRequest">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner mx-5">
  
          <?php
              error_reporting(E_ALL);
              ini_set('display_errors', 1);
              
                  require 'config/config.php';
                $sql2=$con->query("SELECT * FROM  investment WHERE withdrawalRequest = 'yes'") or die("Error2 : ". mysqli_error($con));
                  $count2 = mysqli_num_rows($sql2);

                if($count2 >= 1000)
                  {
                    $count2 = $count2/1000;
                    $count2 = ceil($count2);
                    $count2 = $count2."K";
                }
                elseif ($count2 >= 1000000)
                {
                  $count2 = $count2 / 1000000;
                  $count2 = ceil($count2);
                  $count2 = $count2."M";
                }   
            ?>
    
            <h3 style="font-style: italic; font-size: 50px;"><?php echo $count2; ?></h3>
             <!-- <p style="font-size: 20px; font-weight: bold; dfont-style: italic;">G / M</p>-->
             <h3 style="font-size: 15px; font-style: italic; padding-top: 30px; ">Withdrawal Request</h3>
            </div>
          </div>
        </div>
</a>
        
        <!-- ./col -->



<a href="?p=active">
 <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner mx-5">
  
          <?php
//$sql3 = $con->query("SELECT SUM(amount) as sumTotal FROM wallet_trans WHERE  account = 'Main' AND method = 'Transfer' AND status = 'Pending'") or die("Error2 : ". mysqli_error($con));

$sql3 = $con->query("SELECT * FROM auth WHERE  status = 'active'") or die("Error2 : ". mysqli_error($con));

$sumTotal = mysqli_num_rows($sql3);
//$sumTotal = $query3 ['sumTotal'];

    if($sumTotal >= 1000)
      {
        $sumTotal = $sumTotal/1000;
        $sumTotal = ceil($sumTotal);
      $sumTotal = $sumTotal."K";
    }
    elseif ($sumTotal >= 1000000)
    {
      $sumTotal = $sumTotal / 1000000;
      $sumTotal = ceil($sumTotal);
      $sumTotal = $sumTotal."M";
    }

?>

    
                <h3 style="font-style: italic; font-size: 50px;"><?php echo $sumTotal; ?></h3>
             <h3 style="font-size: 15px; font-style: italic; padding-top: 30px; ">Active users</h3>
            </div>
          </div>
        </div>
</a>
     






<a href="?p=deactivated">
  <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-green">
      <div class="inner mx-5">
  
          <?php
    
          //$sql3 = $con->query("SELECT SUM(amount) as sumTotal FROM wallet_trans WHERE  trans_type  = 'WPayout' AND account = 'Main' AND method = 'Transfer' AND status = 'Completed'") or die("Error2 : ". mysqli_error($con));

            $sql3 = $con->query("SELECT * FROM auth WHERE  status = 'deactivated' ") or die("Error2 : ". mysqli_error($con));

            $sumTotal = mysqli_num_rows($sql3);
            //$sumTotal = $query3 ['sumTotal'];

                if($sumTotal >= 1000)
                  {
                    $sumTotal = $sumTotal/1000;
                    $sumTotal = ceil($sumTotal);
                  $sumTotal = $sumTotal."K";
                }
                elseif ($sumTotal >= 1000000)
                {
                  $sumTotal = $sumTotal / 1000000;
                  $sumTotal = ceil($sumTotal);
                  $sumTotal = $sumTotal."M";
                }

            ?>

    
        <h3 style="font-style: italic; font-size: 50px;"><?php echo $sumTotal; ?></h3>
        <h3 style="font-size: 15px; font-style: italic; padding-top: 30px; ">Deactivated users</h3>
        </div>
      </div>
    </div>
</a>
     






<a href="?p=investors">
 <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-blue">
      <div class="inner mx-5">
          <?php
    
              //$sql3 = $con->query("SELECT SUM(amount) as sumTotal FROM wallet_trans WHERE  trans_type  = 'WPayout' AND method = 'Withdrawal' AND status = 'Pending'") or die("Error2 : ". mysqli_error($con));

              $sql3 = $con->query("SELECT * FROM investment WHERE  status = 'invested'") or die("Error2 : ". mysqli_error($con));

              $sumTotal = mysqli_num_rows($sql3);
              //$sumTotal = $query3 ['sumTotal'];

                  if($sumTotal >= 1000)
                    {
                      $sumTotal = $sumTotal/1000;
                      $sumTotal = ceil($sumTotal);
                    $sumTotal = $sumTotal."K";
                  }
                  elseif ($sumTotal >= 1000000)
                  {
                    $sumTotal = $sumTotal / 1000000;
                    $sumTotal = ceil($sumTotal);
                    $sumTotal = $sumTotal."M";
                  }

              ?>    
        <h3 style="font-style: italic; font-size: 50px;"><?php echo $sumTotal; ?></h3>
        <h3 style="font-size: 15px; font-style: italic; padding-top: 30px;">Investors</h3>
      </div>
    </div>
  </div>
</a>





<a href="?p=accumulated">
 <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-green">
      <div class="inner mx-5">
        <?php
              $sql3 = $con->query("SELECT SUM(amount) as sumTotal FROM investment WHERE  status = 'invested'") or die("Error2 : ". mysqli_error($con));

                  if($sumTotal >= 1000)
                    {
                      $sumTotal = $sumTotal/1000;
                      $sumTotal = ceil($sumTotal);
                    $sumTotal = $sumTotal."K";
                  }
                  elseif ($sumTotal >= 1000000)
                  {
                    $sumTotal = $sumTotal / 1000000;
                    $sumTotal = ceil($sumTotal);
                    $sumTotal = $sumTotal."M";
                  }

              ?>    
        <h3 style="font-style: italic; font-size: 50px;"><?php echo $sumTotal; ?></h3>
        <h3 style="font-size: 15px; font-style: italic; padding-top: 30px;">Accumulated amount</h3>
      </div>
    </div>
  </div>
</a>
