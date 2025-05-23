<?php

// session_start();
include('header.php');

?>

<head>
    <title>cars</title>
    <link rel="stylesheet" href="css/services.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet" />
</head>

<body>


    <div class="main-page">
        <div class="background-image"></div>
        <div class="text-container">
            <?php

            // session_start();
            include('search.php');
            ?>
        </div>
    </div>
    <section class="card-row">
        <?php
        $con = mysqli_connect('localhost', 'root', '', 'car_rental_database');
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $cr = mysqli_query($con, "SELECT * FROM car WHERE ID NOT IN (SELECT DISTINCT car_model FROM booking)") or die(mysqli_error($con));
        while ($row = mysqli_fetch_assoc($cr)) { ?>
            <div class="card">
                <div class="card-container">
                    <div class="photo">
                        <img src="css/images/car-2.jpg" />
                    </div>
                    <div class="description">

                        <h2><?php echo $row['car_model'] ?></h2>
                        <p>Manufacture Date: <?php echo $row['car_my'] ?></p>
                        <p>Car Colour: <?php echo $row['car_colour'] ?></p>
                        <p>Rent per day: <?php echo $row['rental_price'] ?></p>
                        <button class="book-btn"><a href="book.php?book=<?php echo $row['ID'] ?>">Book Now</a></button>
                    </div>
                </div>
            </div>
        <?php } ?>
    </section>


</body>