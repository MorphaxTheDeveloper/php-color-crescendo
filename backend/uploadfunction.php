<?php
include "db.php";
include "recentvarible.php";
include "getteamdetails.php";
include "chracters.php";
include "check_username.php";

if($_POST){
session_start();
$_SESSION['teamnumber'] = strip_tags($_POST['teamnumber']);
$_SESSION['mesaj'] = strip_tags($_POST['mesaj']);
}


function randomize(){

    return rand(1000,9999);
}

if(checkusername($_SESSION['teamnumber']) == true){

die("Ayni takimla birden fazla ekleme yapamazsiniz");


}

// if(empty($_SESSION['teamnumber'])[0]){
//     die("invalid team");
// }


$check_state = false;

$uploadDirectory = 'uploads/';
if (!file_exists($uploadDirectory)) {
  mkdir($uploadDirectory, 0777, true);
 }

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
        $file = $_FILES['file'];
        $filePath = $uploadDirectory . basename(randomize().$file['name']);
        $fileType = pathinfo($filePath, PATHINFO_EXTENSION);
        $allowedExtensions = array("jpg", "jpeg", "png");

if (!in_array($fileType, $allowedExtensions)) {
    echo "Only jpg, jpeg, png files are allowed to upload.";
}

    else { 
            if (move_uploaded_file($file['tmp_name'], $filePath)) {
                    $editedcountry = replaceAccents(strtolower(getteamdetails($_SESSION['teamnumber'])[2]));
                    $editedcity = replaceAccents(strtolower(getteamdetails($_SESSION['teamnumber'])[1]));
                    $editedstate_prov = replaceAccents(strtolower(getteamdetails($_SESSION['teamnumber'])[5]));
                 $url = "https://nominatim.openstreetmap.org/search?q=".$editedcity."+".$editedstate_prov."+".$editedcountry."&format=json";
                 echo $url;
                 $options = [
                    'http' => [
                        'header' => "User-Agent: python-requests/2.31.0\r\n" .
                                    "Accept-Encoding: gzip, deflate\r\n" .
                                    "Accept: */*\r\n" .
                                    "Connection: keep-alive\r\n",
                    ],
                ];
                
                $context = stream_context_create($options);
                $response = file_get_contents($url, false, $context);
                echo $response;

                $lazimarray = json_decode($response,true);
                
                $lat = $lazimarray[0]["lat"];
                $lon = $lazimarray[0]["lon"];


        //$postal, $city, $country, $teamnumber, $teamname, $imgurl
            $created_date = date("Y-m-d H:i:s");
                addteam2(getteamdetails($_SESSION['teamnumber'])[0],
                 getteamdetails($_SESSION['teamnumber'])[1],
                  getteamdetails($_SESSION['teamnumber'])[2],
                   htmlspecialchars($_SESSION['teamnumber']),
                    getteamdetails($_SESSION['teamnumber'])[4],
                     $filePath,
                      $_SESSION['mesaj'],
                       $created_date,
                       $lat,
                       $lon);
                
            } else {
                echo "hata";
            }
        }}
    


?>