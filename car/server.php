<?php
$con = mysqli_connect('localhost', 'root', '','car_rental_database');

if (isset($_POST['submit'])) {
    $car_my = mysqli_real_escape_string($con, $_POST['car_my']);
    $car_model = mysqli_real_escape_string($con, $_POST['car_model']);
    $car_colour = mysqli_real_escape_string($con, $_POST['car_colour']);
	$rental_price = mysqli_real_escape_string($con, $_POST['rental_price']);
    $booked = false;


    $sql = "INSERT INTO `car` (`car_my`, `car_model`, `car_colour`, `rental_price`) VALUES ('$car_my', '$car_model', '$car_colour', '$rental_price')";

    }
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($con, "DELETE FROM car WHERE ID=$id");
        header('location: services.php');
    }
    if (isset($_GET['edit'])){
        $id = $_GET['edit'];
        $result=mysqli_query($con, "SELECT * FROM car WHERE ID=$id") or die("Error: " . mysqli_error($con));
        $row=mysqli_fetch_assoc($result);
    }
    // if(isset($_GET['update'])) {

      
    //     // $car_my = $_GET['car_my'];
    //     // $car_model = $_GET['car_model'];
    //     // $car_colour = $_GET['car_colour'];
    //     // $rental_price = $_GET['rental_price'];
    //     // $id = $_GET['edit'];

        
    //     // mysqli_query($con, "UPDATE car SET car_my='$car_my', car_model='$car_model', car_colour='$car_colour', rental_price='$rental_price' WHERE ID=$id");

  
    //     $car_my = $_POST['car_my'];
    //     $id = $_POST['edit'];
    //     mysqli_query($con, "UPDATE car SET car_my='$car_my' WHERE ID=$id");
    //     header('LOCATION: car_details.php');
    
    // }




//     if (isset($_POST['update'])) {
//     // $id = mysqli_real_escape_string($con, $_POST['ID']);  
//     $car_my = mysqli_real_escape_string($con, $_POST['car_my']);
//     $car_model = mysqli_real_escape_string($con, $_POST['car_model']);
//     $car_colour = mysqli_real_escape_string($con, $_POST['car_colour']);
//     $rental_price = mysqli_real_escape_string($con, $_POST['rental_price']);
          
//     $id = $_POST['edit'];

//     // Update the desired fields in the UPDATE query
//     mysqli_query($con, "UPDATE car SET car_my='$car_my', car_model='$car_model', car_colour='$car_colour', rental_price='$rental_price' WHERE ID=$id");
//     header('LOCATION: car_details.php');
// }
?>