<?php

$conn = mysqli_connect('localhost', 'root', 'root', 'milkeasy') or die("Could not connect to database");
session_start();
if (!isset($_SESSION['loggedinn'])) {
  header("location: ../newlogin.php");
}

$showAlert = false;
$showError = false;

if (isset($_POST['submit'])) {

  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $upiid = mysqli_real_escape_string($conn, $_POST['upiid']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);
  $role = mysqli_real_escape_string($conn, $_POST['role']);
  $password = mysqli_real_escape_string($conn, md5(($_POST['password'])));
  $confirmpassword = mysqli_real_escape_string($conn, md5(($_POST['confirmpassword'])));

  if ($role == 'Farmer') {
    $Select = mysqli_query($conn, "SELECT * FROM farmer_registration WHERE mobile = '$mobile'") or die('query failed');
  }
  if ($role == 'Milk Collector') {
    $Select = mysqli_query($conn, "SELECT * FROM milkcollector_registration WHERE mobile = '$mobile'") or die('query failed');

  }
  if ($role == 'Admin') {
    $Select = mysqli_query($conn, "SELECT * FROM admin_registration WHERE mobile = '$mobile'") or die('query failed');
  }
  if (mysqli_num_rows($Select) > 0) {
    $showError = 'user already exist';
  } else {


    if ($password != $confirmpassword) {
      $showError = "Passwords do not match";
    } else {
      if ($role == 'Farmer') {
        $insert = mysqli_query($conn, "INSERT INTO farmer_registration (name,mobile,email,upiid,address,role,password,confirmpassword) VALUES('$name' ,'$mobile','$email','$upiid', '$address','$role', '$password','$confirmpassword')") or die('query failed');
      }
      if ($role == 'Milk Collector') {
        $insert = mysqli_query($conn, "INSERT INTO milkcollector_registration (name,mobile,email,upiid,address,role,password,confirmpassword) VALUES('$name' ,'$mobile','$email','$upiid', '$address','$role', '$password','$confirmpassword')") or die('query failed');
      }
      if ($role == 'Admin') {
        $insert = mysqli_query($conn, "INSERT INTO admin_registration (name,mobile,email,upiid,address,role,password,confirmpassword) VALUES('$name' ,'$mobile','$email','$upiid', '$address','$role', '$password','$confirmpassword')") or die('query failed');
      }


      if ($insert) {

        $showAlert = true;
        header('refresh:1.5; url=addFarmer_collector.php');
      } else {
        $showError = "registration failed";
      }
    }
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

  <title>Registration</title>
</head>

<body>

  <?php
  if ($showAlert) {
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your are successfully registered
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



  <title>Registration</title>
</head>

<body>
  <div>

  </div>

  <!-- farmer registrationn and collector registration form  -->
  <section class="">
    <div class="">
      <div>
        <form action="addFarmer_collector.php"
          class="align-middle outline outline-2 my-5 mx-11 flex flex-col justify-cente items-center rounded-lg relative z-0"
          method="post">
          <div class="radio_btns pt-3 pl-3 mb-4">
            <label for="">Farmer</label>
            <input type="radio" name="role" value="Farmer" required class="mr-4">
            <label for="">Collector</label>
            <input type="radio" name="role" value="Milk Collector" required class="mr-4">
            <label for="">Admin</label>
            <input type="radio" name="role" value="Admin" required><br>

          </div>
          <input type="text" name="name" required placeholder="Full Name" onkeypress="return (event.charCode > 64 && 
  event.charCode < 91) || (event.charCode > 96 && event.charCode < 123 || event.charCode==32)"
            class="outline outline-1 pl-2 w-[80%] h-9 rounded-lg"><br>
          <input type="tel" name="mobile" required placeholder="Mob number" pattern="[1-9]{1}[0-9]{9}" maxlength="10"
            min="1000000000" class="outline outline-1 pl-2 w-[80%] h-9 rounded-lg"><br>
          <input type="email" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
            class="outline outline-1 pl-2 w-[80%] h-9 rounded-lg"><br>
          <input type="text" name="upiid" required placeholder="UPI Id" pattern="^[\w.-]+@[\w.-]+$"
            class="outline outline-1 pl-2 w-[80%] h-9 rounded-lg"><br>
          <input type="text" name="address" required placeholder="Address line " rows="5"
            class="outline outline-1 pl-2 w-[80%] h-9 rounded-lg"><br>
          <input type="password" name="password" required placeholder="Password" minlength="6"
            class="outline outline-1 pl-2 w-[80%] h-9 rounded-lg"><br>
            <!-- pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"    pass validation -->
          <input type="password" name="confirmpassword" required placeholder="Confirm Password" minlength="6"
            class="outline outline-1 pl-2 w-[80%] h-9 rounded-lg"><br>
          <div class="flex w-full">
            <input type="submit" name="submit" value="Submit" 
              class="outline outline-1 mb-3 w-[25%] rounded-full bg-green-400 hover:bg-green-500 ml-[20%] h-8">
            <a href="Admin_index.php"
              class="outline outline-1 mb-3 w-[25%] rounded-full bg-gray-400 hover:bg-gray-600 ml-10 h-8">
              <div class="ml-[30%] md:ml-[45%] text-white"> Back</div>
            </a>

          </div>
        </form>
      </div>
    </div>
  </section>

</body>

</html>