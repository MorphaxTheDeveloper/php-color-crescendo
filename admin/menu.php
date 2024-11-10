<html>
<style>
</style>
<body style="background-color: black; color:white;">

<?php
session_start();

if($_SESSION['auth'] == false){
die("yetki yok");
header("Location: index.php");

}

else{
    
    echo("<center><p>Hosgeldin</p><table border=\"2\">");
        echo("<tr><td>postal</td><td>city</td><td>country</td><td>number</td><td>teamname</td><td>url</td><td>ip</td><td>mesaj</td><td>tarih</td><td>lat</td><td>lon</td></tr>");



        $servername = "localhost";
        $username = "phpmyadmin";
        $password = "EgeFuckman";
        $dbname = "phpmyadmin";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
} 

$sql = "SELECT * FROM bekleyenler WHERE 1";
$result = $conn->query($sql);

if ($result === false) {
    die("Query error: " . $conn->error);
}

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        echo("<tr><td>".$row['postal']."</td><td>".$row['city']."</td><td>".$row['country']."</td><td>".$row['teamnumber']."</td><td>".$row['teamname']."</td><td>".$row['imgurl']."</td><td>".$row['ip']."</td><td>".$row['mesaj']."</td><td>".$row['tarih']."</td><td>".$row['lat']."</td><td>".$row['lon']."</td><td><a href=\"?vref=".$row['teamnumber']."\">onayla</a></td><td><a href=\"?del=".$row['teamnumber']."\">reddet</a></td></tr>");

    }

} else {}

$conn->close();
echo("</table></center>");
}

if(isset($_GET["del"]) || isset($_GET["vref"])){

if(isset($_GET["del"])){

include "../backend/db.php";
delteam($_GET["del"]);

}

if(isset($_GET["vref"]) && !$_GET["vref"] == ""){
    include "../backend/db.php";
    $servername = "localhost";
    $username = "phpmyadmin";
    $password = "EgeFuckman";
    $dbname = "phpmyadmin";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
} 

$sql = "SELECT * FROM `bekleyenler` WHERE teamnumber = ".$_GET["vref"];
$result = $conn->query($sql);
if ($result === false) {
    die("Query error: " . $conn->error);
}
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $postal = $row["postal"];
        $city = $row["city"];
        $country = $row["country"];
        $teamnumber = $row["teamnumber"];
        $teamname = $row["teamname"];
        $imgurl = $row["imgurl"];
        $ip = $row["ip"];
        $mesaj = $row["mesaj"];
        $tarih = $row["tarih"];
        $lat = $row["lat"];
        $lon = $row["lon"];
    }
    
} else {}


addteam($postal,$city,$country,$teamnumber,$teamname,$imgurl,$mesaj,$tarih,$lat,$lon);
$conn->close();
    

}


}













?>

</body>
</html>