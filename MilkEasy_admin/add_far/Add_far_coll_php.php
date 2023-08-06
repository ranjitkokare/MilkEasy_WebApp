<?php

include 'connection.php';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $Phone = $_POST['contact'];
    $email = $_POST['email'];
    $upiid = $_POST['upiid'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $password = $_POST['password'];

    $mysql_qry = "SELECT * FROM registered_farmers where email='$email'";

    $result = mysqli_query($conn, $mysql_qry);
    $num_rows = mysqli_num_rows($result);

    if ($num_rows >= 1) {
        ?>
        <script>
                alert('Email is already Exist')
                location.replace("addFarmer_collector.php");
            </script>
<?php
    } else {
        $mysql_qry = "INSERT into registered_farmers(name, contact, email, upiid, address1, address2, password) values
         ('$name', '$Phone', '$email', '$upiid', '$address1','$address2','$password')";
        $result = mysqli_query($conn, $mysql_qry);
        if ($result >= 1) {
?>
            <script>
                alert('You have signed up successfully')
                location.replace("addFarmer_collector.php");</script>
<?php
        } else {
            echo "error 504";
        }
    }
}

$conn->close();
?>