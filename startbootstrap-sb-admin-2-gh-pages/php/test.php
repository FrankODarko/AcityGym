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

// Initialize the message variable
$searchMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Handle the GET request
    if (isset($_GET['tommy'])) {
        $searchTerm = $_GET['tommy'];

        // Perform a simple search query
        $sql = "SELECT * FROM usser WHERE first_name LIKE '%$searchTerm%'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<span>" . $row["first_name"] . " " . $row["last_name"] . "</span> ";
                // Add other fields as needed
            }
            // Set the message if there are search results
            $searchMessage = "$searchTerm";
        } else {
            echo "<span>No results found for: " . $searchTerm . "</span>";
        }
    } else {
        echo "";
    }
}

// Close the database connection
$conn->close();

?>
