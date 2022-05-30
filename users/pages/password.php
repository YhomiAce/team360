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
        
        <form method="POST" id="password-form" class=" mx-0 my-10 w-full px-4 md:w-1/2 border border-gray-300 rounded-xl py-16 flex flex-col items-center">
          <h4 class="text-orange text-bold">Password Setting</h4>
            <div class="text-green-500" id="messSuss"></div>
            <div class="text-red-500" id="messErr"></div>
            
            <div class="flex flex-col w-full md:w-3/4 min-w-[300px]">
              <label class="text-orange-600 mb-2 mt-5" for="name">Old Password</label>
              <input type="password" id="oldPass" class=" h-16 px-4 border rounded-lg mb-5 " name="oldPassword" autocomplete="False">
            </div>
            <div class="flex flex-col w-full md:w-3/4 min-w-[300px]">
              <label class="text-orange-600 mb-2 mt-5" for="name">Password</label>
              <input type="password" id="pass" class=" h-16 px-4 border rounded-lg mb-5 " name="password1" autocomplete="False">
            </div>

            <div class="flex flex-col w-full md:w-3/4 min-w-[300px]">
              <label class="text-orange-600 mb-2 mt-5" for="name">Confirm Password</label>
              <input type="password" id="cpass" class=" h-16 px-4 border rounded-lg mb-5 " name="password2" autocomplete="False">
            </div>

            <input type="submit" id="password_btn" class="w-full md:w-3/4 min-w-[300px] bg-orange-600 text-white text-xl h-16 rounded-md shadow" />
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



