<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
  <script src="sweetalert2.all.js"></script> 
  <script defer data-domain="crescendo.scorpions7672.com" src="https://plausible.io/js/script.js"></script>
  <?php 
  include("includes/navbar.php"); 
  include("backend/returnlastteam.php"); 

  if($_GET){
    if($_GET['state'] == "success"){
      echo("<script>
      Swal.fire({title: 'Success!', text: 'Your entry has been queued for review', icon: 'success', confirmButtonText: 'ok'})
      </script>");

    }
    if($_GET['state'] == "fail"){

      echo("<script>
      Swal.fire({title: 'Fail!', text: 'Try it later', icon: 'error', confirmButtonText: 'ok'})
      </script>");
    }

  }
  ?>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Color Crescendo</title>
</head>
<body style="background-color: #e6e6e6">

  
<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-2 sidenav">
    <?php

$jsonarray = returner();
$decodedoutput = json_decode($jsonarray,true);

$name = $decodedoutput["name"];

$logo = $decodedoutput["logo"];


?>
    </div>
    <div class="col-sm-8 text-left"> 
    <div class="well justify-content-center" style="display: flex; align-items: center; justify-content: center; background-color:#f5f5f5; color:black; filter: drop-shadow(10px 10px 15px black); border-radius: 10px;">
    <center><img src="<?php echo("backend/".$logo); ?>" class="image-responsive" style="max-height:100px; max-width: 100px; margin-bottom: 10px; "></center>


    <center><h4 style="margin-left:15px;">Last team to upload their team logo: <?php echo($name); ?> <a href="upload">Upload your own!</a></h4></center>

  </div>
<hf>
  <br>

<center>
    <img src="/mosaic.png" class="img-responsive" style="border-radius: 8px; border: 2px white solid; filter: drop-shadow(10px 10px 15px black);">
</center>

<style>
body {
  background-image: url('rainbow.png');
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
}


</style>
    </div>
    <div class="col-sm-2 sidenav">

      <!--<div class="well"></div>
      <div class="well"></div>-->

    </div>
  </div>
</div>

</body>
</html>
