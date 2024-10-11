<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $query = "INSERT INTO support_messages (user_id, subject, message) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iss", $user_id, $subject, $message);

    if ($stmt->execute()) {
        header("Location: home.php?msg=Support message sent");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>