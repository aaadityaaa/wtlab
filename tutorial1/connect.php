<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "tut";

// connecttodb($servername,$dbname,$dbuser,$dbpassword);
// function connecttodb($servername,$dbname,$dbuser,$dbpassword)
// {
// global $link;
// $link=mysql_connect ("$servername","$dbuser","$dbpassword");
// if(!$link){die("Could not connect to MySQL");}
// mysql_select_db("$dbname",$link) or die ("could not open db".mysql_error());
// }

$conn = new mysqli($servername, $username, $password, $dbname);
// $conn = new mysqli('localhost','root','root','test');

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$FName = $_POST['firstName'];
$LName = $_POST['lastName'];
$Gender = $_POST['gender'];
$Email = $_POST['email'];
$Password = $_POST['password'];
$PhoneNo = $_POST['number'];

$sql = "INSERT INTO user (FName, LName, Gender, Email, Password, PhoneNo)
        values(?, ?, ?, ?, ?, ?)";
		$stmt->bind_param("sssssi", $FName, $lasLNametName, $Gender, $Email, $Password, $PhoneNo);
		$execval = $stmt->execute();

        echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();

// Close the connection

?>