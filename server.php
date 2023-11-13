<?php include "db.php";


session_start();

if (isset($_POST['loginCheck'])) {
   
    $sr = $_POST['srcode'];
    $pass = $_POST['password'];
    
    $query = "SELECT * FROM `student table` WHERE `SR-Code` = '{$sr}'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['StudentID'] = $row['StudentID'];
        $_SESSION['SR-Code'] = $row['SR-Code'];
        $_SESSION['Name'] = $row['StudentName'];
        $_SESSION['year'] = $row['Year & Section'];
        $_SESSION['department'] = $row['Department'];
        $srd = $row['SR-Code'];
       
    } 
   

    $query = "SELECT * FROM `logintable` WHERE `Password` = '{$pass}'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $passd = $row['Password'];
    } 



    if (empty($pass) || empty($sr)) {
        echo "<script type='text/javascript'>alert('Please enter your username and password.'); window.location.href = 'login.php';</script>";
    } else {
        if ($pass == $passd && $sr == $srd) {
            echo "<script type='text/javascript'>alert('Login successful!'); window.location.href = 'home.php';</script>";
        } else {
            echo "<script type='text/javascript'>alert('Incorrect sr-code or password.'); window.location.href = 'login.php';</script>";
        }
    }

    // Close the database connection
    mysqli_close($conn);
}
?>