<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}

// Check if the maximum number of sessions is reached
if (isset($_SESSION['active_sessions']) && $_SESSION['active_sessions'] >= 3) {
    echo "Maximum concurrent sessions reached. You cannot log in from another place.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle login logic on the separate process_login.php page
    header("Location: process_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="post" action="process_login.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
