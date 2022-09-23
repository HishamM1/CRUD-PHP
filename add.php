<?php



$connection = mysqli_connect("localhost", "root", NULL, "odc");

$query_governments = mysqli_query($connection, "SELECT distinct gov_name from government;");
$governments = mysqli_fetch_all($query_governments, MYSQLI_ASSOC);
$count = 1;
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CRUD ODC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h1 style="text-align:center;">CRUD ODC</h1>
    <div class="container my-5">
        <form action="addToDB.php" method="post" enctype="multipart/form-data">
            <h3 class="form-label">Add a New Student</h3>
            <div class="mb-3">
                <label for="Name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="Name" placeholder="Enter your name">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter your phone number">
            </div>
            <div class="mb-3">
                <label for="Email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="Email" placeholder="Enter your email">
            </div>
            <div class="mb-3">
                <label for="Password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="Password" placeholder="Enter your password">
            </div>
            <div class="mb-3">
                <label for="faculty" class="form-label">Faculty</label>
                <input type="text" class="form-control" name="faculty" id="Name" placeholder="Enter your Faculty">
            </div>
            <div class="mb-3">
                <label for="birth" class="form-label">Birth Date</label>
                <input type="date" class="form-control" name="birth" id="birth">
            </div>
            <div class="mb-3">
                <label for="course" class="form-label">Course</label>
                <select name="course" id="course">
                    <option value="1">Backend</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="gov" class="form-label">Governmante</label>
                <select name="gov" id="gov">
                    <option value="" selected disabled hidden>Choose
                        here</option>
                    <?php foreach ($governments as $government) : ?>
                        <option value="<?= $count ?>"><?=
                                                        $government['gov_name'] ?></option>
                        <?php $count++; ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" name="submit" class="btn
                                    btn-danger">Add</button>
            <a href="admin.php" class="btn btn-primary">Return</a>
        </form>
    </div>
</body>

</html>