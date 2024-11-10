<?php
function addteam($postal, $city, $country, $teamnumber, $teamname, $imgurl, $mesaj, $tarih, $lat, $lon) {
    $servername = "localhost";
    $username = "phpmyadmin";
    $password = "EgeFuckman";
    $dbname = "phpmyadmin";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("connection loss: " . $conn->connect_error);
    } 

    $sql = "INSERT INTO `takimlar`(`postal`, `city`, `country`, `teamnumber`, `teamname`, `imgurl`, `ip`, `mesaj`, `tarih`, `lat`, `lon`) VALUES (\"". $postal."\",". "\"" . $city."\"," . "\"" . $country . "\"," . "\"" . mysqli_real_escape_string($conn,$teamnumber) . "\"," . "\"".$teamname."\",". "\"" .$imgurl."\"," . "\"" .$_SERVER['REMOTE_ADDR']. "\"," . "\"" . mysqli_real_escape_string($conn,$mesaj) . "\"," . "\"" . $tarih . "\"," . "\"" . $lat . "\"," . "\"" . $lon . "\")";

    if ($conn->query($sql) === TRUE) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://159.203.114.106:3131/run_mosaic?access_key=6(^@t2K20_c8");
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $responsee = curl_exec($curl);
        $error = curl_error($curl);
        curl_close($curl);

        if ($error) {
            echo "cURL Error: " . $error;
        } else {
            echo $responsee;
            delteam($teamnumber);
        }
    } else {
        delteam($teamnumber);
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://159.203.114.106:3131/run_mosaic?access_key=6(^@t2K20_c8");
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $responsee = curl_exec($curl);
    $error = curl_error($curl);
    curl_close($curl);
    
header("Location: ../admin/menu.php");
    $conn->close();

}

function addteam2($postal, $city, $country, $teamnumber, $teamname, $imgurl, $mesaj, $tarih, $lat, $lon){
    $servername = "localhost";
    $username = "phpmyadmin";
    $password = "EgeFuckman";
    $dbname = "phpmyadmin";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("connection loss: " . $conn->connect_error);
    } 

    $sql = "INSERT INTO `bekleyenler`(`postal`, `city`, `country`, `teamnumber`, `teamname`, `imgurl`, `ip`, `mesaj`, `tarih`, `lat`, `lon`) VALUES (\"". $postal."\",". "\"" . $city."\"," . "\"" . $country . "\"," . "\"" . mysqli_real_escape_string($conn,$teamnumber) . "\"," . "\"".$teamname."\",". "\"" .$imgurl."\"," . "\"" .$_SERVER['REMOTE_ADDR']. "\"," . "\"" . mysqli_real_escape_string($conn,$mesaj) . "\"," . "\"" . $tarih . "\"," . "\"" . $lat . "\"," . "\"" . $lon . "\")";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../index.php?state=success");
    } else {
        header("Location: ../index.php?state=fail");
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

}


function delteam($number){

    $servername = "localhost";
    $username = "phpmyadmin";
    $password = "EgeFuckman";
    $dbname = "phpmyadmin";
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
    } 
    
    $sql = "DELETE FROM `bekleyenler` WHERE teamnumber = " . $number;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    echo("<script>alert('başarılı')</script>");
    
    header("Location: menu.php");
    
    }
    $conn->close();

}

?>