<?php

session_start();

if (isset($_POST['login'])) {
    $uname = $_POST['username'];

    $password = $_POST['password'];
    $conn = mysqli_connect('localhost', 'root', '', 'car_rental_database');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    //  else {
    //     echo "Connected";
    // }
    if (empty($uname) || empty($password)) {
        echo "you cannot leave username and password empty";
    } else {
        $sql = "SELECT * FROM user_registration WHERE username='$uname' && is_admin = true";
        $result = mysqli_query($conn, $sql);
        $check = mysqli_fetch_assoc($result);

        if ($check['password'] == $password) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $uname;
            header("location:admin_view.php");
        } else {
            $message = "Username or Password incorrect or User is not admin";

            // Output JavaScript code to display the alert
            echo "<script>alert('$message');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<link rel="stylesheet" href="css/login.css">

<head>
    <title>Admin Login</title>
</head>

<body>
    <div class="container">
        <form action="" method="post">
             <div class="title">Admin Login
    </div>


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
    </div>
</body>

</html>