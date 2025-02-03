<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'newytest';

$conn = new mysqli($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['q'])) {
    $searchTerm = $_GET['q'];
    $sql = "SELECT first_name, last_name FROM usser WHERE first_name LIKE '$searchTerm%'"; // Updated line
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<a href='index.php?tommy=" . $row['first_name'] . "' class='list-group-item list-group-item-action'>" . $row['first_name'] . " " . $row['last_name'] . "</a>";
        }
    }
}

$conn->close();
?>
