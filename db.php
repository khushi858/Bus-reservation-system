<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "username";  // Replace with your DB username
$password = "password";  // Replace with your DB password
$dbname = "bus_reservation";  // Replace with your DB name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = json_decode(file_get_contents("php://input"), true);
$departure = $conn->real_escape_string($data['departure']);
$destination = $conn->real_escape_string($data['destination']);
$date = $conn->real_escape_string($data['date']);

$sql = "SELECT name, time, seats FROM buses WHERE departure = '$departure' AND destination = '$destination' AND date = '$date'";
$result = $conn->query($sql);

$buses = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $buses[] = $row;
    }
}

$conn->close();
echo json_encode($buses);
?>
