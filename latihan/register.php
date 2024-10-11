<?php
$host = 'localhost';
$db   = 'latihan';
$user = 'root';
$pass = 'Jkth1l4ng@D26';
$mysqli = new mysqli($host, $user, $pass, $db, 3307);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $mysqli->query("SELECT * FROM users WHERE username='$username'");
    if ($result->num_rows > 0) {
        $error = "Username sudah ada. Silakan pilih username lain.";
    } else {
        $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

        $mysqli->query("INSERT INTO users (username, password) VALUES ('$username', '$passwordHashed')");

        header("Location: index.php?register=success");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="POST" action="register.php">
        <h2>Register</h2>
        <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
        <label>Username:</label>
        <input type="text" name="username" required>
        <label>Password:</label>
        <input type="password" name="password" required>
        <button type="submit">Daftar</button>
        <p>Sudah punya akun? <a href="index.php">Login di sini</a></p>
    </form>
</body>
</html>