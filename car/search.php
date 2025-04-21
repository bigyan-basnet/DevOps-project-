<?php

// $con = mysqli_connect('localhost', 'root', '','car_rental_database');

$host = 'localhost';
$dbname = 'car_rental_database';
$username = 'root';
$password = '';

$con = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);


$searchErr = '';
$car_detail = '';

if (isset($_POST['save'])) {
    if (!empty($_POST['search'])) {
        $search = $_POST['search'];

        $stmt = $con->prepare("SELECT * FROM car WHERE car_model LIKE '%$search%' OR car_colour LIKE '%$search%'");
        $stmt->execute();
        $car_detail = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $searchErr = "Please enter the information";
    }
}




?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">

        <input type="text" name="search" id="">

        <button onclick="showDiv()" type="submit" id="cl" name="save">submit</button>

        <span class="error" style="color:red;">* <?php echo $searchErr; ?></span>

        <span class="search_result">

            <h2>Search Result</h2>

            <table>

                <thead>
                    <tr>
                        <th>Car Manufacture Year</th>
                        <th>Car Model</th>
                        <th>Car Colour</th>
                        <th>Rental Price PEr day</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php

                    if (!$car_detail) {
                        echo '<tr> No data found </tr>';
                    } else {
                        foreach ($car_detail as $key => $value) {
                    ?>
                            <tr>
                                <td><?php echo $value['car_my']; ?></td>
                                <td><?php echo $value['car_model']; ?></td>
                                <td><?php echo $value['car_colour']; ?></td>
                                <td><?php echo $value['rental_price']; ?></td>
                            </tr>
                    <?php
                        }
                    }


                    ?>
                </tbody>

            </table>
        </span>
    </form>
</body>

</html>
<!-- 
<style>
    .search_result {
        display: none;
    }
</style>

<script>
    function showDiv() {
        var div = document.getElementById("search_result");
        div.style.display = "block";
        
    }
</script> -->