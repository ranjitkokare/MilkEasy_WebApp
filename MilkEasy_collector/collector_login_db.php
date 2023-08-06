<?php

$conn = mysqli_connect('localhost', 'root', 'root', 'milkeasy') or die("Could not connect to database");

session_start();

$login = false;
$showError = false;

if (isset($_POST['csubmit'])) {

    $name = mysqli_real_escape_string($conn, $_POST['cname']);
    $password = mysqli_real_escape_string($conn, ($_POST['cpassword']));

    $select = mysqli_query($conn, "SELECT * FROM registration WHERE name = '$name' AND pasword = '$password'") or die('query failed');

    if (mysqli_num_rows($select) > 0) {

        $row = mysqli_fetch_assoc($select);

        $login = true;

        $_SESSION['loggedin'] = true;
        $_SESSION['collector_id'] = $row['id'];

        header('location:Collector_index.php');
    } else {
        $showError = "invalid credentials";
        echo("<script>alert('Invalid Credential')</script>");
        echo("<script>location.replace('./collector_Login.php')</script>");
    }
}

?>


