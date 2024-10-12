<?php
session_start();
$host = 'localhost';
$db   = 'latihan';
$user = 'root';
$pass = 'Jkth1l4ng@D26';
$mysqli = new mysqli($host, $user, $pass, $db, 3307);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['user_id'])) {
        header("Location: index.php");
        exit();
    }

    $user_id = $_SESSION['user_id'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $query = "INSERT INTO support_messages (user_id, subject, message) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("iss", $user_id, $subject, $message);

    if ($stmt->execute()) {
        header("Location: home.php?msg=Support message sent");
        exit();
    } else {
        echo "Error: " . $mysqli->error;
    }
}
?>