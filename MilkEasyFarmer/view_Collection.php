<?php

$conn = mysqli_connect('localhost', 'root', 'root', 'milkeasy') or die("Could not connect to database");
session_start();
if (!isset($_SESSION['loggedinn'])) {
    header("location: ../newlogin.php");
  }

$id=$_SESSION['user_id'];
$select = mysqli_query($conn, "SELECT * FROM milk_collection where name='$id' ORDER BY date desc") or die('query failed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Milk Collection</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
    
</head>
<body class="bg-dark">
    <section class="my-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card " >
               
                
                    <div class="card-header">
                        <h2 class="display-6 text-center" text center>DATA COLLECTION LIST</h2>
                    </div>
                    
                    <div class="card-body">
                    
     <form   action="searchdate.php" method="post">      
         <input type="date" id="date" name="date" >
         <input type="date" id="datee" name="datee" >
         <input type="submit" name="search" value="search">
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
                            </tr>
                            <tr>
                                <?php
                                   $total=0;
                                   $val=0;
                                   $totalLit=0;
                                   $lit;
                                   $i=1;
                                    while ($row=mysqli_fetch_assoc($select))
                                    {
                            
                               ?>
                                <td><?php echo $i; ?></td>
                              
                                <td><?php echo $row['name'];?></td>
                                <td><?php echo $row['date'];?></td>
                                <td><?php echo $row['shift'];?></td>
                                <td><?php echo $row['milk_collector_id'];?></td>
                                <td><?php echo $row['fat'];?></td>
                                <td><?php echo $row['litre'];?></td>
                                <td><?php echo $row['price'];?></td>
                                
                                
                                
                            </tr>
                               <?php 
                               
                               $val=$row['price'];
                               $total +=$val;
                               $lit =$row['litre'];
                               $totalLit +=$lit; 
                               $i++;
                                      
                                }
                                ?>
                                <tr>
                                <td colspan="6"></td>
                                <td> <h5 class=" text-center">Total :<?php  echo $totalLit ; ?></h5></td>
                                <td><h5 class=" text-center">Total :<?php  echo $total ; ?></h5>  </td>
                            </tr>
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
</html>