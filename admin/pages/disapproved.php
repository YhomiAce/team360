<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'pages/config/conn.php';
require_once 'pages/config/actions.php';
$rows = fetchAllDisapprovedWithdrawal($conn);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <div class="row">
      <div class="col-md-6">
      <h2 style="margin-top: 0px;">
       Disapproved Withdrawals
      </h2>
      <p><a href="#"><i class="fa fa-dashboard"></i> Home</a> &nbsp;&nbsp; > &nbsp;&nbsp; <a href="?p=withdrawals" class="active">Withdrawals</a></p>
    </div>
    <!-- <div class="col-md-4" style="text-align: left; margin-top: 10px;">  <a href="?p=new_product"> <button class="btn btn-primary" style="font-size: 16px; font-weight: 600;">Add New Product</button></a>  </div>-->
     

    </section>
     <!-- Main content -->
    <section class="content" style="margin-top: 0px; padding-top: 0px; ">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12" style="background-color: #fff; margin-left: 10px; border:solid; border-width: thin; border-color: #ddd;">

          <!-- small box -->
        
         <h4 style="color: green; font-weight: bold;"></h4>
          <div style="dborder: solid; border-width: thin; border-color: #ccc; margin-top: 0px; padding: 1.5em; dheight: 500px; ">
       
 <table class="table dtable-striped table-hover no-head-border" border="1" style="border:solid; border-color: black; border-width: thin;">
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">No</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Name</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Amount</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Balance</th> 
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Bank</th> 
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Account Name</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Account Number</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Date</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Status</th>
 
 
 <?php foreach($rows as $key=>$row): ?>
  <?php 
  $user = getUserInfo($conn, $row['userId']);
  $userId = getUserInfo($conn, $row['userId'])["id"];
  ?>
  <tr>
    <td style="border:solid; border-width: thin; border-color: #eee;"><?= $key+1; ?></td>
    <td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $user['fullname']; ?></td>
    <td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $row['amount']; ?></td>
    <td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $user['wallet']; ?></td>
    <td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $row['bank_name']; ?></td>
    <td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $row['acct_name']; ?></td>
    <td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $row['acct_number']; ?></td>
    <td style="border:solid; border-width: thin; border-color: #eee;"><?php echo date('d-M-Y',strtotime('+0 days',strtotime(str_replace('/', '-', $row['created_at'])))); ?></td>
    <td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $row['status']; ?></td>
    
  </td>

  </tr>


<?php endforeach; ?>
 </tbody>
</table>


 
        </div>
        </div>
        <!-- ./col -->
     
     
  <div class="col-lg-6 col-xs-12">
          <!-- small box -->
          <div>
        </div>
        </div>
     
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
     </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

   
<?php include('includes/js.php')?>
</body>
</html>


