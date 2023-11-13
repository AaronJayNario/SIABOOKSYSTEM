
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
        echo "<script type = 'text/javascript'>alert('User added successfully!'); window.location.href = 'home.php';</script>";
    }
}
?>