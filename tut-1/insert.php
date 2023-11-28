<?php
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$ipusername = $_POST['username'];

$ippassword = crypt($_POST['password'], PASSWORD_BCRYPT);

//mysql server specification variables
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "test";

//create a connection to the database.
$conn = new mysqli($servername, $username, $password, $dbname);

//Exception handling
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO tut (fname, lname, email, phone, username, password)
        VALUES ('$fname', '$lname', '$email', '$phone', '$ipusername', '$ippassword')";

if ($conn->query($sql) === TRUE) {
    echo "Hi, ".$fname." ".$lname; 
    echo "<br>";
    echo "Your data has been added succesfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();

?>