<?php

$conn = mysqli_connect('localhost', 'root', 'root', 'milkeasy') or die("Could not connect to database");
session_start();
if (!isset($_SESSION['loggedinn'])) {
    header("location: ../newlogin.php");
}

$showAlert = false;
$showError = false;
$id = mysqli_real_escape_string($conn, '1');
$role = mysqli_real_escape_string($conn, 'farmer');
$select = mysqli_query($conn, "SELECT * FROM farmer_registration where role='Farmer'") or die('query failed');




if (isset($_GET['del'])) {
    $id = $_GET['del'];

    $delete = mysqli_query($conn, "DELETE FROM farmer_registration where id='$id'") or die('query failed');


    if ($delete) {
        $showAlert = true;
        header('refresh:1; url=Farmer_list.php');
    } else {
        $showError = " Not deleted";
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

    <title>Farmer List</title>
</head>

<body>

    <?php
    if ($showAlert) {
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Farmer removed Succesfully..
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
    <title>Farmer List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body class="bg-dark">
    <section class="my-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="display-6 text-center" text center>Farmer List</h2>
                        </div>

                        <div class="card-body">
                            <div class="text-right mr-3">
                                <a class="btn btn-secondary" href="Admin_index.php">Close</a>
                            </div>
                            <table class="table table-responsive-sm table-bordered text-center">
                                <tr class="bg-dark text-white">
                                    <th>SrNo </th>
                                    <th>ID </th>
                                    <th>NAME </th>
                                    <th>ROLE</th>
                                    <th>MOBILE </th>
                                    <th> EMAIL </th>
                                    <th>UPI ID </th>
                                    <th>ADDRESS</th>
                                    <th>ACTION </th>
                                </tr>
                                <tr>
                                    <?php
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($select)) {
                                        echo "
                                <td>" . $i . "</td>
                                <td>" . $row['id'] . "</td>
                                <td>" . $row['name'] . "</td>
                                <td>" . $row['role'] . "</td>
                                <td>" . $row['mobile'] . "</td>
                                <td>" . $row['email'] . "</td>
                                <td>" . $row['upiid'] . "</td>
                                <td>" . $row['address'] . "</td>
                                <td> <a  class='btn btn-danger' href='Farmer_list.php?del=" . $row['id'] . "'>Delete</a></td>
                            </tr>
                               ";
                                        $i++;
                                    }
                                    ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>