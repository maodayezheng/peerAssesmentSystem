<?php
require_once 'DBConnection.php';
$id =intval($_POST["id"]);
$sql ="DELETE FROM assesments where id = $id";
$conn->query($sql);
$conn->close();
header('location: ../assignReport.php');



?>