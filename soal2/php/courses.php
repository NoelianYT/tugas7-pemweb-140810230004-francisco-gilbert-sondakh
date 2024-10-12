<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$host = 'localhost';
$db   = 'latihan';
$user = 'root';
$pass = 'Jkth1l4ng@D26';
$mysqli = new mysqli($host, $user, $pass, $db, 3307);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$query = "SELECT * FROM courses";
$result = $mysqli->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kursus | Mari Belajar di EducAchieve</title>
    <link rel="stylesheet" href="../css/courses.css">
</head>
<body>
    <h2>Available Courses</h2>
    <table>
        <thead>
            <tr>
                <th>Nama Kursus</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['course_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['course_description']); ?></td>
                    <td>
                        <a href="enroll.php?course_id=<?php echo $row['id']; ?>">Enroll</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <a href="home.php">Back to Home</a>
</body>
</html>