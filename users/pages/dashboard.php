<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'config/actions.php';
require_once 'config/conn.php';
$email = $_SESSION['user'];
// echo $email;


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


    $user = currentUserByEmail($conn, $email);
    $userId = $user['id'];
    // echo $userId;
    $investments = allInvestment($conn, $userId);
    $activeInvestment = activeInvestment($conn, $userId);
    $host = $_SERVER['SERVER_NAME'];
    $reference = $user['reference'];
    $link = $host . "/users/?reference=$reference";
    // https://authentication.team360grow.com/users/signup.php?reference=$reference

    // $totalDeposit = getTotalDeposit($conn, $userId);
    // $investedAmount = getAllUserInvestment($conn, $userId);

    function formatMoney($money)
    {
      if ($money >= 50000 && $money < 1000000) {
        $money = $money / 1000;
        $money = ceil($money);
        $money = $money . "K";
        return $money;
      } elseif ($money >= 1000000) {
        $money = $money / 1000000;
        $money = ceil($money);
        $money = $money . "M";
        return $money;
      } else {
        return $money;
      }
    }
    // print_r($investedAmount);

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
          <h5 class="text-2xl py-12">Next Withdrawal Date </h5>
          <h3 style="font-size: 40px;" class="py-4"><?= $activeInvestment ? date('d-M-Y', strtotime('+0 days', strtotime(str_replace('/', '-', $activeInvestment[0]['expiredAt'])))) : "No Investment"; ?></h3>
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
          <h5 class="text-2xl py-12">Referral Link <?= $host; ?></h5>
          <h3><a data-toggle="tooltip" title="Copy to Clipboard" href=" https://authentication.team360grow.com/users/signup.php?reference=<?= $reference ?>" class="btn btn-primary btn-lg" id="copyBtn">Share Link</a></h3>
        </div>
        <div class="icon" style="padding-top: 10px;">
          <i class="glyphicon glyphicon"></i>
        </div>
      </div>
    </div>


  </div>

  <script>
    // $("#copyBtn").click((e) => {
    //   e.preventDefault();
    //   var copy = document.getElementById("copyBtn").getAttribute("href")
    //   console.log(copy);
    // });
    $('#copyBtn').click(function(e) {
      e.preventDefault();
      var copyText = $(this).attr('href');

      document.addEventListener('copy', function(e) {
        e.clipboardData.setData('text/plain', copyText);
        e.preventDefault();
      }, true);

      document.execCommand('copy');
      console.log(copyText);
      alert('Copied Referral link to clipboard');
    });
  </script>