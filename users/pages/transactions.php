<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  require_once '../users/config/actions.php';
    require_once 'config/conn.php';
    $email = $_SESSION['user'];
    $user = currentUser($conn, $email);
    $userId = $user['id'];
    $transactions = fetchAllTransactions($conn,$userId);
?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper text-bold mt-5">
      <div class="row justify-content-center mt-5">
        <div class="col-md-10 mt-5">
          <div class="card">
            <div class="card-header">
              <h4 class="text-center text-bold">All Transactions</h4>

            </div>
            <div class="card-body">
            <?php if(count($transactions) > 0): ?>
            <table class="table text-2xl table-bordered table-striped">
            <thead>
              <th>ID</th>
              <th>Type</th>
              <th>Description</th>
              <th>Amount</th>
              <th>Date</th>
            </thead>
            <tbody>
              
            <?php foreach($transactions as $key=>$row): ?>

              <tr>
                <td><?= ($key +1); ?></td>
                <td><?= $row['type'] ?></td>
                <td><?= $row['description'] ?></td>
                <td><?= $row['amount'] ?></td>
                <td><?php echo date('d-M-Y',strtotime('+0 days',strtotime(str_replace('/', '-', $row['created_at'])))); ?></td>
              </tr>
              
              <?php endforeach; ?>
            </tbody>
          </table>
          <?php else : ?>
            <h4 class="text-center">No Transaction registerd</h4>
          <?php endif; ?>
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



