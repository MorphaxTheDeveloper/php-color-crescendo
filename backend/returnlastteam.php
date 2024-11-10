<?php
function returner(){
    $servername = "localhost";
    $username = "phpmyadmin";
    $password = "EgeFuckman";
    $dbname = "phpmyadmin";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
} 

$sql = "SELECT * FROM takimlar ORDER BY tarih DESC LIMIT 1";
$result = $conn->query($sql);

if ($result === false) {
    die("Query error: " . $conn->error);
}

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        $team_name = $row["teamname"];
        $imgurl = $row["imgurl"];


        $need["name"] = $team_name;
        $need["logo"] = $imgurl;

        return json_encode($need);




    }

} else {
}

$conn->close();
}
?>