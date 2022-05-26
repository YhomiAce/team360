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
  <div class="content-wrapper flex justify-center text-xl px-3">
      <div class=" w-full border rounded-xl flex px-0 items-center justify-center">
        <form action="POST" id="invest-form" class=" mx-0 my-10 w-full md:w-1/2 border border-gray-300 rounded-xl py-16 flex flex-col items-center">
            <div id="messSuss"></div>
            <div id="messErr"></div>
            <div class="flex flex-col w-3/4 min-w-[300px]">
              <label class="text-orange-600 mb-1" for="name">Account Name</label>
              <input type="text" value=<?php echo $name ?> class=" h-16 px-4 border rounded-lg mb-5 " id="name" name="name">
            </div>

            <div class="flex flex-col w-3/4 min-w-[300px]">
              <label class="text-orange-600 mb-1" for="name">Bank</label>
              <input type="text" value="" class=" h-16 px-4 border rounded-lg mb-5 " id="bank" name="bank">
            </div>

            <div class="flex flex-col w-3/4 min-w-[300px]">
              <label class="text-orange-600 mb-1" for="name">Account number</label>
              <input type="text" value="" class=" h-16 px-4 border rounded-lg mb-5 " id="acc_num" name="acc_num">
            </div>

            <div class="flex flex-col w-3/4 min-w-[300px]">
              <label class="text-orange-600 mb-1" for="amount">Amount</label>
              <input type="number" class=" h-16 px-4 border rounded-lg mb-5 " id="amount" name="amount">
            </div>

            <div class="flex flex-col  w-3/4 min-w-[300px]">
              <label class="text-orange-600 mb-1" for="months">Month Span</label>
              <select id="month" name="months" class=" h-16 px-4 border rounded-lg mb-5 ">
                <option value="1">1 month</option>
                <option value="2">2 months</option>
                <option value="3">3 months</option>
                <option value="4">4 months</option>
                <option value="5">5 months</option>
                <option value="6">6 months</option>
                <option value="7">7 months</option>
                <option value="8">8 months</option>
                <option value="9">9 months</option>
                <option value="10">10 months</option>
                <option value="11">11 months</option>
                <option value="12">12 months</option>
              </select>
            </div>
            <input type="submit" value="Invest" id="invest-submit" class="w-3/4 min-w-[300px] bg-orange-600 text-white text-2xl text-bold h-16 rounded-md shadow" />
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



