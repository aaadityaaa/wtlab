<?php
session_start();

// Set the maximum number of concurrent sessions
$maxConcurrentSessions = 3;

// Function to check and limit the number of concurrent sessions
function checkConcurrentSessions($maxConcurrentSessions) {
    // Initialize session data if not set
    if (!isset($_SESSION['active_sessions'])) {
        $_SESSION['active_sessions'] = [];
    }

    // Remove expired sessions
    foreach ($_SESSION['active_sessions'] as $sessionId => $timestamp) {
        if (time() - $timestamp > 3600) { // Expire sessions after 1 hour
            unset($_SESSION['active_sessions'][$sessionId]);
        }
    }

    // Check the number of active sessions
    if (count($_SESSION['active_sessions']) >= $maxConcurrentSessions) {
        // Too many sessions, destroy the current session
        session_destroy();
        header("Location: login.php?error=toomanyconcurrentsessions");
        exit();
    }

    // Add the current session to the active sessions array
    $_SESSION['active_sessions'][session_id()] = time();
}

// Check and limit concurrent sessions
checkConcurrentSessions($maxConcurrentSessions);

// Your other session-related logic goes here
?>
