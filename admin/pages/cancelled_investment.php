<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'pages/config/conn.php';
require_once 'pages/config/actions.php';
$rows = fetchAllCancelledInvestments($conn);

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <div class="row">
      <div class="col-md-6">
      <h2 style="margin-top: 0px;">
      Cancelled Investments: <?= count($rows)  ?>
      </h2>
      <p><a href="?p=dashbaord"><i class="fa fa-dashboard"></i> Home</a> &nbsp;&nbsp; > &nbsp;&nbsp;</p>
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
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Interest</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Total Earned</th> 
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Status</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Start Date</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Withdrawal Date</th>
 
 <?php foreach($rows as $key=>$row): ?>
  <?php 
  $user = getUserInfo($conn, $row['userId']);
  $userId = getUserInfo($conn, $row['userId'])["id"];
//   print_r(getUserDetails($conn, $row['user']));
//   echo $row['user'];
//   echo $userId;
//   print_r((fetchUserWallet($conn,$userId)['balance']));
  ?>
  <tr>
    <td style="border:solid; border-width: thin; border-color: #eee;"><?= $key+1; ?></td>
    <td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $user['fullname']; ?></td>
    <td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $row['amount']; ?></td>
    <td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $row['rate']; ?></td>
    <td style="border:solid; border-width: thin; border-color: #eee;"><?php echo ($row['amount'] +($row['amount'] * ($row['rate'])/100)); ?></td>
    <td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $row['status']; ?></td>
    <td style="border:solid; border-width: thin; border-color: #eee;"><?php echo date('d-M-Y',strtotime('+0 days',strtotime(str_replace('/', '-', $row['createdAt'])))); ?></td>
    <td style="border:solid; border-width: thin; border-color: #eee;"><?php echo date('d-M-Y',strtotime('+0 days',strtotime(str_replace('/', '-', $row['expiredAt'])))); ?></td>
    

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

<script>
  $('body').on('click','.approveBtn',function(e){
    e.preventDefault()
    var appId = $(this).attr('id');
    console.log(appId);
    Swal.fire({
        title: 'Are you sure You want to approve?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, approve Payment!'
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url:'pages/config/controller.php',
                method:'post',
                data:{approveId:appId},
                success:(res)=>{

                  console.log(res);
                  if (res ==="success") {
                    

                    Swal.fire({
                      title: "Successful Approval",
                      icon: 'success',
                      text: "User Payment Approved"
                    }).then(()=>{
                    location.reload()

                    })
                    
                  }
                  if (res ==="balance") {
                    Swal.fire({
                      title: "Failed To Approve",
                      icon: 'warning',
                      text: "Insufficient Balance"
                    }).then(()=>{
                    // location.reload()
                    })
                    
                  }

                  if (res ==="fail") {
                    Swal.fire({
                      title: "Failed To Approve",
                      icon: 'warning',
                      text: "<h2>Server Error: Contact Administrator</h2>"
                    }).then(()=>{
                    // location.reload()
                    })
                    
                  }
                }
            })
            
        }
    })
    
})

// Disapprove
$('body').on('click','.disapproveBtn',function(e){
    e.preventDefault()
    var appId = $(this).attr('id');
    Swal.fire({
        title: 'Are you sure You want to Disapprove?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Disapprove Payment!'
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url:'pages/config/controller.php',
                method:'post',
                data:{disapproveId:appId},
                success:(res)=>{
                  console.log(res);
                  if (res ==="success") {
                    Swal.fire({
                      title: "Success",
                      icon: 'success',
                      text: "User request has been Disapproved"
                    }).then(()=>{
                      location.reload()
                    })
                    
                  }
                  
                  if (res ==="fail") {
                    Swal.fire({
                      title: "Failed To Disapprove",
                      icon: 'warning',
                      text: "<h2>Server Error: Contact Administrator</h2>"
                    }).then(()=>{
                      location.reload()
                      // console.log(res);
                    })
                    
                  }
                }
            })
            
        }
    })
    
})
</script>
</body>
</html>


