<?php
// Get JAWSDB connection information
$jawsdb_url = parse_url(getenv("JAWSDB_URL"));
$jawsdb_server = $jawsdb_url["host"];
$jawsdb_username = $jawsdb_url["user"];
$jawsdb_password = $jawsdb_url["pass"];
$jawsdb_db = substr($jawsdb_url["path"], 1);

// Connect to DB
$conn = new mysqli($jawsdb_server, $jawsdb_username, $jawsdb_password, $jawsdb_db);

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
