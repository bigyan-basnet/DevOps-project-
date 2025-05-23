<section>
    <link rel="stylesheet" href="css/track.css">
    <div class="card-row">
        <?php
        $con = mysqli_connect('localhost', 'root', '', 'car_rental_database');

        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $cr = mysqli_query($con, "SELECT * FROM booking") or die(mysqli_error($con));

        while ($row = mysqli_fetch_assoc($cr)) {
        ?>
            <div class="card">
                <div class="card-container">
                    <div class="photo">
                        <img src="css/images/car-2.jpg" />
                    </div>
                    <div class="description">
                        <h1><?php echo $row['username'] ?></h1>
                        <h2>Date of rent: <span class="car"><?php echo $row['date'] ?></span></h2>
                        <h2>Number of rental days: <span class="car"><?php echo $row['no_of_days'] ?></span></h2>
                        <h2>Car Model: <span class="car"><?php echo $row['car_model'] ?></span></h2>
                        <h2>Price per day: <span class="car"><?php echo $row['total'] ?></span></h2>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <script src="car.js"></script>
</section>