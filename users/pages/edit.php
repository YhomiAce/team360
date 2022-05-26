<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require 'config/config.php';
    $currentUser = $_SESSION['user'];
    $sql=$con->query("SELECT * FROM  auth WHERE email = '$currentUser'") or die("Error2 : ". mysqli_error($con));
    while ($rows=mysqli_fetch_array($sql))
      {
        $name=$rows['fullname'];
        $email=$rows['email'];
      }
?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper flex justify-center text-xl">
      <div class=" w-full border rounded-xl flex px-2 items-center justify-center">
        <form method="POST" id="edit-form" class=" mx-0 my-10 w-full px-4 md:w-1/2 border border-gray-300 rounded-xl py-16 flex flex-col items-center">
            <div class="text-green-500" id="messSuss"></div>
            <div class="text-red-500" id="messErr"></div>
            <div class="flex flex-col w-full md:w-3/4 min-w-[300px]">
              <label class="text-orange-600 mb-2 mt-5" for="name">Name</label>
              <input type="text" class=" h-16 px-4 border rounded-lg mb-5 " value=<?php echo $name ?> id="name" name="name">
            </div>

            <div class="flex flex-col w-full md:w-3/4 min-w-[300px]">
              <label class="text-orange-600 mb-2 mt-5" for="name">Email</label>
              <input type="email" class=" h-16 px-4 border rounded-lg mb-5 " value=<?php echo $email ?> name="email">
            </div>

            <div class="flex flex-col w-full md:w-3/4 min-w-[300px]">
              <label class="text-orange-600 mb-2 mt-5" for="name">Password</label>
              <input type="password" id="pass" class=" h-16 px-4 border rounded-lg mb-5 " name="pass" autocomplete="False">
            </div>

            <div class="flex flex-col w-full md:w-3/4 min-w-[300px]">
              <label class="text-orange-600 mb-2 mt-5" for="name">Confirm Password</label>
              <input type="password" id="cpass" class=" h-16 px-4 border rounded-lg mb-5 " name="cpass" autocomplete="False">
            </div>

            <input type="submit" id="form-submit" class="w-full md:w-3/4 min-w-[300px] bg-orange-600 text-white text-xl h-16 rounded-md shadow" />
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



