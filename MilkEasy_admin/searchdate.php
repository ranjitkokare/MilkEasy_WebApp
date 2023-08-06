<?php

$conn = mysqli_connect('localhost', 'root', 'root', 'milkeasy') or die("Could not connect to database");
session_start();
if (!isset($_SESSION['loggedinn'])) {
    header("location: ../newlogin.php");
}

$select = mysqli_query($conn, "SELECT * FROM milk_collection ORDER BY date desc") or die('query failed');
if (isset($_POST['searchID'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $_SESSION['name'] = $id;
    $select = mysqli_query($conn, "SELECT * FROM milk_collection WHERE name='$id' ORDER BY date desc") or die('query failed');

    if (mysqli_num_rows($select) > 0) {
        // Display data in HTML table
    } else {
        $showError = "No Data Found..";
    }
} // Add this

if (isset($_POST['search'])) {

    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $datee = mysqli_real_escape_string($conn, $_POST['datee']);
    $select = mysqli_query($conn, "SELECT * FROM milk_collection WHERE date BETWEEN '$date' AND '$datee' ORDER BY date desc") or die('query failed');

    if (mysqli_num_rows($select) > 0) {
        // Display data in HTML table
    } else {
        $showError = "No Data Found..";
    }
}
// Add this

if (isset($_POST['searchdate'])) {
    if (isset($_SESSION['name'])) {
        $id = $_SESSION['name'];
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        $datee = mysqli_real_escape_string($conn, $_POST['datee']);
        $select = mysqli_query($conn, "SELECT * FROM milk_collection WHERE name= '$id' AND date BETWEEN '$date' AND '$datee' ORDER BY date desc") or die('query failed');

        if (mysqli_num_rows($select) > 0) {
            // Display data in HTML table
        } else {
            $showError = "No Data Found..";
        }
    } else {
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        $datee = mysqli_real_escape_string($conn, $_POST['datee']);
        $select = mysqli_query($conn, "SELECT * FROM milk_collection WHERE date BETWEEN '$date' AND '$datee' ORDER BY date desc") or die('query failed');

        if (mysqli_num_rows($select) > 0) {
            // Display data in HTML table
        } else {
            $showError = "No Data Found..";
        }
    }
} // Add this

//Edit

//delete Entry
if (isset($_GET['del'])) {
    $srno = $_GET['del'];

    $delete = mysqli_query($conn, "DELETE FROM milk_collection where srno='$srno'") or die('query failed');


    if ($delete) {
        header('refresh:1; url=searchdate.php');
    } else {
        echo " Not deleted";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Milk Collection</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body class="bg-dark">

    <section class="my-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card ">
                        <div class="card-header">
                            <h2 class="display-6 text-center" text center>DATA COLLECTION LIST</h2>
                        </div>
                        <div class="card-body">

                            <form action="searchdate.php" method="post"  class="row g-3">
                            <div class="col-auto">
                                    <label>Filter By Name :</label>
                                    
                                </div>
                                <div class="col-auto">
                                <input type="text" class="form-control ml-3" id="id" name="id">
                                </div>

                                <div class="col-auto">
                                    <button type="submit" name="searchID" value="search"
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
                                    <button type="submit" name="searchdate" value="search"
                                        class="btn btn-primary mb-3">Search</button>
                                </div>
                            </form>

                            <table class="table table-responsive-sm table-bordered mt-3 text-center">
                                <tr class="bg-dark text-white">
                                    <th>SrNo</th>
                                   
                                    <th> NAME </th>
                                    <th>DATE</th>
                                    <th> SHIFT </th>
                                    <th>COLLECTOR ID </th>
                                    <th>FAT</th>
                                    <th>LITRES</th>
                                    <th>PRICE</th>
                                    <th colspan="2">ACTION</th>
                                </tr>
                                <tr>
                                    <?php
                                    $total = 0;
                                    $val = 0;
                                    $totalLit = 0;
                                    $lit;

                                    $no = 1;
                                    while ($row = mysqli_fetch_assoc($select)) {
                                        $i = $row['srno'];
                                        echo "
                                <td>" . $no . "</td>
                              
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

                                        $no++;
                                    }

                                    ?>
                                <tr>
                                    <td colspan="7"></td>
                                    <td>
                                        <h5 class=" text-center">Total :
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
    </section>
</body>

</html>