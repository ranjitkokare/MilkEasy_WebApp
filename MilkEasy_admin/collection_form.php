<?php

$conn = mysqli_connect('localhost', 'root', 'root', 'milkeasy') or die("Could not connect to database");
session_start();
if (!isset($_SESSION['loggedinn'])) {
  header("location: ../newlogin.php");
}

$showAlert = false;
$showError = false;

$srno=$_GET['del'];
$query = mysqli_query($conn, "SELECT * FROM milk_collection where srno='$srno'");
if ($query && mysqli_num_rows($query) > 0) {
  $row = mysqli_fetch_array($query);
} else {
  echo 'No results found';
}


if (isset($_POST['submit'])) {
  $srno=mysqli_real_escape_string($conn, $_POST['srno']);
  $id = mysqli_real_escape_string($conn, $_POST['id']);
  $name = mysqli_real_escape_string($conn, ($_POST['name']));
  $shift = mysqli_real_escape_string($conn, ($_POST['shift']));
  $milk_collector_id = mysqli_real_escape_string($conn, $_POST['milk_collector_id']);
  $fat = mysqli_real_escape_string($conn, ($_POST['fat']));
  $litre = mysqli_real_escape_string($conn, ($_POST['litre']));
  $mprice = mysqli_query($conn, "SELECT mprice from ratedetails ");
  $row = mysqli_fetch_assoc($mprice);
$price =mysqli_real_escape_string($conn, (($row['mprice']*$fat)*$litre));


$insert = mysqli_query($conn, "UPDATE `milk_collection` SET `id`='$id',`name`='$name',`shift`='$shift',`milk_collector_id`='$milk_collector_id',`fat`='$fat',`litre`='$litre',`price`='$price' WHERE srno='$srno'") or die('query failed');

 if ($insert) {
    $showAlert = true;
    
    header("searchdate.php");
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
        <strong>Success!</strong> Record Updated Successfully...
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
        <label for="">Add Collection</label>
      </div>
      <input type="hidden" name="srno" placeholder="" required value="<?php echo $row['srno']; ?>" pattern="[1-9]{1}[0-9]{9}"
        class="outline outline-1 pl-2 w-[80%] h-9 rounded-lg"><br>
     
      <input type="number" name="id" placeholder="Farmer_Id" required value="<?php echo $row['id']; ?>" pattern="[1-9]{1}[0-9]{9}"
        class="outline outline-1 pl-2 w-[80%] h-9 rounded-lg"><br>
      <input type="text" name="name" value="<?php echo $row['name']; ?>" required placeholder="Farmer name"
        class="outline outline-1 pl-2 w-[80%] h-9 rounded-lg" onkeypress="return (event.charCode > 64 && 
                event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)"><br>
        <select name="shift" id="" value="<?php echo $row['shift']; ?>" class="outline outline-1 pl-2 w-[80%] h-9 rounded-lg">
          <option value="morning">Morning</option>
          <option value="eveninng">Evening</option>
        </select><br>
        <input type="number" name="milk_collector_id" placeholder="Collector_Id" required value="<?php echo $row['milk_collector_id']; ?>" pattern="[1-9]{1}[0-9]{9}"
        class="outline outline-1 pl-2 w-[80%] h-9 rounded-lg"><br>
      
      <input type="text" name="fat" value="<?php echo $row['fat']; ?>" required placeholder="Fat"
        class="outline outline-1 pl-2 w-[80%] h-9 rounded-lg"><br>
      <input type="text" name="litre" value="<?php echo $row['litre']; ?>" required placeholder=" collected Milk Qty"
        class="outline outline-1 pl-2 w-[80%] h-9 rounded-lg"><br>

      <input type="submit" name="submit" value="Submit"
        class="outline outline-1 mb-3 w-[30%] rounded-full bg-green-400 hover:bg-green-500 h-8">

    </form>
  </div>


</body>

</html>