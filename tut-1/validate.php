<?php
$ipusername = $_POST['username'];
$ippassword = $_POST['password'];

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT tut.password FROM tut WHERE tut.username = '$ipusername';";

$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
// $length = count($row);
// echo $length;

if (password_verify($ippassword, $row[0])) {
    echo "login succesfull";
}
else
{
    echo "invalid login credentials";
}
?>