<?php
include "db.php";
include "server.php";
$srcodE = $_SESSION['SR-Code'];
$sNamE = $_SESSION['Name'];
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

    <img src="img/Batangas_State_Logo.png">

    <p><strong>Welcome </strong> <?php echo "$sNamE !<br>"?>
<strong>Sr-Code: </strong><?php echo $srcodE ?></p>

    <a class="logoutBtn" href="login.php">
      <img src="img/cics_logo.jpg">
      <div class="logoutC">LOGOUT</div>
    </a>

  </div>

  <img class="background" src="img/bsu_pic">


  <div class="midContainer">
    <div class="bookContainer">

    <div class="bookNav">
  <form>
    <input type="text" placeholder="Search books..." class="search-input">
    <button type="button" class="search-button"onclick="toggleDropdown()">Search</button>
      <div class="extra-buttons">
      <button type="submit" class="book-button">Book</button>
        <button type="submit" class="description-button">Description</button>
        <button type="submit" class="author-button">Author</button>
        <button type="submit" class="category-button">Category</button>
      </div>
  </form>

<script>
 function toggleDropdown() {
  var dropdown = document.querySelector('.extra-buttons');
  dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
}
 </script>


</div>

      <table class="table  h6 table-bordered table-striped table-bordered table-hover mx-auto" style="width: 900px; ">
        <thead class="table-dark text-white">
          <tr>
            <th scope="col">Book Names</th>
            <th scope="col">Description</th>
            <th scope="col">Author</th>
            <th scope="col">Category</th>
            <th scope="col" colspan="3" class="text-center"></th>
          </tr>
        </thead>
        <tbody>
          <tr>

            <?php

            $studID = $_SESSION['StudentID'];

            $query = "SELECT * FROM booktable WHERE NOT EXISTS (SELECT * FROM reservetable WHERE booktable.BookID = reservetable.BookID)";
            $view_book = mysqli_query($conn, $query); //sending the query to the database
            
            //displaying all the data retrieved from database using while loop
            while ($row = mysqli_fetch_assoc($view_book)) {
              $bookId = $row['BookID'];
              $bookName = $row['BookNames'];
              $bookDes = $row['Description'];
              $bookAut = $row['Author'];
              $bookCat = $row['Category'];
              $bookISBN = $row['ISBN'];



              echo "<tr>";
              echo "<th scope='row'>{$bookName}</th>";
              echo "<td> {$bookDes} </td>";
              echo "<td> {$bookAut} </td>";
              echo "<td> {$bookCat} </td>";

              echo "<td class = 'text-center'> <a href='reserve.php?book_id={$bookId}&student_id={$studID}' class='btn btn-success'> RESERVE </a></td>";

              echo "</tr>";
            }

            ?>
          </tr>
        </tbody>
      </table>
    </div>



    <div class="reserveContainer">


    
      <table class="table h6 table-bordered table-striped table-bordered table-hover mx-auto" style="width: 300px; ">
        <thead class="table-dark text-white">
          <tr>
            <th scope="col">Book Name</th>
            <th scope="col">Status</th>
            <th scope="col" colspan="0" class="text-center"></th>
          </tr>
        </thead>
        <tbody>
          <tr>

            <?php

            $query = "SELECT * FROM reservetable";
            $view_book = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($view_book)) {
              $reserveId = $row['ReserveID'];
              $reserveStuId = $row['StudentID'];
              $reserveBookId = $row['BookID'];
              $reserveStat = $row['Status'];

              $query = "SELECT * FROM booktable WHERE BookId = $reserveBookId";
              $search_book = mysqli_query($conn, $query);

              while ($row = mysqli_fetch_assoc($search_book)) {
                // $bookId = $row['BookID'];
                $bookName = $row['BookNames'];
                // $bookDes = $row['Description'];
                // $bookAut = $row['Author'];
                //  $bookCat = $row['Category'];
                // $bookISBN = $row['ISBN'];
            
              }

              if ($reserveStuId == $studID) {
                echo "<tr>";
                echo "<th scope='row'>{$bookName}</th>";
                echo "<td> {$reserveStat} </td>";

                echo "<td class = 'text-center'> <a href='reserve.php?reserve_id={$reserveId}&reserve_stat={$reserveStat}' class='btn btn-danger'> Cancel </a></td>";

                echo "</tr>";
              }

            }

            ?>

          </tr>
        </tbody>
      </table>

    </div>
  </div>
</body>

</html>