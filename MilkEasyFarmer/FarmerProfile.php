<?php
$conn = mysqli_connect('localhost', 'root', 'root', 'milkeasy') or die("Could not connect to database");

session_start();

if (!isset($_SESSION['loggedinn'])) {
  header("location: ../newlogin.php");
}
$showAlert = false;
$showError = false;

if (isset($_POST['submit'])) {
  $id = mysqli_real_escape_string($conn, $_POST['id']);
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $upiid = mysqli_real_escape_string($conn, $_POST['upiid']);
  $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);
  $role = mysqli_real_escape_string($conn, $_POST['role']);
  $password = mysqli_real_escape_string($conn, ($_POST['password']));
  $confirmpassword = mysqli_real_escape_string($conn, ($_POST['confirmpassword']));



  if ($password != $confirmpassword) {
    $showError = "Passwords do not match";
  } else {
    $insert = mysqli_query($conn, "UPDATE `farmer_registration` SET `name`='$name',`mobile`='$mobile',`email`='$email',`upiid`='$upiid',`address`='$address',`role`='$role',`password`='$password',`confirmpassword`='$confirmpassword' WHERE id='$id'") or die('query failed');

    if ($insert) {

      $showAlert = true;
      header('refresh:1.5; url=indexx.php');
    } else {
      $showError = "Update Profile failed";
    }
  }
}


?>






<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
  integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<title>Update</title>


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



<?php
//file to edit the room details the href file of edit
$conn = mysqli_connect('localhost', 'root', 'root', 'milkeasy') or die("Could not connect to database");


$user_id = $_SESSION['user_id'];




$query = mysqli_query($conn, "select * from farmer_registration where name='$user_id'");
if ($query && mysqli_num_rows($query) > 0) {
  $row = mysqli_fetch_array($query);
} else {
  echo 'No results found';
}
?>
<head>
  <title>Update Profile</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

</head>

<body>
  <section class="my-5">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">
              <h2 class="display-6 text-center" text center>Profile</h2>
            </div>
            <div class="card-body">

              <section class="my-5">
                <div class="w-50 m-auto col-md-4">

                  <form action="FarmerProfile.php" method="post">

                    <div class="form-group">
                      <label> ID</label>
                      <input type="number" name="id" value="<?php echo $row['id']; ?>" placeholder="ID"
                        class="form-control" readonly />

                    </div>

                    <div class="form-group">
                      <label> Name</label>
                      <input type="text" name="name" value="<?php echo $row['name']; ?>" placeholder=" Name"
                        class="form-control" />

                    </div>

                    <div class="form-group">
                      <label>Mobile Number</label>
                      <input type="text" name="mobile" value="<?php echo $row['mobile']; ?>" maxlength=10
                        placeholder="Mobile" class="form-control" />

                    </div>

                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email" value="<?php echo $row['email']; ?>" placeholder="email"
                        class="form-control" />

                    </div>

                    <div class="form-group">
                      <label>UPI ID</label>
                      <input type="text" name="upiid" value="<?php echo $row['upiid']; ?>" placeholder="UPI ID"
                        class="form-control" />

                    </div>

                    <div class="form-group">
                      <label for="inputAddress">Address</label>
                      <input type="text" name="address" value="<?php echo $row['address']; ?>" class="form-control"
                        id="address" placeholder="1234 Main St">
                    </div>

                    <fieldset class="form-group">
                      <label for="inputAddress">Role</label>
                      <div class="row">

                        <legend class="col-form-label col-sm-2 pt-0"></legend>
                        <div class="col-sm-10">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" id="gridRadios1" value="Farmer"
                              checked readonly>
                            <label class="form-check-label" for="gridRadios1">
                              Farmer
                            </label>
                          </div>
                        </div>
                      </div>
                    </fieldset>
                    <div class="form-group ">
                      <label for="inputPassword4">Password</label>
                      <input type="password" name="password" value="<?php echo $row['password']; ?>"
                        placeholder="Password" class="form-control" id="inputPassword4">
                    </div>
                    <div class="form-group ">
                      <label for="inputPassword">Confirm Password</label>
                      <input type="password" name="confirmpassword" value="<?php echo $row['confirmpassword']; ?>"
                        placeholder="Password" class="form-control" id="confirmpassword">
                      <small id="emailHelp" class="form-text text-muted">Confirm Password</small>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Update

                    </button>
                    <a class="btn btn-primary" href="indexx.php">Close</a>
                    <div class="py-6">
                    </div>
                  </form>
                </div>

              </section>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</body>