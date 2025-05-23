<?php
// Include the database connection config
include('config.php');  // Assuming config.php contains the database connection code

// Insert new car record
if (isset($_POST['submit'])) {
    $car_my = mysqli_real_escape_string($con, $_POST['car_my']);
    $car_model = mysqli_real_escape_string($con, $_POST['car_model']);
    $car_colour = mysqli_real_escape_string($con, $_POST['car_colour']);
    $rental_price = mysqli_real_escape_string($con, $_POST['rental_price']);

    // Prepare SQL statement for insertion
    $stmt = $con->prepare("INSERT INTO `car` (`car_my`, `car_model`, `car_colour`, `rental_price`) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $car_my, $car_model, $car_colour, $rental_price);

    // Execute and redirect if successful
    if ($stmt->execute()) {
        header("Location: services.php?msg=Car added successfully");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
}

// Delete a car record
if (isset($_GET['del'])) {
    $id = intval($_GET['del']);
    $stmt = $con->prepare("DELETE FROM car WHERE ID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header('Location: services.php?msg=Car deleted');
    exit;
}

// Edit a car record
if (isset($_GET['edit'])) {
    $id = intval($_GET['edit']);
    $stmt = $con->prepare("SELECT * FROM car WHERE ID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
}

// Update a car record
if (isset($_POST['update'])) {
    $car_my = mysqli_real_escape_string($con, $_POST['car_my']);
    $car_model = mysqli_real_escape_string($con, $_POST['car_model']);
    $car_colour = mysqli_real_escape_string($con, $_POST['car_colour']);
    $rental_price = mysqli_real_escape_string($con, $_POST['rental_price']);
    $id = intval($_POST['edit']);

    // Prepare SQL statement for updating
    $stmt = $con->prepare("UPDATE car SET car_my = ?, car_model = ?, car_colour = ?, rental_price = ? WHERE ID = ?");
    $stmt->bind_param("ssssi", $car_my, $car_model, $car_colour, $rental_price, $id);

    // Execute and redirect if successful
    if ($stmt->execute()) {
        header("Location: car_details.php?msg=Car details updated successfully");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
