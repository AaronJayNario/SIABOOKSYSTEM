<?php
include "db.php";
include "server.php";

// Function to format the current date and time
function getCurrentDateTime()
{
    return date("Y-m-d H:i:s");
}

// Function to get book name by ID
function getBookName($bookID)
{
    global $conn;
    $query = "SELECT BookNames FROM `booktable` WHERE BookID = $bookID";
    $result = $conn->query($query);

    if (!$result) {
        die("Error in SQL query: " . $conn->error);
    }

    $row = $result->fetch_assoc();
    return $row['BookNames'];
}

// Function to get student name by ID
function getStudentName($studentID)
{
    global $conn;
    $query = "SELECT StudentName FROM `student table` WHERE StudentID = $studentID";
    $result = $conn->query($query);


    if (!$result) {
        die("Error in SQL query: " . $conn->error);
    }

    $row = $result->fetch_assoc();
    return $row['StudentName'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["accept"])) {
        $reserveID = $_POST["reserveID"];

        // Update the status to "Accepted" in the reserve table
        $updateQuery = "UPDATE `reservetable` SET Status = 'Accepted' WHERE ReserveID = $reserveID";
        $conn->query($updateQuery);

        // Insert a new entry in the returntable with provided DateReturn and TimeReturn
        $dateReturn = $_POST["dateReturn"];
        $timeReturn = $_POST["timeReturn"];
        $insertQuery = "INSERT INTO `returntable` (ReserveID, DateReserve, TimeReserve, DateReturn, TimeReturn, Status) 
                        VALUES ($reserveID, CURDATE(), CURTIME(), '$dateReturn', '$timeReturn', 'Not Yet Returned')";

        $conn->query($insertQuery);
    } elseif (isset($_POST["cancel"])) {
        $reserveID = $_POST["reserveID"];

        // Update the status to "Cancelled" in the reserve table if the reserve book is cancel 
        $updateQuery = "UPDATE reservetable SET Status = 'Cancelled' WHERE ReserveID = $reserveID";
        $conn->query($updateQuery);
    }
}

// Fetch pending from reservetable
$selectQuery = "SELECT r.ReserveID, r.StudentID, r.BookID, r.Status, s.`SR-Code`, s.`Year & Section`, b.Category
                FROM reservetable r
                INNER JOIN `student table` s ON r.StudentID = s.StudentID
                INNER JOIN booktable b ON r.BookID = b.BookID
                WHERE r.Status = 'Pending'";
$result = $conn->query($selectQuery);

?>

<!DOCTYPE html>
<html lang="en">

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
    </div>

    <img class="background" src="img/bsu_pic">

    <div class="libra-post">
        <div class="librarian">
            <?php
            if ($result) {
                if ($result->num_rows > 0) {
                    // Display a table of pending reserve 
                    echo "<div style='max-height: 550px; overflow-y: auto;'>";
                    echo "<table class='table table-bordered table-striped table-hover' >
                            <thead class='thead-dark'>
                                <tr>
                                    <h1>Reservation Details</h1>
                                    <th>ReserveID</th>
                                    <th>Student Name</th>
                                    <th style='width: 150px;' class='text-center'>SR-Code</th>
                                    <th>Book Name</th>
                                    <th>Category</th>
                                    <th style='width: 150px;'>Year & Section</th>
                                    <th>Status</th>
                                    <th style='width: 150px;'class='text-center'>Action</th>                                   
                                </tr>
                            </thead>
                            <tbody>";

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='text-center'>
                                <td>{$row['ReserveID']}</td>
                                <td>" . getStudentName($row['StudentID']) . "</td>
                                <td>{$row['SR-Code']}</td>
                                <td>" . getBookName($row['BookID']) . "</td>
                                <td>{$row['Category']}</td>
                                <td>{$row['Year & Section']}</td>
                                <td>{$row['Status']}</td>
                                <td>
                                    <form method='post'>
                                        <input type='hidden' name='reserveID' value='{$row['ReserveID']}'>
                                        <label for='dateReturn'>Date Return:</label>
                                        <input type='date' name='dateReturn' required>
                                        <label for='timeReturn'>Time Return:</label>
                                        <input type='time' name='timeReturn' required>
                                        <input type='submit' name='accept' value='Accept' class='btn btn-success'>
                                    </form>
                                </td>
                                <td>
                                    <form method='post'>
                                        <input type='hidden' name='reserveID' value='{$row['ReserveID']}'>
                                        <input type='submit' name='cancel' value='Cancel' class='btn btn-danger'>
                                    </form>
                                </td>                                  
                            </tr>";
                    }

                    echo "</tbody></table>";
                } else {
                    echo "<p class='alert alert-info'>No pending reserve requests.</p>";
                }
            } else {
                die("Error in SQL query: " . $conn->error);
            }
            ?>
        </div>
        <form method='post' action='return_details.php'>
            <button type='submit' class='btn btn-warning' name='warning'>View Return Details</button>
        </form>

    </div>
</body>

</html>