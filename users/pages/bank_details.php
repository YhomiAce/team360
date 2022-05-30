<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require_once '../users/config/actions.php';
    require_once 'config/conn.php';
    $email = $_SESSION['user'];
    $user = currentUser($conn, $email);
    // print_r($user);
 
?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper flex justify-center text-xl">
      <div class=" w-full border rounded-xl flex px-2 items-center justify-center">
        
        <form method="POST" id="bank_form" class=" mx-0 my-10 w-full px-4 md:w-1/2 border border-gray-300 rounded-xl py-16 flex flex-col items-center">
          <h4 class="text-orange text-bold"> Bank Information</h4>
            <div class="text-green-500" id="messSuss"></div>
            <div class="text-red-500" id="messErr"></div>
            <div class="flex flex-col w-full md:w-3/4 min-w-[300px]">
              <label class="text-orange-600 mb-2 mt-5" for="name">Bank Name</label>
              <input required type="text" class=" h-16 px-4 border rounded-lg mb-5 " value="<?php echo $user['bank_name'] ?>" id="bank_name" name="bank_name">
              <!-- <input type="text" class=" h-16 px-4 border rounded-lg mb-5 " value=<?php echo $bank_name ?> id="name" name="name"> -->
            </div>

            <div class="flex flex-col w-full md:w-3/4 min-w-[300px]">
              <label class="text-orange-600 mb-2 mt-5" for="name">Account Number</label>
              <input required type="text" class=" h-16 px-4 border rounded-lg mb-5" value="<?php echo $user['account_number'] ?>" name="account_number">
              <!-- <input type="email" class=" h-16 px-4 border rounded-lg mb-5 " value=<?php echo $account_number ?> name="email"> -->
            </div>

            <div class="flex flex-col w-full md:w-3/4 min-w-[300px]">
              <label class="text-orange-600 mb-2 mt-5" for="name">Account Name</label>
              <input required type="text" id="account_name" class=" h-16 px-4 border rounded-lg mb-5 " value="<?php echo $user['account_number'] ?>" name="account_name" autocomplete="False">
            </div>
            

            <input type="submit" id="bank_btn" class="w-full md:w-3/4 min-w-[300px] bg-orange-600 text-white text-xl h-16 rounded-md shadow" />
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



