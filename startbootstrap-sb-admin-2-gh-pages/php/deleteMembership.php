<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'newytest';

$conn = new mysqli($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM memberships WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Membership plan deleted successfully";
    } else {
        echo "Error deleting plan: " . $conn->error;
    }

    $conn->close();
}
?>
