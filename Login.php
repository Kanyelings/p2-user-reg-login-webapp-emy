<?php

$conn = mysqli_connect("localhost","Emy2", "root", "Project2");//connect to database
//checks connection
if(mysqli_connect_error()) {
    echo 'Failed to connect' . mysqli_connect_error();
}

session_start();
//When form is submitted

if(isset($_POST['username'])){
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($conn, $username);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($conn, $password);
    //checks if user exists in the database
    $query = "SELECT * FROM `users` WHERE username = '$username' AND password = '$password)' ";
    $result = mysqli_query($conn, $query) or die(mysqli_error());
    $rows = mysqli_num_rows($result);
    if ($rows = 1) {
        $_SESSION['username'] = $_POST['username'];
        //redirects to a dashboard
        header('Location: dashboard.php');
    }
    else {
        echo 'Check all possible empty fields';
    }

}


?>


<!Doctype html>

<html>
  <head>
    <title>Login</title>
      <body>
        <form action="Login.php" method="POST">

            <label for="username">Username</label>
            <input type="type" id="username" name="username" placeholder="Enter username" required>

            <br><br>


            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter password" required>

            <br><br>

            <input type="submit" name="submit" value="Log In">






        </form>

      </body>
  </head>
</html>
