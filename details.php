<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<!-- <link rel="stylesheet" href="css/"> -->
<body>

<?php

$con = mysqli_connect('localhost', 'root', '', 'car_rental_database');

$cr = mysqli_query($con, "SELECT * FROM car") or die( mysqli_error($con)) ;
$i=1; 

while ($row=mysqli_fetch_array($cr)){ ?>
                            <tr>
                                <!-- <td><?php echo $i; ?></td> -->
                                <td class="car"><?php echo $row['car_model'] ?> </td>
                                <td class="car"><?php echo $row['car_my'] ?> </td>
                                <td class="car"><?php echo $row['car_colour'] ?> </td>
                                <td class="car"><?php echo $row['rental_price'] ?> </td>

                                <td class="details">
                                    <!-- <a href="car_details.php?del=<?php echo $row['ID'] ?>">Delete</a> -->

                                    <!-- <a href="edit.php?edit=<?php echo $row['ID'] ?>">Edit</a> -->
                                    <br>
                                  
                                </td>

                            </tr>
<?php $i++; }


?>

</body>
</html>