<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'student_attendance';


$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("connection failed");
}

$result = $conn->query('select * from student');
if($result->num_rows >0){
    while($row = $result->fetch_assoc()){
        $id = $row['id'];
        $name = $row['name'];
        echo "
        <label for='[$id]'>$name</label>
        <input type='checkbox' name='attendance[$id]' id='[$id]'> <br>
        ";
    }
}

$conn->close();

?>