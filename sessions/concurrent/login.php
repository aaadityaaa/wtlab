<?php
session_start();

// Your login logic goes here

// Example: If login is successful, set the user_id in the session
$_SESSION['user_id'] = 1; // Replace with your actual user ID

// Redirect to session.php
header("Location: session.php");
exit();
?>


<!-- CREATE DATABASE IF NOT EXISTS session_tracking;

USE session_tracking;

CREATE TABLE IF NOT EXISTS active_sessions (
    user_id INT NOT NULL,
    session_id VARCHAR(255) PRIMARY KEY,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
); -->
