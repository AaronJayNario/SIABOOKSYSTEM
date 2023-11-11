<?php include "db.php" ?>

<?php
if (isset($_POST['loginCheck'])) {
    // Get user input
    $sr = $_POST['srcode'];
    $pass = $_POST['password'];

    // SQL query to check if the provided username and password match in the database
    $query = "SELECT * FROM student table WHERE SR-Code = '{$sr}'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $srd = $row['SR-Code'];
    } 

    $passd = "";

    $query = "SELECT * FROM logintable WHERE Password = '{$pass}'";
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
            echo "<script type='text/javascript'>alert('Incorrect username or password.'); window.location.href = 'login.php';</script>";
        }
    }

    // Close the database connection
    mysqli_close($conn);
}
?>