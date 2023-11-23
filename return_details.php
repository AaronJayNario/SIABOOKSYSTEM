<?php
include "db.php";
include "server.php";
?>

<head>
    <meta charset="UTF-8">
    <title>Book Reservation</title>
    <link href="design/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>
<div class="navigation" style="">
        <h1>Batangas State University</h1>
        <img src="img/Batangas_State_Logo.png">

        <p><strong>Welcome to Library</strong></p>
        <a class="logoutBtn" href="librarian.php">
      <img src="img/cics_logo.jpg">
      <div class="logoutC">Back</div>
    </a>


    </div>

    <img class="background" src="img/bsu_pic">


    <div class="libra-post">
    <div class="return-details">
        <?php 
            // Fetch and display return details for accepted reservations
        $selectReturnQuery = "SELECT * FROM returntable";
        $resultReturn = $conn->query($selectReturnQuery);

        if ($resultReturn->num_rows > 0) {
            // Display a table of return details
            echo "<h3>Return Details</h3>
                        <table class='table table-bordered table-striped table-hover'>
                            <thead class='thead-dark'>
                                <tr>
                                    <th>ReturnID</th>
                                    <th>ReserveID</th>
                                    <th>Date Reserve</th>
                                    <th>Time Reserve</th>
                                    <th>Date Return</th>
                                    <th>Time Return</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>";

            while ($rowReturn = $resultReturn->fetch_assoc()) {
                echo "<tr>
                                <td>{$rowReturn['ReturnID']}</td>
                                <td>{$rowReturn['ReserveID']}</td>
                                <td>{$rowReturn['DateReserve']}</td>
                                <td>{$rowReturn['TimeReserve']}</td>
                                <td>{$rowReturn['DateReturn']}</td>
                                <td>{$rowReturn['TimeReturn']}</td>
                                <td>{$rowReturn['Status']}</td>
                            </tr>";
            }

            echo "</tbody></table>";
        } else {
            echo "<p class='alert alert-info'>No return details available.</p>";
        }

        $conn->close();
        
        
        
        ?>
    </div>
    </div>
</body>
</html>