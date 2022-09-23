<?php

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$faculty = $_POST['faculty'];
$birth = $_POST['birth'];
$course = $_POST['course'];
$gov = $_POST['gov'];


$connection = mysqli_connect("localhost", "root", NULL, "odc");
$query =  mysqli_query($connection, "UPDATE student SET Name = '$name', 
Email = '$email', 
password = '$password',
Phone = '$phone',
Faculty =  '$faculty',
Birth_Date = '$birth',
Course_ID = '$course',
Gov_ID = '$gov' WHERE Student_ID = '$id';");


header("location: admin.php");
