<?php
session_start();
 
if (!isset($_SESSION['xyz'])) {
    header('location: login.html');
    exit();
}
 
if (isset($_SESSION['registered_user']['username'])) {
    $username = $_SESSION['registered_user']['username'];
} else if (isset($_SESSION['xyz_username'])) {
    $username = $_SESSION['xyz_username'];
} else {
    $username = "Guest";
}
?>
 
<html>
<head>
    <title>Home Page</title>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($username); ?>!</h1>
    <p>This is your profile page.</p>
 
    <a href="logout.php">Logout</a>
</body>
</html>