<?php


$conn = mysqli_connect('localhost', 'root', 'root', 'milkeasy') or die("Could not connect to database");
session_start();
if (!isset($_SESSION['loggedinn'])) {
  header("location: ../newlogin.php");
}
$showAlert = false;
$showError = false;
if (isset($_POST['submit'])) {
  $mfat = mysqli_real_escape_string($conn, '1');
  $mprice = mysqli_real_escape_string($conn, $_POST['price']);
  $select = mysqli_query($conn, "UPDATE ratedetails SET mprice='$mprice' where mfat='$mfat'") or die('query failed');

  if ($select) {
    $showAlert = true;
    header('refresh:1; url=Admin_index.php');
  } else {
    echo "Failed..";
  }

}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <title>setRates</title>
</head>

<body>

  <?php
  if ($showAlert) {
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Set Rate Updated Succesfully..
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
  }
  if ($showError) {
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> ' . $showError . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
  }
  ?>
</body>

</html>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Collection form</title>
</head>

<body>

  <div class="pt-16">
    <center>
      <form action="setRates.php" method="post"
        class="bg-gray-100 md:w-[60%] align-middle outline outline-2 my-4 mx-3 flex flex-col justify-cente items-center rounded-lg">

        <h1 class="text-2xl md:pt-10">Set Rate</h1><br><br>
        <h3>Note: Set rete for '1' fat only *</h3> <br>

        <input type="number" name="price" required placeholder="Enter Rate price"
          class="outline outline-1 pl-2 w-[50%] h-9 rounded-lg"><br><br>

        <div class="flex w-full">
          <input type="submit" name="submit" value="Submit"
            class="outline outline-1 mb-3 w-[30%] md:w-[20%] rounded-full bg-green-400 h-8 ml-[15%] md:ml-[25%] mr-10 hover:bg-green-500"><br><br>
          <a href="Admin_index.php"
            class="outline outline-1 mb-3 w-[30%] md:w-[20%] rounded-full bg-gray-400 h-8 pt-1 text-white hover:bg-gray-500"
            style="text-decoration:none;">
            <div class="no-underline ">Back</div>
          </a>
        </div>
      </form>
    </center>
  </div>


</body>

</html>