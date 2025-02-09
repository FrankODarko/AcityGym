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
    $plan_name = $_POST['plan_name'];
    $duration = $_POST['duration'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $sql = "INSERT INTO memberships (plan_name, duration, price, description) VALUES ('$plan_name', '$duration', '$price', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "New membership plan created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
