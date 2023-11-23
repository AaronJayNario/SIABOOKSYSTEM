<link rel="stylesheet" type="text/css" href="style.css">
<link href="design/login_style.css" rel="stylesheet">


<?php

include "db.php"; // Include your database connection

if (isset($_POST['register'])) {
    // Get user input from the registration form
    $studentName = $_POST['StudentName'];
    $yearSection = $_POST['Year &   Section'];
    $srCode = $_POST['SR-Code'];
    $department = $_POST['Department'];
    $password = $_POST['Password'];

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Insert into student table
    $insertStudentQuery = "INSERT INTO `student table` (StudentID, 'Year & Section', StudentName, SR-Code,Department	) VALUES ('$StudentName', '$yearSection', '$srCode', '$department', $password)";
    $resultStudent = $conn->query($insertStudentQuery);

    if ($resultStudent) {
        // If the student record is added successfully, get the generated StudentID
        $studentID = $conn->insert_id;
        if (!$resultStudent) {
            die("Student Query Failed: " . $conn->error);
        }
        
        // Insert into logintable table
        $insertLoginQuery = "INSERT INTO logintable (StudentID, Password) VALUES ('$studentID', '$hashedPassword')";
        $resultLogin = $conn->query($insertLoginQuery);

        if ($resultLogin) {
            // If the login record is added successfully, show a success message
            echo "<script>alert('User added successfully!'); window.location.href = 'alldmin.php';</script>";
        } else {
            // Handle the case where insertion into logintable fails
            echo "<script>alert('Failed to add user.'); window.location.href = 'mkregister.php';</script>";
        }
    } else {
        // Handle the case where insertion into student table fails
        echo "<script>alert('Failed to add user.'); window.location.href = 'mmllmregister.php';</script>";
        
    }

    // Close the database connection
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ADD USER</title>
    <link href="design/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>

<body>
    <div class="navigation" style="">
        <h1>ADD USER</h1>
        <img src="img/Batangas_State_Logo.png">

        <a class="logoutBtn" href="login.php">
            <img src="img/cics_logo.jpg">
            <div class="logoutC">LOGOUT</div>
        </a>

    </div>
    <img class="background" src="img/bsu_pic">

    <div class="login-container">
        <form id="register-form" action="" method="post">
            <div class="login-form">
                <label for="studentName" class="form-label">Student Name</label>
                <input type="text" class="form-control" name="studentName">
            </div>

            <div class="form-group">
                <label for="srCode" class="form-label">SR-Code</label>
                <input type="text" class="form-control" name="srCode">
            </div>

            <div class="form-group">
                <label for="yearSection" class="form-label">Year & Section</label>
                <input type="text" class="form-control" name="yearSection">
            </div>

            <div class="form-group">
                <label for="department" class="form-label">Department</label>
                <input type="text" class="form-control" name="department">
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>

            <div class="container text-center mt-5">
                <input type="submit" name="register" class="btn btn-primary mt-2" value="SUBMIT">
            </div>

        </form>
    </div>
</body>
</html>
