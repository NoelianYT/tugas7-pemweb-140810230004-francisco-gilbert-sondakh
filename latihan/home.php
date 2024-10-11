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
    <title>EducAchieve Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Welcome to EducAchieve, <?php echo $_SESSION['username']; ?>!</h1>
        <nav>
            <ul>
                <li><a href="courses.php">Courses</a></li>
                <li><a href="progress.php">Progress</a></li>
                <li><a href="support.php">Support</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <h2>Your Dashboard</h2>
            <p>Welcome back to your learning dashboard, <?php echo $_SESSION['username']; ?>. You can check your courses, track your learning progress, and access support anytime!</p>
        </section>
        <section>
            <h3>Recommended Courses</h3>
            <ul>
                <li><a href="#">Intro to Web Development</a></li>
                <li><a href="#">Advanced PHP Programming</a></li>
                <li><a href="#">JavaScript for Beginners</a></li>
            </ul>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 EducAchieve. All Rights Reserved.</p>
    </footer>
</body>
</html>