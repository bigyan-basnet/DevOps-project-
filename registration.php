<?php
session_start();
require_once 'config.php';

if (isset($_POST['submit'])) {
    $first_name = trim($_POST['first_name']);
    $middle_name = trim($_POST['middle_name']);
    $last_name = trim($_POST['last_name']);
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $is_admin = 0;

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match.');</script>";
        exit();
    }

    // Check if username already exists
    $stmt = $conn->prepare("SELECT username FROM user_registration WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "<script>alert('Username already exists.');</script>";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert new user
        $stmt = $conn->prepare("INSERT INTO user_registration (first_name, middle_name, last_name, username, password, is_admin) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssi", $first_name, $middle_name, $last_name, $username, $hashed_password, $is_admin);

        if ($stmt->execute()) {
            echo "<script>alert('Account created successfully.'); window.location.href='login.php';</script>";
        } else {
            echo "<script>alert('Registration failed.');</script>";
        }
    }
}
?>
