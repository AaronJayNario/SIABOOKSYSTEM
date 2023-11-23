<?php

include "db.php"; // Include your database connection

if (isset($_POST['register'])) {

    $studentName = $_POST['StudentName'];
    $srCode = $_POST['sr'];
    $yearSection = $_POST['ys'];
    $department = $_POST['department'];
    $password = $_POST['password'];

    // Insert into student table

    $insertStudentQuery = "INSERT INTO `student table` (`StudentID`, `StudentName`, `SR-Code`, `Year & Section`, `Department`) VALUES (NULL,'$studentName', '$srCode', '$yearSection',  '$department')";
    $resultStudent = $conn->query($insertStudentQuery);


    if ($resultStudent) {
        // If the student record is added successfully, get the generated StudentID
        $studentID = $conn->insert_id;
        if (!$resultStudent) {
            die("Student Query Failed: " . $conn->error);
        }

        // Insert into logintable table
        $insertLoginQuery = "INSERT INTO logintable (StudentID, Password) VALUES ('$studentID', '$password')";
        $resultLogin = $conn->query($insertLoginQuery);

        if ($resultLogin) {
            //If the login record is added successfully, show a success message
            echo "<script>alert('User added successfully!'); window.location.href = 'admin.php';</script>";
        } else {
           // Handle the case where insertion into logintable fails
            echo "<script>alert('Failed to add user.'); window.location.href = 'mkregister.php';</script>";
        }
    } else {
        //Handle the case where insertion into student table fails
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
    <link href="design/login_style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>

<body>
    <header>
        <img src="img/Batangas_State_Logo.png">
        <h1>BOOK RESERVATION SYSTEM</h1>
    </header>

    </div>
    <img class="background" src="img/bsu_pic">

    <div class="login-container">
        <form id="register-form" action="" method="post">
            <div class="login-form">
                <label for="StudentName" class="form-label">Student Name</label>
                <input type="text" class="form-control" name="StudentName">
            </div>

            <div class="form-group">
                <label for="SR-Code" class="form-label">SR-Code</label>
                <input type="text" class="form-control" name="sr">
            </div>

            <div class="form-group">
                <label for="Year & Section" class="form-label">Year & Section</label>
                <input type="text" class="form-control" name="ys">
            </div>

            <div class="form-group">
                <label for="Department" class="form-label">Department</label>
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