<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header text-xl">
      <p><a href="#"><i class="fa fa-dashboard"></i> Home</a> &nbsp;&nbsp; > &nbsp;&nbsp; <a class="active">Dashboard</a>
    </section>
    <div class="w-full pt-16">
      <!-- Main content -->
      <?php
          error_reporting(E_ALL);
          ini_set('display_errors', 1);
          require 'config/config.php';
          $sql=$con->query("SELECT * FROM  investment") or die("Error2 : ". mysqli_error($con));
          while ($rows=mysqli_fetch_array($sql))
            {
              $amount=$rows['amount'];
              $rate = $rows['rate'];
              $reward = $rate/100 * $amount;
              $balance=$reward+$amount;
              
              $date_t =$rows['expiredAt'];

              $date_expired = date('d-M-Y',strtotime('+0 days',strtotime(str_replace('/', '-', $date_t))));
            }

    

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
    ?>

    
        <div class="col-lg-4 col-xs-6 cursor-pointer">
          <!-- small box -->
          <div class="small-box bg-white shadow rounded-xl text-orange-700 hover:text-orange-400">
            <div class="inner md:mx-5">
            <h5 class="text-2xl py-12 ">Total Deposits</h5>    
            <h3 style="font-size: 30px;" class="py-6  pb-8">NGN <?php echo formatMoney($amount); ?></h3>
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
            <h5 class="text-2xl py-12">Reward</h5>    
            <h3 style="font-size: 30px;" class="py-4">NGN <?php echo formatMoney($reward); ?></h3>
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
            <h5 class="text-2xl py-12 mx-5">Available Balance</h5>    
            <h3 style="font-size: 30px;" class="py-4">NGN <?php echo formatMoney($balance) ?></h3>
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
              <h5 class="text-2xl py-12">Increase Rate</h5>    
              <h3 style="font-size: 40px;" class="py-4"><?php echo $rate ?>%</h3>
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
              <h5 class="text-2xl py-12">Till</h5>    
              <h3 style="font-size: 40px;" class="py-4"><?php echo $date_expired ?></h3>
            </div>
            <div class="icon" style="padding-top: 10px;">
              <i class="glyphicon glyphicon"></i>
            </div>
          </div>
        </div>


      </div>