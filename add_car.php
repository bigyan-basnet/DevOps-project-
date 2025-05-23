<?php

include('server.php');


$con = mysqli_connect('localhost', 'root', '', 'car_rental_database');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
} 

if (isset($_POST['submit'])) {
    $car_my = mysqli_real_escape_string($con, $_POST['car_my']);
    $car_model = mysqli_real_escape_string($con, $_POST['car_model']);
    $car_colour = mysqli_real_escape_string($con, $_POST['car_colour']);
    $rental_price = mysqli_real_escape_string($con, $_POST['rental_price']);
    $booked = false;


    $sql = "INSERT INTO `car` (`car_my`, `car_model`, `car_colour`, `rental_price`) VALUES ('$car_my', '$car_model', '$car_colour', '$rental_price')";

    $rs = mysqli_query($con, $sql);

    if ($rs) {
        echo "Car Record Inserted";
    }
}

?>

<!DOCTYPE html <html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Responsive Registration Form</title>
    <link rel="stylesheet" href="css/add_car.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/add_item.css">
</head>

<body>

    <div class="container">
        <h1>Page to Add New Cars</h1>

        <form action="" method="POST">

            <h2>Enter Car Details</h2>

            <label for="manufacture-year">Car Manufacture Year:</label>
            <input name="car_my" type="text" id="manufacture-year" placeholder="1999">

            <label for="car-model">Car Model:</label>
            <input name="car_model" type="text" id="car-model">

            <label for="car-colour">Car Color:</label>
            <input name="car_colour" type="text" id="car-color">

            <label for="rental-price">Rental Price per Day:</label>
            <input name="rental_price" type="text" id="rental-price">

            <button class="submit-button" type="submit" name="submit" >Submit</button>
        </form>
    </div>

</body>

</html>