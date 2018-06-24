<?php
session_start();

require_once ('db.php');
$maxImageSize = 1024*1024*5;
$maxVideoSize = 1024*1024*50;
$validImageType = array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/svg+xml');
$validVideoType = array('video/mpeg', 'video/mp4', 'video/ogg');
header("Location: add.php");

if (isset($_POST['submit'])){

	$title = $_POST['title'];
	$text = $_POST['text'];

	if (is_uploaded_file($_FILES['loadFile']['tmp_name'])) {
		$fileName = $_FILES['loadFile']['name'];
		$fileType = $_FILES['loadFile']['type'];
		$extension = array_pop(explode(".",$_FILES['loadFile']['name']));
	 	$uploadImageDir = 'images/';
		$uploadVideoDir = 'video/';
		$newFileName = md5($fileName).time().'.'.$extension;

		if (in_array($fileType, $validImageType)) {//image
			if ($_FILES['loadFile']['size'] < $maxImageSize) {
					if (move_uploaded_file($_FILES['loadFile']['tmp_name'], $uploadImageDir . $newFileName)) {
							addToDB($DBH, $title, $text, $newFileName, "image");
					} else {
							$_SESSION['msg'] = $_FILES['loadFile']['error'];
					}
			}else{
					$_SESSION['msg'] = "Max image size: ".$maxImageSize;
			}
		}else if (in_array($fileType, $validVideoType)) {//video
			if ($_FILES['loadFile']['size'] < $maxVideoSize) {
					if (move_uploaded_file($_FILES['loadFile']['tmp_name'], $uploadVideoDir . $newFileName)) {
							addToDB($DBH, $title, $text, $newFileName, "video");
					} else {
							$_SESSION['msg'] = $_FILES['loadFile']['error'];
					}
			}else{
					$_SESSION['msg'] = "Max video size: ".$maxVideoSize;
			}
		}else {
			$_SESSION['msg'] = "file unvalid";
		}

	}else{
		addToDB($DBH, $title, $text, "", "text");

	}
}

function addToDB($DBH, $title, $text, $newFileName, $type){
	$STH = $DBH->prepare("INSERT INTO `items` (`title`,`text`,`src`, `id_type`) VALUES ( :title, :text, :src, (SELECT `id` FROM `type` WHERE `name` = :type))");

	$STH->bindParam(':title', $title);
	$STH->bindParam(':text', $text);
	$STH->bindParam(':src', $newFileName);
	$STH->bindParam(':type', $type);

	$STH->execute();
	$_SESSION['msg'] = "successfully";

}

?>
