<?php
session_start();

if (isset($_SESSION['username']) && $_SESSION['active_sessions'] <= 3) {
    header("Location: dashboard.php");
    exit();
}

// Check if the maximum number of sessions is reached
// if (isset($_SESSION['active_sessions']) && $_SESSION['active_sessions'] >= 3) {
//     echo "Maximum concurrent sessions reached. You cannot log in from another place.";
//     exit();
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>this is html</h1>
    <form action="calculate.php" method="post">
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

<?php

?>