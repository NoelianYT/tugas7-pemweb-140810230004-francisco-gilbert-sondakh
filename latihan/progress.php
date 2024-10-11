<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

require 'config.php';

$user_id = $_SESSION['user_id'];

$query = "SELECT c.course_name, e.progress FROM course_enrollments e 
          JOIN courses c ON e.course_id = c.id 
          WHERE e.user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progress | Lihatlah Progressmu selama di EducAchieve</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Progress Kursusmu</h2>
    <table>
        <thead>
            <tr>
                <th>Nama Kursus</th>
                <th>Progress (%)</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['course_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['progress']); ?>%</td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <a href="home.php">Back to Home</a>
</body>
</html>