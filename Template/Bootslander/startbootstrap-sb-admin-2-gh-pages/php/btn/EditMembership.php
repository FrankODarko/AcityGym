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
    $id = $_POST['id'];
    $plan_name = $_POST['plan_name'];
    $duration = $_POST['duration'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $sql = "UPDATE memberships SET plan_name='$plan_name', duration='$duration', price='$price', description='$description' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Membership plan updated successfully";
    } else {
        echo "Error updating plan: " . $conn->error;
    }

    $conn->close();
}
?>
