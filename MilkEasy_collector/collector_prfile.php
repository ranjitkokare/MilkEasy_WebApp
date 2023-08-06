<?php
$conn = mysqli_connect('localhost', 'root', 'root', 'milkeasy') or die("Could not connect to database");

session_start();

if (!isset($_SESSION['loggedinn'])) {
  header("location: ../newlogin.php");
}

if(isset($_SESSION['loggedinn'])){
$id=$_SESSION['collector_id'];
   

$query = mysqli_query($conn, "select * from milkcollector_registration where name='$id'");
if ($query && mysqli_num_rows($query) > 0) {
  $row = mysqli_fetch_array($query);
}
  }
?>
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- // profile page -->

  <center>
    <div class="mt-5 outline outline-2 w-[80%]">
      <div class="profile_image grid grid-cols-1 justify-center w-[100%]  justify-items-center">
        <br>
        <img src="images\profilimg.jfif" alt="rofile image" class="h-24"> <br>
        <h3 class="font-bold uppercase">
         Milk Collector : <?php echo $row['name']; ?> 
        </h3><br><br>
      </div>

      <div class="grid grid-cols-1 justify-items-start ml-6 md:ml-[40%]">
        <h2 class="">ID :
          <?php echo $row['id']; ?>
        </h2><br>
        <h2 class="">Contact :
          <?php echo $row['mobile']; ?>
        </h2><br>
        <h2 class="">Email :
          <?php echo $row['email']; ?>
        </h2><br>
        <h2 class="">UPI Id :
          <?php echo $row['upiid']; ?>
        </h2><br>
        <h2 class="">Address :
          <?php echo $row['address']; ?>
        </h2><br>
      </div>
        <div class="buttons flex w-full">
          <button type="submit" class="p-1 px-5 m-3 ml-12 outline outline-1 md:ml-[40%] bg-green-500 hover:bg-green-700"> <a
              href="CollectorProfile.php">Edit </a></button>
          <button type="submit" class="p-1 px-5 m-3 outline outline-1 bg-gray-400 hover:bg-gray-600"> <a href="Collector_index.php">Back</a></button>
        </div>
      
    </div>
  </center>

