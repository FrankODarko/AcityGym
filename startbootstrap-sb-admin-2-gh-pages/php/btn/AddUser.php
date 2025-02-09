<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'newytest';

$conn = new mysqli($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    $sql = "INSERT INTO usser (first_name, last_name, email, age) VALUES ('$first_name', '$last_name', '$email', '$age')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
