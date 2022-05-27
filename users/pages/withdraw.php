<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  require_once '../users/config/actions.php';
    require_once 'config/conn.php';
    $email = $_SESSION['user'];
    $user = currentUser($conn, $email);
    $userId = $user['id'];
    $investments = myWithdrawalRequest($conn,$userId);
?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper text-bold mt-5">
      <div class="row justify-content-center mt-5">
        <div class="col-md-10 mt-5">
          <div class="card">
            <div class="card-header">
              <h4 class="text-center text-bold">Withdrawal History</h4>
              <a href="?p=new_withdraw" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-right">Make Withdrawal Request</a>

            </div>
            <div class="card-body">
            <table class="table text-2xl table-bordered table-striped">
            <thead>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Amount (%)</th>
              <th>Bank Name</th>
              <th>Account Number</th>
              <th>Account Name</th>
              <th>Status</th>
              <th>Request Date</th>
              <th>Approved Date</th>
            </thead>
            <tbody>
            <?php foreach($investments as $key=>$row): ?>

              <tr>
                <td><?= ($key +1); ?></td>
                <td><?= $user['fullname'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $row['amount'] ?></td>
                <td><?= $row['bank_name'] ?></td>
                <td><?= $row['acct_number'] ?></td>
                <td><?= $row['acct_name'] ?></td>
                <td><?= $row['approved'] == 1 ? "Approved" : "Pending" ?></td>
                <td><?php echo date('d-M-Y',strtotime('+0 days',strtotime(str_replace('/', '-', $row['created_at'])))); ?></td>
                <td><?= $row['approved'] == 1 ? date('d-M-Y',strtotime('+0 days',strtotime(str_replace('/', '-', $row['approvedDate'])))) : "Pending" ?></td>
              </tr>
              
              <?php endforeach; ?>
            </tbody>
          </table>
            </div>
          </div>
       

        </div>
      </div>
      </div>
    <!-- </section> -->
  </div>
<!-- ./wrapper -->

   
<?php include('includes/js.php')?>
</body>
<script src="js/jquery.js"></script>
<script src="js/auth.js"></script>
</html>



