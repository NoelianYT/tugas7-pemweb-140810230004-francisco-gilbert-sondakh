<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_username = $_POST['new_username'];
    setcookie('username', $new_username, time() + 3600, '/');
    header("Location: index.php");
    exit();
}
?>