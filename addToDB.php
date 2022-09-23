<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $faculty = $_POST['faculty'];
    $birth = $_POST['birth'];
    $gov = $_POST['gov'];
    $course = $_POST['course'];

    $connect = mysqli_connect('localhost', 'root', NULL, 'odc');
    mysqli_query($connect, "INSERT INTO student(name,email,password,phone,faculty,birth_date,Gov_ID,course_ID) values('$name','$email','$password','$phone','$faculty','$birth','$gov','$course');");
    header("location: admin.php");
}
