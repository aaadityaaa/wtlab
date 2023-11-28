<?php
$fname = $_POST['fname'];
$id = $_POST['id'];

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'student_attendance';

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn -> connect_error){
    die("CONNECTION FAILED");
}

$sql = "insert into student(id, roll, name, email) VALUES ('$id' , '2', '$fname', 'bye@gmail.com')";
if($conn->query($sql) === TRUE){
    echo "hello world, data is inserted";
}
else{
    echo "Bye world, no data inserted";
}

$conn->close();

?>