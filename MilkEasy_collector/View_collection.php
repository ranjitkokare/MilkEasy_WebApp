<?php

$conn = mysqli_connect('localhost', 'root', 'root', 'milkeasy') or die("Could not connect to database");
session_start();
if (!isset($_SESSION['loggedinn'])) {
    header("location: ../newlogin.php");
  }
$select = mysqli_query($conn, "SELECT * FROM milk_collection ORDER BY date desc ") or die('query failed');

$p = "SELECT * FROM ratedetails";
$res = mysqli_query($conn, $p);
$price = mysqli_fetch_assoc($res);
$a = $price['mprice'];



if (isset($_POST['search'])) {
    $id = mysqli_real_escape_string($conn, $_POST['name']);
    $_SESSION['name'] = $id;
    $select = mysqli_query($conn, "SELECT * FROM milk_collection WHERE name='$id' ORDER BY date desc") or die('query failed');

    if (mysqli_num_rows($select) > 0) {
        // Display data in HTML table
    } else {
        $showError = "No Data Found..";
    }
} // Add
?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<body class="bg-dark">
    <section class="pt-28">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="display-6 text-center" text center>DATA COLLECTION LIST</h2>
                        </div>
                        <div class="card-body">
                        <form action="View_collection.php" method="post" class="row g-3">
                                <div class="col-auto">
                                    <label>Filter By name :</label>

                                </div>
                                <div class="col-auto">
                                    <input type="text" class="form-control ml-3" id="name" name="name">
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
                                   <th>Sr No. </th>
                                    <th> FARMER NAME </th>
                                    <th>DATE</th>
                                    <th>SHIFT </th>
                                    <th>COLLECTOR ID </th>
                                    <th>FAT</th>
                                    <th>LITRES</th>

                                </tr>
                                <tr>
                                    <?php
                                         
                                     $totalLit=0;
                                     $lit;
                                     $i=1;
                                    while ($row = mysqli_fetch_assoc($select)) {
                                        ?>
                                         <td> <?php echo $i ?> </td>
                                        <td>
                                            <?php echo $row['name'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['date'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['shift'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['milk_collector_id'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['fat'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['litre'] ?>
                                        </td>
                                    </tr>
                                <?php
                                         
                                         
                                          $lit =$row['litre'];
                                          $f = $row['fat'];
                                          $totalLit +=($lit * $f ); 
                                          $i++;
                                    }
                                    ?>
                                    <tr>
                                <td colspan="7"></td>
                                <td> <h5 class=" text-center">Total :<?php  echo $totalLit ; ?></h5></td>
                                   </tr>
                            </table>
                            <div class="text-right mr-3">
                                <a class="btn btn-secondary" href="Collector_index.php">Close</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

