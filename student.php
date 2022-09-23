<?php

session_start();

if (!$_COOKIE['login']) {
    header("location: login.html");
}
$email = $_SESSION['email'];
$connection = mysqli_connect("localhost", "root", NULL, "odc");

$query =  mysqli_query($connection, "SELECT * FROM student where email='$email'");
$user =  mysqli_fetch_all($query, MYSQLI_ASSOC);

$query_gov = mysqli_query($connection, "SELECT government.gov_name from government 
join student on student.gov_id = government.gov_id 
where email='$email'");
$gov = mysqli_fetch_all($query_gov, MYSQLI_ASSOC)[0];

$query_inst = mysqli_query($connection, "SELECT government.Insturactor from government 
join student on student.gov_id = government.gov_id 
where email='$email'");
$inst = mysqli_fetch_all($query_inst, MYSQLI_ASSOC)[0];

$query_cor = mysqli_query($connection, "SELECT course.course_name from course 
join student on student.course_id= course.course_id where email='$email'");
$cor = mysqli_fetch_all($query_cor, MYSQLI_ASSOC)[0];



?>



<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>CRUD</title>

<body>
    <div class="container my-5">
        <table class="table">
            <tr>
                <th>Student_ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Password</th>
                <th>Faculty</th>
                <th>Birth Date</th>
                <th>Governmante</th>
                <th>Course</th>
                <th>Instructor</th>

            </tr>
            <tr>
                <!-- Student Information -->
                <td><?= $user['0']['Student_ID']; ?></td>
                <td><?= $user['0']['Name']; ?></td>
                <td><?= $user['0']['Phone']; ?></td>
                <td><?= $user['0']['Email']; ?></td>
                <td><?= $user['0']['password']; ?></td>
                <td><?= $user['0']['Faculty']; ?></td>
                <td><?= $user['0']['Birth_Date']; ?></td>
                <td><?= $gov['gov_name']; ?></td>
                <td><?= $cor['course_name']; ?></td>
                <td><?= $inst['Insturactor']; ?></td>
            </tr>
        </table>
        <a href="login.html" class="btn btn-danger">Log out</a>
    </div>
</body>
</head>