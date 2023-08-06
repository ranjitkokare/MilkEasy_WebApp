<?php

$conn = mysqli_connect('localhost', 'root', 'root', 'milkeasy') or die("Could not connect to database");
session_start();
if (!isset($_SESSION['loggedinn'])) {
    header("location: ../newlogin.php");
}
$select = mysqli_query($conn, "SELECT * FROM milk_collection ORDER BY date desc ") or die('query failed');
if (isset($_POST['search'])) {
    $id = mysqli_real_escape_string($conn, $_POST['name']);
    $_SESSION['name'] = $id;
    $select = mysqli_query($conn, "SELECT * FROM milk_collection WHERE name='$id' ORDER BY date desc") or die('query failed');

    if (mysqli_num_rows($select) > 0) {
        // Display data in HTML table
    } else {
        $showError = "No Data Found..";
    }
} // Add this


?>
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
    <section class="pt-28">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="display-6 text-center" text center>MILK COLLECTION </h2>
                        </div>
                        <div class="card-body">
                            <form action="View_collection.php" method="post" class="row g-3">
                                <div class="col-auto">
                                    <label>Filter By Name :</label>

                                </div>
                                <div class="col-auto">
                                    <input type="name" class="form-control ml-3" id="id" name="name">
                                </div>

                                <div class="col-auto">
                                    <button type="submit" name="search" value="search"
                                        class="btn btn-primary mb-3">Search</button>
                                </div>
                            </form>
                            <form action="searchdate.php" method="post" class="row g-3">
                                <div class="col-auto">
                                    <label>Filter By Date :</label>
                                </div>
                                <div class="col-auto">
                                    <label>From</label>
                                </div>
                                <div class="col-auto">
                                    <input type="date" name="date" class="form-control" id="date">
                                </div>
                                <div class="col-auto">
                                    <label>To</label>

                                </div>
                                <div class="col-auto">
                                    <input type="date" name="datee" class="form-control" id="datee">

                                </div>
                                <div class="col-auto">
                                    <button type="submit" name="search" value="search"
                                        class="btn btn-primary mb-3">Search</button>
                                </div>
                            </form>
                            <table class="table table-responsive-sm table-bordered text-center">
                                <tr class="bg-dark text-white">
                                    <th>SrNo </th>
                             
                                    <th> NAME </th>
                                    <th>DATE</th>
                                    <th> SHIFT </th>
                                    <th>MILK COLLECTOR ID </th>
                                    <th>FAT</th>
                                    <th>LITRES</th>
                                    <th>PRICE</th>
                                    <th>ACTION</th>
                        

                                </tr>
                                <tr>
                                    <?php
                                    $total = 0;
                                    $val = 0;
                                    $totalLit = 0;
                                    $lit;
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($select)) {

                                        $row['srno'];
                                        echo "
                                <td>" . $i . "</td>
                                <td>" . $row['name'] . "</td>
                                <td>" . $row['date'] . "</td>
                                <td>" . $row['shift'] . "</td>
                                <td>" . $row['milk_collector_id'] . "</td>
                                <td>" . $row['fat'] . "</td>
                                <td>" . $row['litre'] . "</td>
                                <td>" . $row['price'] . "</td>
                    
                                 <td> <a  class='btn btn-danger' href='searchdate.php?del=" . $row['srno'] . "'>Delete</a></td>
                                
                            </tr>
                               
                                      
                                     ";

                                        $val = $row['price'];
                                        $total += $val;
                                        $lit = $row['litre'];
                                        $totalLit += $lit;
                                        $i++;
                                    }
                                    ?>

                                <tr>
                                    <td colspan="6"></td>
                                    <td>
                                        <h5 class=" text-center">Liters :
                                            <?php echo $totalLit; ?>
                                        </h5>
                                    </td>
                                    <td>
                                        <h5 class=" text-center">Total :
                                            <?php echo $total; ?>
                                        </h5>
                                    </td>
                                </tr>
                            </table>
                            <div class="text-right mr-3">
                                <a class="btn btn-secondary" href="Admin_index.php">Close</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>