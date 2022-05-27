<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <div class="row">
      <div class="col-md-6">
      <h2 style="margin-top: 0px;">
      	<?php
          require_once 'config/db.php';
          require_once 'config/actions.php';
          $users = allUsers($conn);
        ?>
       <?php echo count($users); ?> Total Users
      </h2>
      <p><a href="../admin/?p=dashboard"><i class="fa fa-dashboard"></i> Home</a> &nbsp;&nbsp; > &nbsp;&nbsp; <a class="active">All Users</a></p>
    </div>
     <!--<div class="col-md-4" style="text-align: left; margin-top: 10px;">  <a href="?p=new_category"> <button class="btn btn-primary" style="font-size: 16px; font-weight: 600;">Add New Category</button></a>  </div>-->
     

    </section>
     <!-- Main content -->
    <section class="content" style="margin-top: 0px; padding-top: 0px; padding-right:40px; ">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-10 col-xs-12" style="overflow-x:auto; background-color: #fff; margin-left: 10px; margin-right: 10px; border:solid; border-width: thin; border-color: #ddd;">

          <!-- small box -->
          <!-- <a href="add_product.php"><button style="background-color: #0060cc; height: 40px; width: 250px; border:none; border-radius: 5px; color: white; font-size: 16px;">ADD PRODUCT</button></a> -->
      
         <h4 style="color: green; font-weight: bold;"></h4>
          <div style="border: solid; border-width: thin; border-color: #ccc; margin-top: 0px; padding: 1.5em; height: 500px; ">
       
<div style="margin: 20px; margin-top: 0px;">
        <form method="get" action="#">
          <input type="hidden" name="p" value="customers">
        <input type="text" name="q" placeholder="Search By Name or Email or Phone" style="height: 30px; font-size: 15px; padding: 15px; width: 80%; border:solid; border-color: #cccccc;"> 
       </form>
     </div>

<table class="table dtable-striped table-hover no-head-border" border="1" style="border:solid; border-color: black; border-width: thin; overflow-x:auto;">
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">NO</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Full Name</th>
<!-- <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Last Name</th>-->
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Email</th>
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Wallet Balance</th> 
 <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Date Joined</th>
<th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Action</th>
<!-- <th style="border:solid; border-width: thin; border-color: #eee;">Delete</th>-->


<?php foreach($users as $key => $user) : ?>

<tr>
  <td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $key + 1; ?></td>
  <td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $user["fullname"]; ?></td>
  <td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $user["email"]; ?></td>
  <td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $user["wallet"]; ?></td>
 <td style="border:solid; border-width: thin; border-color: #eee;"><?php echo date('d-M-Y',strtotime('+0 days',strtotime(str_replace('/', '-', $user['created_at'])))); ?></td>
 <td style="border:solid; border-width: thin; border-color: #eee;"> 
 <button class="btn btn-primary activateBtn" id="<?=$user["id"]; ?>" <?=$user["status"] == 1 ? "disabled" : '' ?>>Activate</button>
 <button class="btn btn-danger deactivateBtn" id="<?=$user["id"]; ?>" <?=$user["status"] == 0 ? "disabled" : '' ?>>Deactivate</button>
</td>
</tr>


<?php endforeach; ?>

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
$('body').on('click','.deactivateBtn',function(e){
  e.preventDefault()
  var userId = $(this).attr('id');
  console.log(userId);
  Swal.fire({
      title: 'Are you sure?',
      text: "Do You want to Deactivate this User?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Deactivate User!'
      }).then((result) => {
      if (result.isConfirmed) {
          $.ajax({
              url:'pages/config/controller.php',
              method:'post',
              data:{id:userId, action: "deactivateUser"},
              success:(res)=>{
                console.log(res);
                if (res === "success") {
                  
                  Swal.fire({
                    title: "User deactivated",
                    icon: 'success',
                    text: "User Deactivated Successfully"
                  }).then(()=>{
                  location.reload()

                  })
                }
                if (res === "fail") {
                  Swal.fire({
                    title: "Server Error",
                    icon: 'error',
                    text: "Server Error Could not activate User "
                  })
                }
                if (res === "verified") {
                  Swal.fire({
                    title: "Account Activated",
                    icon: 'warning',
                    text: "User Account has already been Verified!"
                  })
                }  
                   
              }
          })
          
      }
  })
  
})

$('body').on('click','.activateBtn',function(e){
  e.preventDefault()
  var userId = $(this).attr('id');
  console.log(userId);
  Swal.fire({
      title: 'Are you sure?',
      text: "Do You want to Activate this User!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Activate user!'
      }).then((result) => {
      if (result.isConfirmed) {
          $.ajax({
              url:'pages/config/controller.php',
              method:'post',
              data:{id:userId, action: "activateUser"},
              success:(res)=>{
                console.log(res);
                if (res === "success") {
                  
                  Swal.fire({
                    title: "Successful Activation",
                    icon: 'success',
                    text: "User Activated Successfully"
                  }).then(()=>{
                  location.reload()

                  })
                }
                if (res === "fail") {
                  Swal.fire({
                    title: "Server Error",
                    icon: 'error',
                    text: "Could not activate User "
                  })
                }
                
                if (res === "verified") {
                  Swal.fire({
                    title: "Account Activated",
                    icon: 'warning',
                    text: "User Account has already been Verified!"
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



