<?php
          error_reporting(E_ALL);
          ini_set('display_errors', 1);
          require_once 'config/actions.php';
          require_once 'config/conn.php';


?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header text-xl">
      <p><a href="#"><i class="fa fa-dashboard"></i> Home</a> &nbsp;&nbsp; > &nbsp;&nbsp; <a class="active">Dashboard</a>
    </section>
    <div class="w-full pt-16">
      <!-- Main content -->
      <?php
          
          $email = $_SESSION['user'];
          $user = currentUserByEmail($conn, $email);
          $userId = $user['id'];
        $investments = allInvestment($conn, $userId);
       $activeInvestment = activeInvestment($conn, $userId);

        // $totalDeposit = getTotalDeposit($conn, $userId);
        $investedAmount = getAllUserInvestment($conn, $userId);
        
        function formatMoney($money){
          if($money >= 50000 && $money < 1000000)
            {
              $money = $money/1000;
              $money = ceil($money);
              $money = $money."K";
              return $money;
          }
          elseif ($money >= 1000000)
          {
            $money = $money / 1000000;
            $money = ceil($money);
            $money = $money."M";
            return $money;
          }else{
            return $money;
          }   
      }
      print_r($investedAmount);

    ?>

    
        <div class="col-lg-4 col-xs-6 cursor-pointer">
          <!-- small box -->
          <div class="small-box bg-white shadow rounded-xl text-orange-700 hover:text-orange-400">
            <div class="inner md:mx-5">
            <h5 class="text-2xl py-12 ">Available Balance</h5>    
            <h3 style="font-size: 30px;" class="py-6  pb-8">NGN <?php echo number_format($user['wallet']); ?></h3>
            </div>
            <div class="icon" style="padding-top: 10px">
              <i class="glyphicon glyphicon"></i>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-xs-6 cursor-pointer">
          <!-- small box -->
          <div class="small-box bg-white shadow rounded-xl text-orange-700 hover:text-orange-400">
            <div class="inner md:mx-5">
            <h5 class="text-2xl py-12">Active Investment</h5>    
            <h3 style="font-size: 30px;" class="py-4"><?= count($activeInvestment) ?></h3>
            </div>
            <div class="icon" style="padding-top: 10px;">
              <i class="glyphicon glyphicon"></i>
            </div>
          </div>
        </div>

  
     

        <div class="col-lg-4 col-xs-6 cursor-pointer">
          <!-- small box -->
          <div class="small-box bg-white shadow rounded-xl text-orange-700 hover:text-orange-400">
            <div class="inner md:mx-5">
              <h5 class="text-2xl py-12">Interest Rate</h5>    
              <h3 style="font-size: 40px;" class="py-4"><?php echo 30 ?>%</h3>
            </div>
            <div class="icon" style="padding-top: 10px;">
              <i class="glyphicon glyphicon"></i>
            </div>
          </div>
        </div>


        <div class="col-lg-4 col-xs-6 cursor-pointer">
          <!-- small box -->
          <div class="small-box bg-white shadow rounded-xl text-orange-700 hover:text-orange-400">
            <div class="inner md:mx-5">
              <h5 class="text-2xl py-12">Next Withdrawal Date</h5>    
              <h3 style="font-size: 40px;" class="py-4"><?= $activeInvestment ? date('d-M-Y',strtotime('+0 days',strtotime(str_replace('/', '-', $activeInvestment[0]['expiredAt'])))) : "No Investment"; ?></h3>
            </div>
            <div class="icon" style="padding-top: 10px;">
              <i class="glyphicon glyphicon"></i>
            </div>
          </div>
        </div>


      </div>