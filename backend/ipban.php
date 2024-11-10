<?php
    $servername = "localhost";
    $username = "phpmyadmin";
    $password = "EgeFuckman";
    $dbname = "phpmyadmin";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
} 
$ip = $conn->real_escape_string($_SERVER['REMOTE_ADDR']);

$sql = "SELECT * FROM `bekleyenler` WHERE ip = '$ip'";
$result = $conn->query($sql);

if ($result === false) {
    die("Query error: " . $conn->error);
}

if ($result->num_rows > 0) {
    header("Location: ../index.php");
} else {
}

$conn->close();
?>
