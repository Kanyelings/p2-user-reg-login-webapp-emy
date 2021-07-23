
<?php

$conn = mysqli_connect("localhost","Emy2", "root", "Project2");//connect to database
//checks connection
if(mysqli_connect_error()) {
    echo 'Failed to connect' . mysqli_connect_error();
}


//When form submitted, insert values into database
if(isset($_REQUEST['firstname'])){
    //removes backlashes
    $name = stripslashes($_REQUEST['firstname']);
    $name = mysqli_real_escape_string($conn, $name);
    $lastname = stripslashes($_REQUEST['lastname']);
    $lastname = mysqli_real_escape_string($conn, $lastname);
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($conn, $username);
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($conn, $email);
    $password= stripslashes($_REQUEST['pass']);
    $password = mysqli_real_escape_string($conn, $password);
    $create_datetime = date("Y-m-d H:i:s");
    $query = "INSERT into `users` (firstname, lastname, username, pass, email, create_datetime)
VALUES ('$name', '$lastname', '$username',  '$email','" .md5($password)."', '$create_datetime')";
    $result = mysqli_query($conn, $query);
    if($result){
        $_POST['firstname'] = $_SESSION['firstname'];

        header('Location: Login.php');
    }
    else{
        echo 'Invalid entries';
    }



}


?>



<!Doctype html>
<html>
  <head>
    <title> Registration page</title>
  </head>
    <body>
      <form action="Regitration.php" method="POST">
          <label for="firstname">First name</label>
          <input type="text" id="firstname" name="firstname" placeholder="Enter first name" required>

          <label for="lastname">Last name</label>
          <input type="text" id="lastname" name="lastname" placeholder="Enter last name" required>

          <br><br>

          <label for="username">Username</label>
          <input type="text" id="username" name="username" placeholder="Enter a username" required>

          <br><br>


          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="Enter your email" required>

          <br><br>

          <label for="pass">Password</label>
          <input type="password" id="pass" name="pass" placeholder="Enter a password" required>

          <br><br>

          <label for="sex">Female</label>
          <input type="radio" id="sex" name="sex" placeholder="Male">
          <label for="sex">Male</label>
          <input type="radio" id="sex" name="sex" placeholder="Female">

          <br><br>

          <input type="submit" name="submit" value="Register">


      </form>


    </body>
</html>



