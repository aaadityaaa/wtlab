<?php
if (isset($_SESSION['username']) && $_SESSION['active_sessions'] <= 3) {
    header("Location: dashboard.php");
    exit();
}

$username = $_POST['username'];

$_SESSION['username'] = $username;

if (!isset($_SESSION['active_sessions'])) {
    $_SESSION['active_sessions'] = 1;
} else {
    $_SESSION['active_sessions']++;
}

header("Location: dashboard.php");
exit();

?>
