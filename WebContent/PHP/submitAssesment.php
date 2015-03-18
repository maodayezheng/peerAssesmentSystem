<?php
require_once 'DBConnection.php';
$comment = $_POST['content-comment'];
$comment1 = $_POST['style-comment'];
$comment2 = $_POST['source-comment'];
$assesment = intval($_POST['content-grade']);
$assesment1 = intval($_POST['style-grade']);
$assesment2 = intval($_POST['source-grade']);
$id = intval($_POST['id']);

//$sql = "update assesments set comment = $comment , comment1 = $comment1, comment2 = $comment2
		//Content =$assesment, Sytle = $assesment1, Sources = $assesment2 where id = 1";

$sql = "UPDATE `peersystem`.`assesments` SET `comment`='$comment', `comment1`='$comment1', `comment2`='$comment2', `Content`='$assesment', `Style`='$assesment1', `Sources`='$assesment2' WHERE `groupAssessed`='$id';
";

$conn->query($sql);

header('location: ../gradeReport.php');
?>