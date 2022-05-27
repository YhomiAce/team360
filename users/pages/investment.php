<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once '../users/config/actions.php';
require_once 'config/conn.php';
$email = $_SESSION['user'];
$user = currentUser($conn, $email);
$userId = $user['id'];
$investments = allInvestment($conn, $userId);


?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper text-bold mt-5">
  <div class="row justify-content-center">
    <div class="col-md-5 mt-5 mb-5">
      <div class="card">
        <div class="card-header">
          <h4 class="text-center">Account Details</h4>
        </div>
        <div class="card-body text-bold">
          <h2>Account Number: 4210008008</h2>
          <h2>Account Name: Summerfield integrated consult</h2>
          <h2>Bank: Fidelity bank</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h4 class="text-center text-bold">Investment History</h4>

        </div>
        <div class="card-body">
          <table class="table text-2xl table-bordered table-striped">
            <thead>
              <th>ID</th>
              <th>Amount</th>
              <th>Rate (%)</th>
              <th>Total Earned</th>
              <th>Status</th>
              <th>Date Invested</th>
              <th>Withdrawal Date</th>
            </thead>
            <tbody>
              <?php foreach ($investments as $key => $row) : ?>

                <tr>
                  <td><?= ($key + 1); ?></td>
                  <td><?= $row['amount'] ?></td>
                  <td><?= $row['rate'] ?></td>
                  <td><?= $row['reward'] ?></td>
                  <td><?= $row['expired'] == 1 ? "Expired" : "Active" ?></td>
                  <td><?php echo date('d-M-Y', strtotime('+0 days', strtotime(str_replace('/', '-', $row['createdAt'])))); ?></td>
                  <td><?php echo date('d-M-Y', strtotime('+0 days', strtotime(str_replace('/', '-', $row['expiredAt'])))); ?></td>
                </tr>

              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>


    </div>
  </div>
  <!-- </section> -->
</div>
<!-- ./wrapper -->


<?php include('includes/js.php') ?>
</body>
<script src="js/jquery.js"></script>
<script src="js/auth.js"></script>

</html>