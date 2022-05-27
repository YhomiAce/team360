<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <p><a href="#"><i class="fa fa-dashboard"></i> Home</a> &nbsp;&nbsp; > &nbsp;&nbsp; <a class="active">Dashboard</a>
    </section>
    <?php
              error_reporting(E_ALL);
              ini_set('display_errors', 1);
              
                  require_once 'config/db.php';
                  require_once 'config/actions.php';
                  $users = allUsers($conn);
                  $activeUsers = activeUsers($conn);
                  $deactive = deactivatedUsers($conn);
                  $withdrawals = activeWithdrawalRequest($conn);
                  $investments = activeInvestment($conn);
                
            ?>
    <!-- Main content -->
 

    <a href="?p=customers">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner mx-5">
    
            <h3 style="font-style: italic; font-size: 50px;"><?php echo count($users); ?></h3>
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
    
            <h3 style="font-style: italic; font-size: 50px;"><?php echo count($withdrawals); ?></h3>
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
    
                <h3 style="font-style: italic; font-size: 50px;"><?php echo count($activeUsers); ?></h3>
             <h3 style="font-size: 15px; font-style: italic; padding-top: 30px; ">Active users</h3>
            </div>
          </div>
        </div>
</a>
     






<a href="?p=deactivated">
  <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-green">
      <div class="inner mx-5">
  
          
        <h3 style="font-style: italic; font-size: 50px;"><?php echo count($deactive); ?></h3>
        <h3 style="font-size: 15px; font-style: italic; padding-top: 30px; ">Deactivated users</h3>
        </div>
      </div>
    </div>
</a>
     






<a href="?p=investors">
 <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-blue">
      <div class="inner mx-5">
          
        <h3 style="font-style: italic; font-size: 50px;"><?php echo count($investments); ?></h3>
        <h3 style="font-size: 15px; font-style: italic; padding-top: 30px;">Active Investment</h3>
      </div>
    </div>
  </div>
</a>





<!-- <a href="?p=accumulated">
 <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-green">
      <div class="inner mx-5">
          
        <h3 style="font-style: italic; font-size: 50px;"><?php echo count($users); ?></h3>
        <h3 style="font-size: 15px; font-style: italic; padding-top: 30px;">Accumulated amount</h3>
      </div>
    </div>
  </div>
</a> -->
