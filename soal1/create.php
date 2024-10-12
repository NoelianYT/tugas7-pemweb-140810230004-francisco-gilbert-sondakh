<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    setcookie('username', $username, time() + 3600, '/');
    header("Location: index.php");
    exit();
}
?>