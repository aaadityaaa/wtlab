<?php
session_start();
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset = 'UTF-8'>
    <title>Electricity Bill</title>
</head>
<body>
    <h1>Welcome to bill calculator</h1>
    <form action="calculate.php" method="post">
        <label for="name">Enter Name:</label>
        <input type='text' id='name' name='name' value='name'><br>
        <label for='watt'>No of watts consumed:</label>
        <input type="text" id='watt' name='watt' value='units'><br>
        <input type="submit" value='Submit'>
    </form>

</body>
