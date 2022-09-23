<?php

$id = $_GET['id'];

$connection = mysqli_connect("localhost", "root", NULL, "odc");

$query =  mysqli_query($connection, "SELECT * FROM student WHERE student_id = $id");
$user = mysqli_fetch_assoc($query);

$query_governments = mysqli_query($connection, "SELECT distinct gov_name from government;");
$governments = mysqli_fetch_all($query_governments, MYSQLI_ASSOC);
$count = 1;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>CRUD</title>
</head>

<body>

    <body>
        <h1 style="text-align:center;">CRUD ODC</h1>
        <div class="container my-5">
            <form action="doupdate.php" method="post" enctype="multipart/form-data">
                <h3 class="form-label">Update Student</h3>
                <input type="hidden" value="<?= $user['Student_ID']; ?>" name="id">
                <div class="mb-3">
                    <label for="Name" class="form-label">Name</label>
                    <input type="text" value="<?= $user['Name']; ?>" class="form-control" name="name" id="Name" placeholder="Enter your name">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" value="<?= $user['Phone']; ?>" class="form-control" name="phone" id="phone" placeholder="Enter your phone number">
                </div>
                <div class="mb-3">
                    <label for="Email" class="form-label">Email address</label>
                    <input type="email" class="form-control" value="<?= $user['Email']; ?>" name="email" id="Email" placeholder="Enter your email">
                </div>
                <div class="mb-3">
                    <label for="Password" class="form-label">Password</label>
                    <input type="text" class="form-control" value="<?= $user['password']; ?>" name="password" id="Password" placeholder="Enter your password">
                </div>
                <div class="mb-3">
                    <label for="faculty" class="form-label">Faculty</label>
                    <input type="text" class="form-control" value="<?= $user['Faculty']; ?>" name="faculty" id="Name" placeholder="Enter your Faculty">
                </div>
                <div class="mb-3">
                    <label for="birth" class="form-label">Birth Date</label>
                    <input type="date" value="<?= $user['Birth_Date']; ?>" class="form-control" name="birth" id="birth">
                </div>
                <div class="mb-3">
                    <label for="course" class="form-label">Course</label>
                    <select name="course" id="course">
                        <option value="1">Backend</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="gov" class="form-label">Government</label>
                    <select name="gov" id="gov">

                        <?php foreach ($governments as $government) : ?>
                            <option value="<?= $count ?>" <?php if ($count == $user['Gov_ID']) : echo 'selected';
                                                            endif; ?>>
                                <?= $government['gov_name'] ?></option>
                            <?php $count++; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" name="submit" class="btn
                                    btn-danger">Update</button>
                <a href="admin.php" class="btn btn-primary">Return</a>
            </form>
        </div>
    </body>
    </form>
</body>

</html>