<?php



$connection = mysqli_connect("localhost", "root", NULL, "odc");

$query_governments = mysqli_query($connection, "SELECT distinct gov_name from government;");
$governments = mysqli_fetch_all($query_governments, MYSQLI_ASSOC);
$count = 1;

// If search bar was used
if ($_POST['search'] != null) {
    $search = $_POST['search'];
    $query = mysqli_query($connection, "SELECT * from student 
    join course on student.course_id= course.course_id 
    join government on student.gov_id = government.gov_id 
    WHERE student.name like '%$search%' or student.phone like '%$search%'");
    $users =  mysqli_fetch_all($query, MYSQLI_ASSOC);

    // If filter was used
} elseif ($_POST['gov'] != null) {
    $filter = $_POST['gov'];
    $query =  mysqli_query($connection, "SELECT * from student 
    join course on student.course_id= course.course_id 
    join government on student.gov_id = government.gov_id 
    where student.gov_id='$filter'");
    $users =  mysqli_fetch_all($query, MYSQLI_ASSOC);
}


?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>CRUD</title>

<body>
    <div class="container my-5">

        <form class="form-horizontal" action="search.php" method="post">
            <div class="container my-5">
                <div class="container my-5">
                    <label class="form-label" for="email">Search</label>
                    <input type="text" class="form-control" style="margin-bottom: 5px;" name="search" placeholder="search here">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>

                </div>

                <div class="container my-5">
                    <label for="gov" class="form-label"> Filter by Governmante</label>
                    <select name="gov" id="gov">
                        <option value="<?= null ?>" selected disabled hidden>Choose here</option>
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
                    <a href="admin.php" class="btn btn-primary">Reset</a>
                    <a href="login.html" class="btn btn-danger">Log out</a>
                </div>
        </form>

    </div>
</body>
</head>