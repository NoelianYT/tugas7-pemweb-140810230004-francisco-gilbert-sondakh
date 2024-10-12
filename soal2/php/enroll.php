<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$host = 'localhost';
$db = 'latihan';
$user = 'root';
$pass = 'Jkth1l4ng@D26';
$mysqli = new mysqli($host, $user, $pass, $db, 3307);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (!isset($_GET['course_id'])) {
    die("Course ID is required.");
}

$course_id = $_GET['course_id'];
$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM course_enrollments WHERE user_id = ? AND course_id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("ii", $user_id, $course_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "You are already enrolled in this course.";
} else {
    $query = "INSERT INTO course_enrollments (user_id, course_id) VALUES (?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ii", $user_id, $course_id);

    if ($stmt->execute()) {
        echo "Successfully enrolled in the course!";
    } else {
        echo "Error: " . $mysqli->error;
    }
}

$stmt->close();
$mysqli->close();
?>
<a href="courses.php">Back to Courses</a>