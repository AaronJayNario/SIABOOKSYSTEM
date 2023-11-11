<?php include "db.php" ?>
<link rel="stylesheet" type = "text/css" href = "style.css">
<link href="design/login_style.css" rel="stylesheet">

<?php
if (isset ($_POST['create']))
{
    $user = $_POST['UserName'];
    $email = $_POST['Email'];
    $pass = $_POST['Password'];

    //sql query insert user data into users table
    $query = "INSERT INTO logintable (UserID, UserName, Email, Password) VALUES (NULL, '{$user}', '{$email}', '{$pass}')";
     //send data to database 
     $add_user = mysqli_query($conn, $query);
    //display message if not excecuted properly
}
?>

<!--body -->
<header>
        <img src="open-book-icon.png">
        <h1>BOOK RESERVATION SYSTEM</h1>
    </header>
<div class = "login-container">
<form id="login-form" action="" method="post">
    <div class="login-form">
        <label for="UserName" class="form-label">Username</label>
        <input type="text" class="form-control" name = "UserName">
    </div>

    <div class="form-group">
        <label for="Email" class="form-label">Email</label>
        <input type="email" class="form-control" name = "Email">
    </div>

    <div class="form-group">
        <label for="Password" class="form-label">Password</label>
        <input type="password" class="form-control" name = "Password">
    </div>

    <div class = "container text-center mt-5">
     <input type="submit" name ="create" class="btn btn-primary mt-2" value=SUBMIT>
     <a href="login.php">Back</a>
    </div>

    <!--back but homepage-->
    
</form>
</div>



