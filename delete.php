<?php

session_start();


?>

<head>
    <title>cars</title>
    <link rel="stylesheet" href="css/services.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet" />
</head>

<body class="delete_bg">


    <section>
        <div class="card-row">


            <?php

            $con = mysqli_connect('localhost', 'root', '', 'car_rental_database');

            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }
            // else {
            //     echo "Connected";
            // }

            $cr = mysqli_query($con, "SELECT * FROM car") or die(mysqli_error($con));
            $i = 1;


            while ($row = mysqli_fetch_array($cr)) { ?>
                <tr>

                    <div class="card">
                        <div class="card-container">
                            <div class="photo">
                                <img src="css/images/car-2.jpg" />
                            </div>

                            <div class="description">
                                <h1><?php echo $row['car_model'] ?> </h1>
                                <p><?php echo $row['rental_price'] ?> </p>


                                <button onclick="redirectToPage()"><a type="submit" class="hidden" href="car_details.php?del=<?php echo $row['ID'] ?>">Delete</a>
                                </button>


                            </div>
                        </div>

                        </td>
                    </div>

                </tr>



            <?php $i++;
            }

            ?>

        </div>
    </section>
    <script src="css/car.js"></script>
</body>

</html>

<script>
    function redirectToPage() {
        // Redirect the user to another page
        window.location.href = "delete.php";
    }
</script>