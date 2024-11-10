<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
  <script defer data-domain="crescendo.scorpions7672.com" src="https://plausible.io/js/script.js"></script>
  <?php include("../includes/navbar.php"); 
  include("../backend/ipban.php")
  ?>   
  <style>
body {
  background-image: url('../rainbow.png');
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
}
</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Color Crescendo</title>
</head>
<body style="background-color: #e6e6e6">

  
<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-2 sidenav">

    </div>

    <div class="col-sm-8 text-left" style="background-color:white; padding-bottom:20%; border-radius:20px; filter: drop-shadow(10px 10px 10px black);"> 
<br>
<h1>Add your team details!</h1>
<br>


<form action="../backend/uploadfunction.php" method="post" enctype="multipart/form-data">
<input type="Text" class="form-control" id="team" placeholder="Team Number" name="teamnumber" style="max-width: 350px;" required>


<br>

<div style="display: flex;">
    <input type="Text" class="form-control" id="teamname" placeholder="Message to the world" name="mesaj" style="max-width: 350px;" required>
  </div>

  <?php
  include "../backend/getteamdetails.php";

if($_POST){

session_start();
$_SESSION['teamnumber'] = $_POST['teamnumber'];
$_SESSION['mesaj'] = $_POST['mesaj'];

}

    ?>
      <br>
        <label for="file">Select Team Logo</label>
        <input type="file" name="file" id="file" class="form-control" required>
        <br>
        
        <button type="submit" name="submit" class="btn btn-primary">Upload</button>
    </form>

  </div>
<hf>
    </div>
    <div class="col-sm-2 sidenav">

      <!--<div class="well"></div>
      <div class="well"></div>-->

    </div>
  </div>
</div>

</body>
</html>
