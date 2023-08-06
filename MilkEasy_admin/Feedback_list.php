
<?php

$conn = mysqli_connect('localhost', 'root', 'root', 'milkeasy') or die("Could not connect to database");
session_start();
if (!isset($_SESSION['loggedinn'])) {
    header("location: ../newlogin.php");
  }
$showAlert=false;
$showError=false;
$select = mysqli_query($conn, "SELECT * FROM feedback ORDER BY date desc") or die('query failed');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
</head>

<body class="bg-dark">
    <section class="my-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="display-6 text-center" text center>Feedback List</h2>
                    </div>
                    
                    <div class="card-body">
                            <table class="table table-responsive-sm table-bordered text-center">
                            <tr class="bg-dark text-white">
                            <th>Sr No </th>
                            <th>FIRST NAME </th>
                            <th>LAST NAME </th>
                            <th>COMMENT</th>
                            <th>DATE </th>
                            
                            </tr>
                            <tr>
                                <?php
                                    $i=1;
                                    while ($row=mysqli_fetch_assoc($select))
                                    {
                            echo "
                                <td>".$i."</td>
                                <td>".$row['fname']."</td>
                                <td>". $row['lname']."</td>
                                <td>".$row['comment']."</td>
                                <td>".$row['date']."</td>
                    
                              </tr>
                               "; 
                                  $i++; 
                                }
                                
                                ?>
                                
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