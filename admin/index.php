<html style="background-color:black; color:white;">


<center>
    <form action="" method="POST">
    <p>authkey</p>
    <input type="text" name="authkey"/>
    <input type="submit"/>
    </form>
</center>



<?php
if(isset($_POST['authkey'])){
if($_POST['authkey'] == "cinarbaba31"){

    session_start();
    session_regenerate_id();
    $_SESSION["auth"] = true;
    header("Location: menu.php");
}else{
    die("hatalıKey");
}
}else{}

session_start();


?>
</html>