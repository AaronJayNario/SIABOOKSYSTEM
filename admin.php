<?php include "db.php"?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Book Reservation</title>
    <link href="design/style.css" rel="stylesheet">
    <link href="design/admin_style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.15.0/font/bootstrap-icons.css" rel="stylesheet"> 
</head>

<body>
    <div class="navigation">
        <h1>Batangas State University</h1>
        <img src="img/Batangas_State_Logo.png" alt="BSU Logo">
    </div>

    <div class="container">
        <h1 class="heading">ADMIN DASHBOARD</h1>

        <div class="box-container">
            <div class="box">
                <a href="register.php" class = "btn btn-outline-dark mb-2"> <i class="bi bi-person-plus"></i> Add User</a>
            </div>

            <div class="box">
                <i class="bi bi-book"></i>
                <a href="#" class="btn">BOOKTABLE</a>
            </div>

            <div class="box">
                <i class="bi bi-clock-history"></i>
                <a href="#" class="btn">HISTORY</a>
            </div>
        </div>
    </div>

    <img class="background" src="img/bsu_pic" alt="BSU Background">
</body>

</html>
