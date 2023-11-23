
<?php
include "db.php";

if (isset ($_GET['book_id']) && isset($_GET['student_id']))
{
    $stuID = $_GET['student_id'];
    $bookID = $_GET['book_id'];
    $statID = 'Pending';

    $query = "INSERT INTO reservetable (ReserveID, StudentID, BookID, Status) VALUES ( NULL, '{$stuID}', '{$bookID}', '{$statID}')";
    $insert_reserve = mysqli_query($conn, $query); 


    if (!$insert_reserve){
        echo "Something went wrong". mysqli_connect_error();
    }
    else {
        echo "<script type = 'text/javascript'>alert('Book Reserved Successfully!'); window.location.href = 'home.php';</script>";
    }
}

if (isset ($_GET['reserve_id']) && isset($_GET['reserve_stat']))
{
    $reserveId = $_GET['reserve_id'];
    $reserveStat = $_GET['reserve_stat'];

    if ($reserveStat == "Pending") {

$sql = "DELETE FROM reservetable WHERE reserveID = '{$reserveId}'";

// execute the query
if (mysqli_query($conn, $sql)) {
  echo "<script type = 'text/javascript'>alert('Record deleted successfully !'); window.location.href = 'home.php';</script>";
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}
}
}
?>