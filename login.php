<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $connect = mysqli_connect('localhost', 'root', NULL, 'odc');

    $query = mysqli_query($connect, "SELECT * FROM student WHERE email = '$email' and password = '$password'");

    $admin_query = mysqli_query($connect, "SELECT admin FROM student WHERE email = '$email' and password = '$password'");

    $admin =  mysqli_fetch_all($admin_query, MYSQLI_ASSOC);
    $user = mysqli_fetch_assoc($query);

    if (empty($user)) {
        header("location: login.html");
    } elseif ($admin[0]['admin'] == 1) {
        setcookie("login", true, time() + 86400);
        header("location:admin.php");
    } else {
        setcookie("login", true, time() + 86400);
        $_SESSION['email'] = $email;
        header("location:student.php");
    }
}
