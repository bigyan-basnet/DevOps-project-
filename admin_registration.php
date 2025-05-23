<?php



$con = mysqli_connect('localhost', 'root', '', 'car_rental_database');




if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
// else{
// 	echo "Connected";
// }



if (isset($_POST['submit'])) {
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $middle_name = mysqli_real_escape_string($con, $_POST['middle_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $is_admin = true;




    $sql = "SELECT * FROM user_registration WHERE username='$username'";
    $result = mysqli_query($con, $sql);
    $check = mysqli_fetch_assoc($result);


    if ($check && $check['username'] == $username) {
        $message = "Username already exists";

        // Output JavaScript code to display the alert
        echo "<script>alert('$message');</script>";
        // exit();
    } else {



    $sql = "INSERT INTO `user_registration` (`first_name`, `middle_name`, `last_name`, `username`, `password`, `is_admin`) VALUES ('$first_name', '$middle_name', '$last_name', '$username',  '$password','$is_admin')";

    $rs = mysqli_query($con, $sql);


}
}
?>




<!DOCTYPE html>
<html>

<head>
    <title>Responsive Registration Form</title>
    <link rel="stylesheet" href="css/register.css" />
</head>

<body>
    <div class="container">
        <div class="title">Admin User Registration</div>
        <div class="content">
            <form action="#" method="POST">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">First Name</span>
                        <input type="text" name="first_name" placeholder="Mr." required />
                    </div>
                </div>

                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Middle Name</span>
                        <input type="text" name="middle_name" placeholder="" />
                    </div>
                </div>

                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Last Name</span>
                        <input type="text" name="last_name" placeholder="Bean" required />
                    </div>
                </div>

                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Admin Username</span>
                        <input type="text" name="username" placeholder="Enter your username" required />
                    </div>
                </div>

                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" name="password" placeholder="*******" required />
                    </div>
                </div>

                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Confirm Password</span>
                        <input type="password" name="confirm_password" placeholder="Confirm your password" required />
                    </div>
                </div>

                <div class="button">
                    <input type="submit" name="submit" value="Create an account" />
                </div>

                <div class="button">
                    <p>Already have an account?</p>
                    <a href="login.php">Sign in</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>