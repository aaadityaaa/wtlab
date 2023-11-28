<!-- CREATE DATABASE IF NOT EXISTS school;

USE school;

CREATE TABLE IF NOT EXISTS students (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    roll_number VARCHAR(20) UNIQUE NOT NULL,
    age INT
); -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records</title>
</head>
<body>
    <h2>Student Records</h2>

    <?php
    // Database connection
    $conn = new mysqli("localhost", "username", "password", "school");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Create Record
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["create"])) {
        $name = $_POST["name"];
        $rollNumber = $_POST["roll_number"];
        $age = $_POST["age"];

        $sql = "INSERT INTO students (name, roll_number, age) VALUES ('$name', '$rollNumber', '$age')";

        if ($conn->query($sql) === TRUE) {
            echo "Record created successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Read Records
    $result = $conn->query("SELECT id, name, roll_number, age FROM students");

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Roll Number</th>
                    <th>Age</th>
                    <th>Action</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['roll_number']}</td>
                    <td>{$row['age']}</td>
                    <td>
                        <a href='update.php?id={$row['id']}'>Update</a>
                        <a href='delete.php?id={$row['id']}' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                    </td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "No records found.";
    }

    $conn->close();
    ?>

    <h2>Create New Record</h2>
    <form method="post" action="index.php">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>
        <label for="roll_number">Roll Number:</label>
        <input type="text" name="roll_number" required><br>
        <label for="age">Age:</label>
        <input type="text" name="age"><br>
        <input type="submit" name="create" value="Create Record">
    </form>
</body>
</html>
