<?php

$servername = "localhost";
$username = "phpmyadmin";
$password = "EgeFuckman";
$dbname = "phpmyadmin";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("connection loss: " . $conn->connect_error);
} 

$sql = "SELECT * FROM `takimlar` WHERE 1";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $emparray = array();

    while($row = $result->fetch_assoc()) {
        $emparray[] = $row;

    }
    if($_GET["access_key"] == "3169"){
    echo(json_encode($emparray));
}

} else {

}

$conn->close();


?>