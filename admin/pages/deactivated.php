<?php 
  require 'config/config.php';

  function deactivateUser($con,$id,$to)
    {
        $con->query("UPDATE  auth  SET status = '$to' WHERE id = '$id'") or die("error: ".mysqli_error($con));
        return true;
    
    }

  if(array_key_exists('active', $_POST)) {
    echo "here";
    $name = '<script>window.confirm("you are about to deactivate an account");</script>';
    echo $name;
    deactivateUser($con, $_POST['getUser'], 'active');
  }
  $sql=$con->query("SELECT * FROM auth WHERE status = 'deactivated' ORDER BY id") or die("Error2 : ". mysqli_error($con));
  $count = mysqli_num_rows($sql);	
  if(isset($_GET['q']))
    {
      $q = $_GET['q'];
      $sql=$con->query("SELECT * FROM auth WHERE fullname LIKE '%$q%' OR email LIKE '%$q%'  ORDER BY id DESC LIMIT 0, 500") or die("Error2 : ". mysqli_error($con));
    }
?>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <div class="row">
      <div class="col-md-6">
      <h2 style="margin-top: 0px;">
          <?php echo number_format($count); ?>   De-activated  Users</p>
      </h2>
      <p><a href="../admin/?p=dashboard"><i class="fa fa-dashboard"></i> Home</a> &nbsp;&nbsp; > &nbsp;&nbsp; <a class="active">Deactivated users</a></p>
    </div>
     <!--<div class="col-md-4" style="text-align: left; margin-top: 10px;">  <a href="?p=new_category"> <button class="btn btn-primary" style="font-size: 16px; font-weight: 600;">Add New Category</button></a>  </div>-->
     

    </section>
     <!-- Main content -->
    <section class="content" style="margin-top: 0px; padding-top: 0px; padding-right:40px; ">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-10 col-xs-12 px-3" style="overflow-x:auto;background-color: #fff; margin-left: 10px; border:solid; border-width: thin; border-color: #ddd;">

          <!-- small box -->
          <!-- <a href="add_product.php"><button style="background-color: #0060cc; height: 40px; width: 250px; border:none; border-radius: 5px; color: white; font-size: 16px;">ADD PRODUCT</button></a> -->
      
         <h4 style="color: green; font-weight: bold;"> </h4>
          <div style=" border-width: thin; overflow:auto; border-color: #ccc;height: 500px;" class="overflow-hidden">
<?php 
  if($count > 0){
?>
      <div style="margin: 20px; margin-top: 0px;">
        <form method="get" action="#">
          <input type="hidden" name="p" value="pending">
        <input type="text" name="q" value="" placeholder="Search By Package ID" style="height: 30px; font-size: 15px; padding: 15px; width: 80%; border:solid; border-color: #cccccc;"> 
       </form>
      </div>

      <table class="table dtable-striped table-hover no-head-border" border="1" style="border:solid; border-color: black; border-width: thin;">
      <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">No</th>
      <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Name</th>
      <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Email</th>
      <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Status</th>
      <th style="border:solid; border-width: thin; border-color: #eee; color: white; background-color: #0060a0;">Action</th> 
      <?php
        $i=1;
        
        while ($rows=mysqli_fetch_array($sql))
        {
          $id=$rows['id'];
          $name = $rows['fullname'];
          $email=$rows['email'];
          $status=$rows['status'];
          $date_t =$rows['createdAt'];
          $time_t =$rows['createdAt'];
          $date_t = date('d-M-Y',strtotime('+0 days',strtotime(str_replace('/', '-', $date_t))));
        ?>
        <tr><td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $i; ?><td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $name; ?><td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $email; ?> <td style="border:solid; border-width: thin; border-color: #eee;"><?php echo $status; ?><td style="border:solid; border-width: thin; border-color: #eee;"><input type="hidden" name="getUser"value=<?php echo $id?> /><input type="submit" name="active" class="tableButton btn btn-primary" onclick="activate(<?php echo $id ?>, '<?php echo $name ?>')" value="Activate" /></td></td></td></td></td></tr>

        <?php
        $i++;
        }
        ?>
</table>

<?php
  }else{
    echo '<div class="py-20 text-gray-400 text-center">No record found</div>';
  }
?>


<script type="text/javascript">
function activate(id, name)
  {

  var r = confirm ("Do you really want to activate "+name+"'s account");

  if (r == true) {
    var dataString='id='+id+"&act=activate";  
    $.ajax({
      type:"GET",
      url:"process/account_action.php",
      data:dataString,
      jsonp:"callback",
      jsonpCallback:"Sverify",
      dataType:"jsonp",
      crossDomain:true,
      success: function(data){
        var success = data.success;
        console.log(success);
        if(success == "Yes")
        {
          alert("Account activated successfully");
          window.location = "?p=deactivated";
        }
        else if (success = "No")
        {
        alert("An error Occured!");
        }
      },
      // beforeSend:function()
      // {
      // $('#loader').fadeOut(200).show();
      // },

      error: function(jqXHR, textStatus, errorThrown)
      {
        alert ("Could not connect to server");
        //$('#in').fadeOut(200).hide();

      }
    });
  }else {
}


 
}
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



