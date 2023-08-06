<?php

$conn = mysqli_connect('localhost', 'root', 'root', 'milkeasy') or die("Could not connect to database");

session_start();

$login = false;
$showError = false;

if (isset($_POST['submit'])) {

    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $password = mysqli_real_escape_string($conn, ($_POST['password']));

    $select = mysqli_query($conn, "SELECT * FROM Admin WHERE id = '$id' AND password = '$password'") or die('query failed');

    if (mysqli_num_rows($select) > 0) {

        $row = mysqli_fetch_assoc($select);

        $login = true;

        $_SESSION['loggedinn'] = true;
        $_SESSION['user_id'] = $row['id'];

        header('location:Admin_index.php');
    } else {
        $showError = "invalid credentials";
        echo("<script>alert('Invalid Credential')</script>");
        echo("<script>location.replace('./Admin_Login.php')</script>");
    }
}

?>


