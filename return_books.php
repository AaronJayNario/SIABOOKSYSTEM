<?php
include "db.php"; // Assuming this file contains your database connection code

if (isset($_POST['return_books'])) {
    $reserve_id = $_POST['reserve_id'];

    // Update the status to "Returned" in your reservetable
    $updateStatusQuery = "UPDATE reservetable SET Status = 'Returned' WHERE ReserveID = $reserve_id";
    $conn->query($updateStatusQuery);

    // Insert a record into your returntable with the relevant information
    $insertReturnQuery = "INSERT INTO returntable (ReserveID, DateReserve, DateReturn, Status)
                         SELECT ReserveID, DateReserve, NOW() AS DateReturn, 'Returned' AS Status
                         FROM reservetable
                         WHERE ReserveID = $reserve_id";
    $conn->query($insertReturnQuery);
}

// Redirect back to the page where the button was clicked
header("Location: your_page.php");
exit();
?>
