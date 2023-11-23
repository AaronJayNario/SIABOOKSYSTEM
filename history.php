<?php
include "db.php";
function getTransactionHistory() {
    global $conn;

    $query = "SELECT rh.ReserveID, rh.StudentID, rh.BookID, rh.DateReserve, rh.DateReturn, rh.Status,
                     r.StudentID AS ReserveStudentID, b.BookNames, s.StudentName
              FROM reservehistorytable rh
              INNER JOIN reservetable r ON rh.ReserveID = r.ReserveID
              INNER JOIN booktable b ON rh.BookID = b.BookID
              INNER JOIN studenttable s ON rh.StudentID = s.StudentID
              ORDER BY rh.DateReserve DESC";  // You can adjust the ORDER BY clause as needed

    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Reserve ID: " . $row['ReserveID'] . "<br>";
            echo "Student ID: " . $row['StudentID'] . "<br>";
            echo "Book ID: " . $row['BookID'] . "<br>";
            echo "Student Name: " . $row['StudentName'] . "<br>";
            echo "Book Name: " . $row['BookNames'] . "<br>";
            echo "Date Reserve: " . $row['DateReserve'] . "<br>";
            echo "Date Return: " . $row['DateReturn'] . "<br>";
            echo "Status: " . $row['Status'] . "<br>";
            echo "----------------<br>";
        }
    } else {
        echo "No transaction history found.";
    }
}

// Call the function to display the transaction history
getTransactionHistory();

?>
