<?php

session_start();

if (!$_COOKIE['login']) {
    header("location: login.html");
}

$connection = mysqli_connect("localhost", "root", NULL, "odc");
# Joinning the three tables
$query =  mysqli_query($connection, "SELECT * from student 
join course on student.course_id= course.course_id 
join government on student.gov_id = government.gov_id;");
$users =  mysqli_fetch_all($query, MYSQLI_ASSOC);

// Query to get every unique government we have in db
$query_governments = mysqli_query($connection, "SELECT distinct gov_name from government;");
$governments = mysqli_fetch_all($query_governments, MYSQLI_ASSOC);

# variable to number the government
$count = 1;

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

        <form class="form-horizontal" action="search.php" method="post">
            <div class="container my-5">
                <div>
                    <label class="control-label col-sm-4">Search</label>
                    <div class="col-sm-4">
                        <!-- search bar -->
                        <input type="text" class="form-control" style="margin-bottom: 5px;" name="search" placeholder="search by name or phone number">
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" name="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="gov" class="form-label"> Filter by Governmante</label>
                    <!-- Filter -->
                    <select name="gov" id="gov">
                        <option value="" selected disabled hidden>Choose here</option>
                        <?php foreach ($governments as $government) : ?>
                            <option value="<?= $count ?>"><?= $government['gov_name'] ?></option>
                            <?php $count++; ?>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" name="filter" class="btn btn-primary">Filter</button>
                </div>

                <div class="container my-5">
                    <a href="add.php" class="btn btn-danger">Add New Student</a>
                    <table class="table">
                        <tr>
                            <th>Student_ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Faculty</th>
                            <th>Birth Date</th>
                            <th>Government</th>
                            <th>Course</th>
                            <th>Instructor</th>
                        </tr>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <!-- Student informations, admin view -->
                                <td><?= $user['Student_ID']; ?></td>
                                <td><?= $user['Name']; ?></td>
                                <td><?= $user['Phone']; ?></td>
                                <td><?= $user['Email']; ?></td>
                                <td><?= $user['password']; ?></td>
                                <td><?= $user['Faculty']; ?></td>
                                <td><?= $user['Birth_Date']; ?></td>
                                <td><?= $user['gov_name']; ?></td>
                                <td><?= $user['course_name']; ?></td>
                                <td><?= $user['Insturactor']; ?></td>
                                <td>
                                    <a href="update.php?id=<?= $user['Student_ID']; ?>" class="btn btn-primary">Update</a>
                                    <a href="delete.php?id=<?= $user['Student_ID']; ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                    <a href="login.html" class="btn btn-danger">Log out</a>
                </div>
</body>
</head>