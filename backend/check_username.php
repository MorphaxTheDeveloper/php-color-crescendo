<?php
function checkusername($user){

    $servername = "localhost";
    $username = "phpmyadmin";
    $password = "EgeFuckman";
    $dbname = "phpmyadmin";
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("connection loss: " . $conn->connect_error);
    } 
    
    $sql = "SELECT * FROM `takimlar` WHERE teamnumber = $user";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
          
    while($row = $result->fetch_assoc()) {
     return true;
    }    
    } else {
        return false;

    }
    
    $conn->close();
    
}
    ?>