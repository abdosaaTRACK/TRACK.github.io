<?php
// Connect to the database
$servername = "sqlxxx.epizy.com";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch progress data
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $client_id = $_GET['client_id'];
    $sql = "SELECT transferred, total FROM progress WHERE client_id = '$client_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo json_encode(array("transferred" => 0, "total" => 500000));
    }
}

$conn->close();
?>
