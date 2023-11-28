<?php
session_start();

// Database connection details
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "session_tracking";

// Set the maximum number of concurrent sessions
$maxConcurrentSessions = 3;

// Function to check and limit the number of concurrent sessions
function checkConcurrentSessions($maxConcurrentSessions) {
    global $servername, $username, $password, $dbname;

    // Create database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Remove expired sessions
    $sql = "DELETE FROM active_sessions WHERE timestamp < NOW() - INTERVAL 1 HOUR";
    $conn->query($sql);

    // Check the number of active sessions for the user
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT COUNT(*) AS session_count FROM active_sessions WHERE user_id = $user_id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $sessionCount = $row['session_count'];

        if ($sessionCount >= $maxConcurrentSessions) {
            // Too many sessions, destroy the current session
            session_destroy();
            header("Location: login.php?error=toomanyconcurrentsessions");
            exit();
        }

        // Add the current session to the active sessions table
        $session_id = session_id();
        $sql = "INSERT INTO active_sessions (user_id, session_id) VALUES ($user_id, '$session_id')";
        $conn->query($sql);
    }

    // Close the database connection
    $conn->close();
}

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Check and limit concurrent sessions
checkConcurrentSessions($maxConcurrentSessions);

// Your other session-related logic goes here
?>
