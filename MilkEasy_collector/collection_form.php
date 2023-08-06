<?php

$conn = mysqli_connect('localhost', 'root', 'root', 'milkeasy') or die("Could not connect to database");
session_start();

$sqlc = "SELECT * FROM `farmer_registration`";
$result = mysqli_query($conn, $sqlc);
$num = mysqli_num_rows($result);

if (!isset($_SESSION['loggedinn'])) {
  header("location: ../newlogin.php");
}
$showAlert = false;
$showError = false;

if (isset($_POST['submit'])) {

  $name = mysqli_real_escape_string($conn, ($_POST['name']));
  $shift = mysqli_real_escape_string($conn, ($_POST['shift']));
  $milk_collector_id = mysqli_real_escape_string($conn, $_SESSION['collector_id']);
  $fat = mysqli_real_escape_string($conn, ($_POST['fat']));
  $litre = mysqli_real_escape_string($conn, ($_POST['litre']));
  $date = date('y/m/d');

  $mprice = mysqli_query($conn, "SELECT mprice from ratedetails ");
  $row = mysqli_fetch_assoc($mprice);

  $price = mysqli_real_escape_string($conn, (($row['mprice'] * $fat) * $litre));
  
  $insert = mysqli_query($conn, "INSERT INTO milk_collection(name,shift, milk_collector_id, fat, litre ,price, date ) VALUES('$name','$shift','$milk_collector_id','$fat','$litre','$price' ,'$date') ") or die('query failed');

  if ($insert) {
    $showAlert = true;

    header('refresh: 2; url=collection_form.php');
  } else {
    $showError = "Record Not Inserted..";
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

  <title>Milk Collection</title>
</head>

<body>

  <?php
  if ($showAlert) {
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Record Inserted...
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>  ';
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
  </form>
  </div>

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
    <form action="collection_form.php" method="post"
      class="align-middle outline outline-2 my-4 mx-3 flex flex-col justify-cente items-center rounded-lg">
      <div class="radio_btns pt-3 pl-3 mb-4">
        <label for="" class="text-2xl">Add Collection</label>
      </div>
      <select id="name" name="name" id="collector" aria-placeholder="name"
        class="outline outline-1 pl-2 w-[80%] h-9 rounded-lg">
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
      </select><br>

      <select name="shift" id="" class="outline outline-1 pl-2 w-[80%] h-9 rounded-lg">
        <option selected="true" disabled="disabled">Choose shift </option>
        <option value="morning">Morning</option>
        <option value="eveninng">Evening</option>
      </select><br>
      <input type="number" name="fat" required placeholder="Fat"
        class="outline outline-1 pl-2 w-[80%] h-9 rounded-lg"><br>
      <input type="number" name="litre" required placeholder=" collected Milk Qty"
        class="outline outline-1 pl-2 w-[80%] h-9 rounded-lg"><br>
      <!-- <input type="date" name="date" required placeholder=" Date"
        class="outline outline-1 pl-2 w-[80%] h-9 rounded-lg"><br> -->
      <div class="flex w-full ml-[35%]">
        <input type="submit" name="submit" value="Submit"
          class="outline outline-1 mb-3 w-[30%] rounded-full bg-green-400 hover:bg-green-500 h-8">
        <a href="Collector_index.php"
          class="outline outline-1 mb-3 w-[25%] rounded-full bg-gray-400 hover:bg-gray-600 ml-10 h-8">
          <div class="ml-[30%] md:ml-[45%] text-white pt-1"> Back</div>
        </a>
      </div>
    </form>
  </div>

</body>

</html>