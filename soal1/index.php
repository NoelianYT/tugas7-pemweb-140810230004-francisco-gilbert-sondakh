<?php
$cookies_enabled = isset($_COOKIE['username']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php if ($cookies_enabled): ?>
        <p>Selamat datang kembali, <?php echo htmlspecialchars($_COOKIE['username']); ?>!</p>
        <form method="POST" action="delete.php">
            <button type="submit">Hapus Cookie</button>
        </form>
    <?php else: ?>
        <form method="POST" action="create.php">
            <label for="username">Masukkan Nama Anda    : </label>
            <input type="text" name="username" required>
            <button type="submit">Simpan Nama</button>
        </form>
    <?php endif; ?>

    <h2>Apakah cookies diaktifkan?</h2>
    <p><?php echo $cookies_enabled ? 'Cookies diaktifkan.' : 'Cookies tidak diaktifkan.'; ?></p>

    <form method="POST" action="modify.php">
        <label for="new_username">Ganti Nama Anda:</label>
        <input type="text" name="new_username" required>
        <button type="submit">Ganti Nama</button>
    </form>
</body>
</html>