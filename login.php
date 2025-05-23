<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>


<?php
// Secure session initialization
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1); // Use HTTPS only!
ini_set('session.use_strict_mode', 1);
session_start();

require_once 'config.php';

// Set security headers
header("Content-Security-Policy: default-src 'self'");
header("X-Content-Type-Options: nosniff");
header("X-Frame-Options: DENY");

if (isset($_POST['login'])) {
    $uname = trim($_POST['username']);
    $password = $_POST['password'];

    if (empty($uname) || empty($password)) {
        echo "<script>alert('Username and password cannot be empty.');</script>";
    } else {
        $stmt = $conn->prepare("SELECT * FROM user_registration WHERE username = ?");
        $stmt->bind_param("s", $uname);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $uname;
            header("Location: index.php");
            exit();
        } else {
            echo "<script>alert('Invalid username or password.');</script>";
        }
    }
}
?>
