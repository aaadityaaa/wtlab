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
    // Handle login logic here
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Verify the username and password (in a real-world scenario, use a more secure method)

    // Set the user as logged in
    $_SESSION['username'] = $username;

    // Increment the active sessions count
    if (!isset($_SESSION['active_sessions'])) {
        $_SESSION['active_sessions'] = 1;
    } else {
        $_SESSION['active_sessions']++;
    }

    header("Location: dashboard.php");
    exit();
} else {
    header("Location: login.php");
    exit();
}
?>
