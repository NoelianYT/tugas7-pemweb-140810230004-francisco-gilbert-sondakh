<?php
$host = 'localhost';
$db   = 'latihan';
$user = 'root';
$pass = 'Jkth1l4ng@D26';
$mysqli = new mysqli($host, $user, $pass, $db, 3307);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $role = 'user';
    $created_at = date('Y-m-d H:i:s');

    $result = $mysqli->query("SELECT * FROM users WHERE username='$username' OR email='$email'");
    if ($result->num_rows > 0) {
        $error = "Username atau email sudah ada. Silakan pilih username/email lain.";
    } else {
        $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $mysqli->prepare("INSERT INTO users (username, password, email, fullname, role, created_at) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $username, $passwordHashed, $email, $fullname, $role, $created_at);
        $stmt->execute();

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
    <link rel="stylesheet" href="../css/register.css">
</head>
<body>
    <form method="POST" action="register.php">
        <h2>Register</h2>
        <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
        
        <label>Username:</label>
        <input type="text" name="username" required>
        
        <label>Password:</label>
        <input type="password" name="password" required>
        
        <label>Email:</label>
        <input type="email" name="email" required>
        
        <label>Full Name:</label>
        <input type="text" name="fullname" required>

        <button type="submit">Daftar</button>
        
        <p>Sudah punya akun? <a href="index.php">Login di sini</a></p>
    </form>
</body>
</html>