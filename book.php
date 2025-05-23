<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    die("You must be logged in to book a car.");
}

if (isset($_POST['submit'])) {
    $total = $_POST['total'];
    $no_of_days = $_POST['no_of_days'];
    $car_id = $_POST['car_id'];
    $username = $_SESSION['username'];

    // Validate inputs
    if (!is_numeric($total) || !is_numeric($no_of_days) || !is_numeric($car_id)) {
        die("Invalid input.");
    }

    // Use prepared statement for safe insertion
    $stmt = $conn->prepare("INSERT INTO booking (total, username, car_id, no_of_days) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("dsii", $total, $username, $car_id, $no_of_days);
    if ($stmt->execute()) {
        echo "<script>alert('Booking successful!');</script>";
    } else {
        echo "<script>alert('Booking failed.');</script>";
    }
}

// Fetch car list
$cars = [];
$query2 = "SELECT ID, car_model FROM car";
$result2 = $conn->query($query2);
if ($result2) {
    $cars = $result2->fetch_all(MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book a Car</title>
    <link rel="stylesheet" href="css/register.css" />
</head>
<body>
    <div class="container">
        <div class="title">Book</div>
        <div class="content">
            <form action="" method="POST">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Number of days</span>
                        <input type="number" name="no_of_days" min="1" onchange="calculateTotal()" required />
                    </div>
                    <div class="input-box">
                        <span class="details">Total</span>
                        <input type="number" step="0.01" name="total" id="total" required />
                    </div>
                    <div class="input-box">
                        <label for="car_id">Select Car Model:</label>
                        <select name="car_id" required>
                            <?php foreach ($cars as $car): ?>
                                <option value="<?= $car['ID']; ?>"><?= htmlspecialchars($car['car_model']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="button">
                    <input type="submit" name="submit" value="Get my Car">
                </div>
            </form>
        </div>
    </div>
    <script src="css/book.js"></script>
</body>
</html>
