<?php

$conn = mysqli_connect('localhost', 'root', 'root', 'milkeasy') or die("Could not connect to database");

$id=$_GET['del'];
echo $id;
$delete = mysqli_query($conn, "DELETE FROM farmer_registration where id='$id'") or die('query failed');


if($delete)
{
    echo "Record deleted..";
    
}
else{
    echo " Not deleted";
}
?>