<?php

$conn = mysqli_connect('localhost', 'root', 'root', 'milkeasy') or die("Could not connect to database");
session_start();

if (!isset($_SESSION['loggedinn'])) {
    header("location: ../newlogin.php");
  }
$id=$_SESSION['user_id'];
$select = mysqli_query($conn, "SELECT * FROM payment where name='$id' ORDER BY date desc ") or die('query failed');
?>

    <title>Payment </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<body class="bg-dark">
    <section class="my-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card " >
               
                
                    <div class="card-header">
                        <h2 class="display-6 text-center" text center>Payment History</h2>
                    </div>
                    
                    <div class="card-body">
                            
                      <table class="table table-responsive-sm table-bordered text-center">
                       
                            <tr class="bg-dark text-white">
                            <th>Sr No</th>
                           <th>Transaction ID </th>
                           <th>FROM DATE</th>
                           <th>TO DATE</th>
                           <th>AMOUNT</th>
                           <th>Status</th>                    
                            </tr>
                            <tr>
                                <?php
                                   $i=1;
                                    while ($row=mysqli_fetch_assoc($select))
                                    {
                            
                               ?>
                               <td><?php echo $i?></td>
                                <td><?php echo $row['trsnid']?></td>
                                <td><?php echo $row['fromdate']?></td>
                                <td><?php echo $row['todate']?></td>
                                <td><?php echo $row['amount']?></td>
                                <td><?php echo $row['status']?></td>                          
                                                               
                            </tr>
                               <?php 
                                   $i++;   
                                }
                                ?>
                                
                        </table>
                        <div class="text-right mr-3">
                <a class="btn btn-secondary" href="indexx.php">Close</a>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
</body>
