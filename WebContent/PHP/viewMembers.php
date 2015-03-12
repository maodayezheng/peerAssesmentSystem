<?php
session_start();
$_SESSION["Selected_Group"] =  $_POST["group"];
echo $_SESSION["Selected_Group"];
header ( 'location: ../admin.php' );
?>