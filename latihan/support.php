<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Support</h2>
    <form method="POST" action="support_process.php">
        <label for="subject">Subject:</label>
        <input type="text" name="subject" required><br>
        <label for="message">Message:</label>
        <textarea name="message" required></textarea><br>
        <button type="submit">Send Message</button>
    </form>
    <a href="home.php">Back to Home</a>
</body>
</html>