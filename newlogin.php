<?php

$conn = mysqli_connect('localhost', 'root', 'root', 'milkeasy') or die("Could not connect to database");

session_start();


$login = false;
$showError = false;

if (isset($_POST['submit'])) {
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5(($_POST['password'])));

    if($role=='Farmer')
    {
    $select = mysqli_query($conn, "SELECT * FROM farmer_registration WHERE email = '$email' AND password = '$password'") or die('query failed');
    }

    if($role=='Milk Collector')
    {
    $select = mysqli_query($conn, "SELECT * FROM milkcollector_registration WHERE email = '$email' AND password = '$password'") or die('query failed');
    }

    if($role=='Admin')
    {
    $select = mysqli_query($conn, "SELECT * FROM admin_registration WHERE email = '$email' AND password = '$password'") or die('query failed');
    }


    if (mysqli_num_rows($select) > 0) {

        $row = mysqli_fetch_assoc($select);

        $login = true;

        $_SESSION['loggedinn'] = true;
        if($role=='Farmer')
        {
        $_SESSION['user_id'] = $row['name'];
        
        header('location:MilkEasyFarmer/indexx.php');
        }
        if($role=='Milk Collector')
        {
        $_SESSION['collector_id'] = $row['name'];
        
        header('location:MilkEasy_collector/Collector_index.php');
        }
        if($role=='Admin')
        {
        $_SESSION['admin_id'] = $row['name'];
        
        header('location:MilkEasy_admin/Admin_index.php');
        }


    } else {
        $showError = "invalid credentials";
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

    <title>Login</title>
</head>

<body>

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

</body>

</html>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>

    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="images/img3.jpg" alt="login" class="login-card-img">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <h1 class="ml-4" style="color:brown;">MILKEASY</h1>
                            </div>
                            <p class="login-card-description">Sign into your account</p>
                            <form action="newlogin.php" method="post">
                            <div class="form-group">
                                <div class="radio_btns  mb-4">
                                    
                                    <input type="radio" name="role" value="Farmer" required >
                                    <label for="" class="mr-4">Farmer</label>
                                   
                                    <input type="radio" name="role" value="Milk Collector" required >
                                    <label for="" class="mr-4">Collector</label>
                                   
                                    <input type="radio" name="role" value="Admin" required>
                                    <label for="">Admin</label><br>
                                </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" >Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" >Password</label>
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="Enter Password">
                                </div>
                                <input name="submit" id="submit" class="btn btn-block login-btn mb-4" type="submit"
                                    value="submit">
                            </form>
                            <a href="Forgot.php" class="forgot-password-link">Forgot password?</a>
                            <nav class="login-card-footer-nav">
                               
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
</body>

</html>