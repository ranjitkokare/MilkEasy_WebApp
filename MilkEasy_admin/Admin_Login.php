<?php

$conn = mysqli_connect('localhost', 'root', 'root', 'milkeasy') or die("Could not connect to database");

session_start();

if(isset($_SESSION['loggedinn'])){

  header("location: Admin_index.php");
}


$login = false;
$showError = false;

if (isset($_POST['submit'])) {

  $id = mysqli_real_escape_string($conn, $_POST['id']);
  $password = mysqli_real_escape_string($conn, ($_POST['password']));
  $select = mysqli_query($conn, "SELECT * FROM admin_registration WHERE id = '$id' AND password = '$password'") or die('query failed');

  if (mysqli_num_rows($select) > 0) {

    $row = mysqli_fetch_assoc($select);

    $login = true;

    $_SESSION['loggedinn'] = true;
    $_SESSION['admin_id'] = $row['id'];
   
    header('location:Admin_index.php');
     
    
  } else {
    $showError = "invalid credentials";
  }
}

?>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <title>Login</title>
  <?php
  if ($login) {
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your are logged in
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

<head>
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/login.css">
</head>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="images/img3.jpg" alt="login" class="login-card-img "  >
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <h1 class="ml-5" style="color:brown;">MILKEASY</h1>
              </div>
              <p class="login-card-description">Sign into your account</p>
              <form action="Admin_Login.php" method="post">
                  <div class="form-group">
                    <label for="email" class="sr-only">ID</label>
                    <input type="text" name="id" id="id" class="form-control" placeholder="Enter ID">
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
                  </div>
                  <input name="submit" id="submit" class="btn btn-block login-btn mb-4" type="submit" value="submit">
                </form>
                <a href="Forgot.php" class="forgot-password-link">Forgot password?</a>
                <p class="login-card-footer-text">Don't have an account? <a href="#!" class="text-reset">Register here</a></p>
                <nav class="login-card-footer-nav">
                  <a href="#!">Terms of use.</a>
                  <a href="#!">Privacy policy</a>
                </nav>
            </div>
          </div>
        </div>
      </div>
     
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>




