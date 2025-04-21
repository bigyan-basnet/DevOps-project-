<?php



$con = mysqli_connect('localhost', 'root', '', 'car_rental_database');




if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
// else{
// 	echo "Connected";
// }



if (isset($_POST['submit'])) {

    $total = mysqli_real_escape_string($con, $_POST['total']);
    $no_of_days = mysqli_real_escape_string($con, $_POST['no_of_days']);
    $car_model = mysqli_real_escape_string($con, $_POST['car_model']);



    session_start();



    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
        $username = $_SESSION['username'];
    }





    $sql = "INSERT INTO `booking` (`total`, `username`, `car_model`, `no_of_days`) VALUES ('$total',  '$username', '$car_model', '$no_of_days')";

    $rs = mysqli_query($con, $sql);

    if ($rs) {
        echo "Contact Records Inserted";
    } else {
        echo "failed";
    }
}

?>




<?php
// Assuming you have a database connection established
// Query to retrieve the list of users
$query = "SELECT id, username FROM user_registration";
$query2 = "SELECT id, car_model FROM car";



$result = mysqli_query($con, $query);
$result2 = mysqli_query($con, $query2);


// Store the list of users in an array
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
$cars = mysqli_fetch_all($result2, MYSQLI_ASSOC);

?>




<!DOCTYPE html>
<html>

<head>
    <title>Responsive Registration Form</title>
    <link rel="stylesheet" href="css/register.css" />
</head>

<body>
    <div class="container">
        <div class="title">Book</div>
        <div class="content">
            <form action="" method="POST">



                <div class="user-details">
                    <div class="input-box">
                        <span id="no_days" class="details">Number of days</span>
                        <input type="text" name="no_of_days" onchange="calculateTotal()" step="1" min="0" placeholder="" required />
                    </div>
                </div>

                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Total</span>
                        <input type="text" name="total" id="total" placeholder="$500" required />
                    </div>
                </div>


                <!-- <label for="user">Select User:</label>
                <select name="user" id="user">
                    <?php foreach ($users as $user) : ?>
                        <option value="<?php echo $user['id']; ?>"><?php echo $user['username']; ?></option>
                    <?php endforeach; ?>
                </select> -->



                <label for="car_model">Select Model:</label>
                <select name="car_model" id="user">
                    <?php foreach ($cars as $car) : ?>
                        <option value="<?php echo $car['id']; ?>"><?php echo $car['car_model']; ?></option>
                    <?php endforeach; ?>
                </select>


                <div class=" button">
                    <input type="submit" name="submit" value="Get my Car">
                </div>


            </form>
        </div>
    </div>
    <script src="css/book.js"></script>
</body>

</html>