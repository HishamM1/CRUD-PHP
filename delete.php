<?php

$id =  $_GET['id'];

$connection = mysqli_connect("localhost", "root", NULL, "odc");
$query =  mysqli_query($connection, "DELETE FROM student WHERE student_id = $id");

header("location: admin.php");
