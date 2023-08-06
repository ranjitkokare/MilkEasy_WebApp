<?php
$conn = mysqli_connect('localhost', 'root', 'root', 'milkeasy') or die("Could not connect to database");
session_start();

$sqlc = "SELECT * FROM `milkcollector_registration`";
$result = mysqli_query($conn, $sqlc);
$num = mysqli_num_rows($result);

$sqlf = "SELECT * FROM `farmer_registration`";
$resultf = mysqli_query($conn, $sqlf);
$numf = mysqli_num_rows($resultf);

if (!isset($_SESSION['loggedinn'])) {
  header("location: ../newlogin.php");
}
$showAlert = false;
$showError = false;

if (isset($_POST['submit'])) {

  $id = mysqli_real_escape_string($conn, $_POST['id']);
  $trsnid = mysqli_real_escape_string($conn, $_POST['trsnid']);
  $amount = mysqli_real_escape_string($conn, $_POST['amount']);
  $fromdate = mysqli_real_escape_string($conn, $_POST['fromdate']);
  $todate = mysqli_real_escape_string($conn, $_POST['todate']);
  $status = mysqli_real_escape_string($conn, $_POST['status']);
  $role = mysqli_real_escape_string($conn, $_POST['role']);
  $date = date('y/m/d');
  if ($role == 'Farmer') {
    $insert = mysqli_query($conn, "INSERT INTO payment (name,trsnid,amount,fromdate,todate,status,date) VALUES('$id' ,'$trsnid','$amount','$fromdate','$todate', '$status','$date')") or die('query failed');
  }
  if ($role == 'Milk Collector') {
    $insert = mysqli_query($conn, "INSERT INTO coll_payment (name,trsnid,amount,fromdate,todate,status,date) VALUES('$id' ,'$trsnid','$amount','$fromdate','$todate', '$status','$date')") or die('query failed');

  }

  if ($insert) {

    $showAlert = true;
    header('refresh:1.5; url=payment.php');
  } else {
    $showError = "Payment Record could not be inserted..";
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

  <title>Transaction Form</title>
</head>

<body>

  <?php
  if ($showAlert) {
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Record Inserted Successfully..
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
  <title>Payment</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

  <div>
    <br>
    <center>
      <h1 class="font text-3xl">Transaction form</h1>
    </center><br>
    <form action="payment.php"
      class="align-middle outline outline-2 mt-1 mb-2 mx-11 flex flex-col justify-cente items-center rounded-lg relative z-0"
      method="post">
      <div class="radio_btns pt-3 pl-3 mb-4">
        <label for="">Farmer</label>
        <input type="radio" name="role" value="Farmer" id="fb" required class="mr-4">
        <label for="">Collector</label>
        <input type="radio" name="role" id="cb" value="Milk Collector" required><br>
      </div>
      <select name="id" id="collector" aria-placeholder="name"
        class="outline outline-1 pl-2 w-[80%] h-9 rounded-lg hidden" required>
        <option selected="true" disabled="disabled">Choose name </option>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
          ?>
          <option>
            <?php echo $row['name'] ?>
          </option>
          <?php
        }
        ?>
      </select>
      <select name="id" id="farmer" aria-placeholder="name"
        class="outline outline-1 pl-2 w-[80%] h-9 rounded-lg hidden">
        <option selected="true" disabled="disabled">Choose name </option>
        <?php
        while ($row = mysqli_fetch_assoc($resultf)) {
          ?>
          <option>
            <?php echo $row['name'] ?>
          </option>
          <?php
        }
        ?>
      </select>
      <br>
      <input type="text" name="trsnid" required placeholder="trans_id"
        class="outline outline-1 pl-2 w-[80%] h-9 rounded-lg" required><br>
      <input type="number" name="amount" required placeholder="amount"
        class="outline outline-1 pl-2 w-[80%] h-9 rounded-lg" required><br>
      <input type="text" name="fromdate" placeholder="From date" onfocus="(this.type='date')"
        onblur="(this.type='text')" class="outline outline-1 pl-2 w-[80%] h-9 rounded-lg" required><br>
      <label for=""></label>
      <input type="text" name="todate" required placeholder="to date" onfocus="(this.type='date')"
        onblur="(this.type='text')" class="outline outline-1 pl-2 w-[80%] h-9 rounded-lg" required><br>
      <input type="text" name="status" value="Successful" required placeholder="status" rows="5"
        class="outline outline-1 pl-2 w-[80%] h-9 rounded-lg" readonly><br>
      <div class="flex w-full">
        <input type="submit" name="submit" value="Submit" "
          class="outline outline-1 mb-3 w-[30%] rounded-full bg-green-400 hover:bg-green-500 h-8 ml-[20%]">
        <a href="Admin_index.php"
          class="outline outline-1 mb-3 w-[25%] rounded-full bg-gray-400 hover:bg-gray-600 ml-10 h-8">
          <div class="ml-[30%] md:ml-[45%] text-white pt-1">Back</div>
        </a>
      </div>
    </form>
  </div>
  <script>
    let farm = document.getElementById('farmer');
    let collect = document.getElementById('collector');
    let farmb = document.getElementById('fb');
    let collectb = document.getElementById('cb');

    farmb.addEventListener("click", toggle);
    collectb.addEventListener("click", toggle);
    function toggle() {

      if (farmb.checked) {
        farm.classList.remove("hidden");
        collect.classList.add("hidden");
      }
      if (collectb.checked) {
        collect.classList.remove("hidden");
        farm.classList.add("hidden");
      }
    }
   

  </script>
</body>

</html>