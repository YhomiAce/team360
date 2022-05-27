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
  <div class="content-wrapper flex justify-center text-xl px-3">
      <div class=" w-full border rounded-xl flex px-0 items-center justify-center">
        <form action="POST" id="withdraw-form" class=" mx-0 my-10 w-full md:w-1/2 border border-gray-300 rounded-xl py-16 flex flex-col items-center">
            <div id="messSuss"></div>
            <div id="messErr"></div>
            <h3>Withdrawal Request</h3>
            <div class="flex flex-col w-3/4 min-w-[300px]">
              <label class="text-orange-600 mb-1" for="name">Account Name</label>
              <input type="text" value="" class=" h-16 px-4 border rounded-lg mb-5 " id="name" name="name">
            </div>

            <div class="flex flex-col w-3/4 min-w-[300px]">
              <label class="text-orange-600 mb-1" for="name">Account number</label>
              <input type="text" value="" class=" h-16 px-4 border rounded-lg mb-5 " id="acc_num" name="acc_num">
            </div>

            <div class="flex flex-col w-3/4 min-w-[300px]">
              <label class="text-orange-600 mb-1" for="name">Bank</label>
              <input type="text" value="" class=" h-16 px-4 border rounded-lg mb-5 " id="bank" name="bank">
            </div>

         

            <div class="flex flex-col w-3/4 min-w-[300px]">
              <label class="text-orange-600 mb-1" for="amount">Amount</label>
              <input type="number" class=" h-16 px-4 border rounded-lg mb-5 " id="amount" name="amount">
            </div>

         
            <input type="submit" value="Withdraw" id="withdrawBtn" class="w-3/4 min-w-[300px] bg-orange-600 text-white text-2xl text-bold h-16 rounded-md shadow" />
        </form>
      </div>
    <!-- </section> -->
  </div>
<!-- ./wrapper -->

   
<?php include('includes/js.php')?>
</body>
<script src="js/jquery.js"></script>
<script src="js/auth.js"></script>
</html>



