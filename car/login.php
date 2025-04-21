<?php
session_start();

if (isset($_POST['login'])) {
  $uname = $_POST['username'];
  $password = $_POST['password'];
  $conn = mysqli_connect('localhost', 'root', '', 'car_rental_database');

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  if (empty($uname) || empty($password)) {
    echo "You cannot leave the username and password empty";
  } else {
    $sql = "SELECT * FROM user_registration WHERE username='$uname'";
    $result = mysqli_query($conn, $sql);
    $check = mysqli_fetch_assoc($result);

    if ($check && $check['password'] == $password) {
      $_SESSION['logged_in'] = true;
      $_SESSION['username'] = $uname;
      header("location: index.php");
      exit();
    } else {
      $message = "Username or Password incorrect";

      // Output JavaScript code to display the alert
      echo "<script>alert('$message');</script>";
    }
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Responsive Login Form</title>
  <link rel="stylesheet" href="css/login.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
  <div class="container">
    <form action="#" method="POST">
      <div class="title">Login</div>
      <div class="input-box underline">
        <input type="text" name="username" placeholder="Enter Your Username" required />
        <div class="underline"></div>
      </div>
      <div class="input-box">
        <input type="password" name="password" placeholder="Enter Your Password" required />
        <div class="underline"></div>
      </div>
      <div class="input-box button">
        <input type="submit" name="login" value="Sign In" />
      </div>
    </form>
    <div class="admin-login">
      <a href="admin_login.php">Login as admin</a>
    </div>
  
<hr>
    <div class="register">
      <a href="registration.php">Create a new account</a>
    </div>
  </div>
</body>

</html>