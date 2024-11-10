<?php
function getteamdetails($takim){

$api_url = 'https://www.thebluealliance.com/api/v3/team/frc'.$takim;

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$headers = array(
    'accept: application/json',
    'X-TBA-Auth-Key: AEeNplVRJEvF4Wvp7xatoIB2RdeQZFY1uhL79wRLNAqBlojMXio0wam8TV0wEAVN'
);

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
curl_close($ch);

$decoded_output = json_decode($result,true);

$postal_code = $decoded_output['postal_code']; 
$city = $decoded_output['city']; 
$country = $decoded_output['country']; 
$nickname = $decoded_output['nickname'];
$state_prov = $decoded_output['state_prov'];

$location = array($postal_code,$city,$country,$takim,$nickname,$state_prov);
return $location;
}

?>