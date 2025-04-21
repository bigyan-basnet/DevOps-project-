<?php

include('server.php');


$con = mysqli_connect('localhost', 'root', '', 'car_rental_database');

if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
} else {
  echo "Connected";
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
    echo "Contact Records Inserted";
  }
}

$cr = mysqli_query($con, "SELECT * FROM car") or die(mysqli_error($con));
$i = 1;


while ($row = mysqli_fetch_array($cr)) { ?>
  <tr>
    <!-- <td><?php echo $i; ?></td> -->
    <td class="car"><?php echo $row['car_model'] ?> </td>
    <td class="delete">
      <a href="car_details.php?del=<?php echo $row['ID'] ?>">Delete</a>

      <!-- <a href="edit.php?edit=<?php echo $row['ID'] ?>">Edit</a> -->
      <br>

    </td>

  </tr>
<?php $i++;
}




?>









<main>
  <h2>Car details</h2>

  <form action="" id="form1" name="form2" method="POST">
    <table>
      <tr>
        <td>Car Manucature Year:</td>
        <td>
          <label>
            <input name="car_my" type="Date" id="car_my" />
          </label>
        </td>
      </tr>

      <tr>
        <td>Car model</td>
        <td>
          <label>
            <input name="car_model" type="text" id="car_model" />
          </label>
        </td>
      </tr>

      <tr>
        <td>car_colour</td>
        <td>
          <label>
            <input name="car_colour" type="text" id="car_colour" />
          </label>
        </td>
      </tr>

      <tr>
        <td>Rental price per day</td>
        <td>
          <label>
            <input name="rental_price" type="number" id="rental_price" />
          </label>
        </td>
      </tr>

      <tr>
        <td>
          <label>
            <input type="submit" name="submit" id="button" />
          </label>
        </td>
      </tr>


    </table>
  </form>








</main>