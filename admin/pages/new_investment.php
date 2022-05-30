<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'pages/config/conn.php';
require_once 'pages/config/actions.php';

$users = allActiveUsers($conn);

# naira code: &#8358;

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="row">
      <div class="col-md-6">
        <h2 style="margin-top: 0px;">
          New Investment
        </h2>
        <p><a href="?p=dashboard"><i class="fa fa-dashboard"></i> Home</a> &nbsp;&nbsp; > &nbsp;&nbsp; <a href="?p=investments">Investments</a> &nbsp;&nbsp; > &nbsp;&nbsp; <a class="active">New Investment</a></p>
      </div>
      <!--<div class="col-md-4" style="text-align: left; margin-top: 10px;">  <a href="p=new_product"> <button class="btn btn-primary" style="font-size: 16px; font-weight: 600;">Add New Category</button></a>  </div>-->


  </section>
  <!-- Main content -->
  <section class="content text-bold display-5" style="margin-top: 0px; padding-top: 0px; ">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-9 col-xs-12" style="background-color: #fff; margin-left: 10px; border:solid; border-width: thin; border-color: #ddd;">

        <!-- small box -->
        <!-- <a href="add_product.php"><button style="background-color: #0060cc; height: 40px; width: 250px; border:none; border-radius: 5px; color: white; font-size: 16px;">ADD PRODUCT</button></a> -->

        <div style="dborder: solid; border-width: thin; border-color: #ccc; margin-top: 0px; padding: 1.5em; dheight: 500px; ">


          <form action="#" id="invest_form" method="post" enctype="multipart/form-data">
            <div id="errorMsg" class="text-center text-danger"></div>
            <div class="card bg-light">
              <div class="card-header">
                <h4>Add Investment for a User </h4>

              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="">Select User</label>
                  <select name="userId" id="state" class="form-control user_list" required>
                    <option value="" selected disabled>Select User</option>
                    <?php foreach ($users as $user) : ?>
                      <option value="<?= $user['id']; ?>"><?= $user['fullname']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>


                <div class="form-group">
                  <label for="">Amount</label>
                  <input type="number" name="amount" required="required" class="form-control">
                </div>
                <div class="form-group">
                  <label for="">Rate</label>
                  <input type="number" name="rate" value="30" required="required" class="form-control">
                </div>


                <button type="submit" name="submit" id="newInvestBtn" class="btn btn-info">Add Investment</button>
              </div>
            </div>

          </form>


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


<?php include('includes/js.php') ?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
  $('.user_list').select2();
  $('#state').on('change', e => {

    var stateId = $('#state').val();

  })


  $("#newInvestBtn").click((e) => {
    if ($("#invest_form")[0].checkValidity()) {
      e.preventDefault();
      $('#newInvestBtn').val('Please wait...')
      $.ajax({
        url: "pages/config/controller.php",
        method: "POST",
        data: $("#invest_form").serialize() + "&action=Add_new_investment",
        success: (res => {
          console.log(res);
          if (res === "success") {
            $('#invest_form')[0].reset()

            Swal.fire({
              title: 'Success',
              icon: "success",
              text: 'Investment Added Successfully'
            }).then(() => {
              location.reload()
            })
            $('#newInvestBtn').val('Add Investment')
          } else {
            Swal.fire({
              title: 'Fail to Add Investment',
              icon: 'warning',
              text: 'Failed To add Investment'
            })
            $("#errorMsg").text("An Error occurred Please Try again!")
            setTimeout(() => {
              $("#errorMsg").text("")
            }, 5000);
          }

        })
      })
    }

  })
</script>

</body>

</html>