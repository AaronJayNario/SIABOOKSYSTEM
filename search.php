<?php
// Change your existing query to this
$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';
$query = "SELECT * FROM booktable 
          WHERE BookNames LIKE '%$search%' 
             OR Description LIKE '%$search%' 
             OR Author LIKE '%$search%' 
             OR Category LIKE '%$search%' 
             OR ISBN LIKE '%$search%'";
$view_book = mysqli_query($conn, $query);
?>