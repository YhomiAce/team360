<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'pages/config/conn.php';
require 'pages/config/actions.php';
$users = allAdmins($conn)
?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <div class="row">
      <div class="col-md-6">
      <h2 style="margin-top: 0px;">
      Admin Users
      </h2>
      <p><a href="#"><i class="fa fa-dashboard"></i> Home</a> &nbsp;&nbsp; > &nbsp;&nbsp; <a class="active">Admin Users</a></p>
    </div>
     <div class="col-md-4" style="text-align: left; margin-top: 10px;">  <a href="?p=new_admin"> <button class="btn btn-primary" style="font-size: 16px; font-weight: 600;">Add New User</button></a>  </div>
     

    </section>
     <!-- Main content -->
    <section class="content" style="margin-top: 0px; padding-top: 0px; ">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-9 col-xs-12" style="background-color: #fff; margin-left: 10px; border:solid; border-width: thin; border-color: #ddd;">

          <!-- small box -->
          <!-- <a href="add_product.php"><button style="background-color: #0060cc; height: 40px; width: 250px; border:none; border-radius: 5px; color: white; font-size: 16px;">ADD PRODUCT</button></a> -->
      
         <h4 style="color: green; font-weight: bold;"> </h4>
          <div style="dborder: solid; border-width: thin; border-color: #ccc; margin-top: 0px; padding: 1.5em; dheight: 500px; ">
       
<table class="table dtable-striped table-hover no-head-border" border="1">
 <th style="border:solid; border-width: thin; border-color: #eee;">No</th>
 <th style="border:solid; border-width: thin; border-color: #eee;">User</th>
 <th style="border:solid; border-width: thin; border-color: #eee;">Email</th>
 <th style="border:solid; border-width: thin; border-color: #eee;">Level</th>
<!-- <th>Edit</th>-->
 <th style="border:solid; border-width: thin; border-color: #eee;">Delete</th>
<?php foreach($users as $key => $user): ?>
<tr>
<td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $key + 1; ?></td>
<td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $user['name']; ?></td>
<td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $user['email']; ?></td>
<td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $user['level']; ?> </td>
<td style="border:solid; border-width: thin; border-color: #eee;"><button class="btn btn-danger delAdmin" id="<?php echo $user['id']; ?>">Delete</button></td>
</tr>

<?php endforeach; ?>

</table>


<script>
  $('body').on('click','.delAdmin',function(e){
                e.preventDefault()
                var del_id = $(this).attr('id');
                console.log(del_id);
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url:'pages/config/controller.php',
                            method:'post',
                            data:{deleteAdmin:del_id},
                            success:(res)=>{
                              if (res === "success") {
                                Swal.fire(
                                'Deleted!',
                                'Admin Deleted Successfully',
                                'success'
                                ).then(()=>{
                                  location.reload()

                                })
                              }
                                
                                
                            }
                        })
                        
                    }
                })
                
            })
</script>

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



<?php
function product_list ()
{

}





?>