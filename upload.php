<?php
session_start();
require_once ('db.php');

if (isset($_POST['submit'])){

	$title = $_POST['title'];
	$text = $_POST['text'];
	$fileName = $_FILES['loadFile']['name'];

  $id_type = 1;//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

	if($title !="" OR $text !="" OR $fileName !=""){

    $STH = $DBH->prepare("INSERT INTO `items`(`title`,`text`,`src`, `id_type`) VALUES (:title, :text, :src, :id_type)");

    $STH->bindParam(':title', $title);
    $STH->bindParam(':text', $text);
    $STH->bindParam(':src', $fileName);
    $STH->bindParam(':id_type', $id_type);

    $STH->execute();

	}
}
//
// if(!empty($_FILES['foto']['tmp_name'])){
//
// 	if(!empty($_FILES['foto']['error'])){
// 		$_SESSION['msg'] = 'Произошла ошибка загрузки';
// 		header('Location:add.php');
// 	}
//
// 	switch (!empty($_FILES['foto']['type'])) {
//
// 		case 'image/jpeg':
// 		case 'image/pjpeg':
// 		$type = 'jpeg';
// 		break;
//
// 		case 'image/png':
// 		case 'image/x-png':
// 		$type = 'png';
// 		break;
//
// 		case 'image/gif':
// 		$type = 'gif';
// 		break;
//
// 		default:
// 		echo "Неправильный тип изображения";
// 		$_SESSION['msg'] = 'Неправильный тип изображения';
// 		header('Location:add.php');
// 		break;
// 	}
// 	$test =$_FILES['foto']['name'];
// 	if(move_uploaded_file($_FILES['foto']['tmp_name'], 'images/'.$test)){
// 		$_SESSION['msg'] = 'Не удалось загрузить файл';
// 		$_SESSION['msg'] = ' Фото добавлено в БД "images/'.$test;
// 		$_SESSION['msa'] ='"images/';
// 		echo $_SESSION['msg'];
// 	}else{
//
// 		$_SESSION['msg'] = 'Вы не загрузили файл';
// 		echo $_SESSION['msg'];
// 	}
// }
//
// 			// if(!empty($_FILES['video']['tmp_name'])){
//
// 			// 			if(!empty($_FILES['video']['error'])){
// 			// 			$_SESSION['msg'] = 'Произошла ошибка загрузки';
//
// 			// 			}
//
// 			// 			switch (!empty($_FILES['video']['type'])) {
//
// 			// 				case 'video/MPEG-4':
// 			// 				$type = 'mp4';
// 			// 				break;
//
// 			// 				default:
// 			// 				echo "Неправильный тип изображения";
// 			// 				$_SESSION['msg'] = 'Неправильный тип изображения';
// 			// 				break;
// 			// 			}
// 			// 				$test =$_FILES['video']['name'];
// 			// 			if(move_uploaded_file($_FILES['video']['tmp_name'],'video/'.$test)){
// 			// 				$_SESSION['msg'] = 'Не удалось загрузить файл';
//
//
// 			// 		$_SESSION['msg'] = ' Фото добавлено в БД "video/'.$test.'"';
//
// 			// 		echo $_SESSION['msg'];
// 			// 		}else{
//
// 			// 			$_SESSION['msg'] = 'Вы не загрузили файл';
// 			// 			echo $_SESSION['msg'];
// 			// 		}
// 			// }
?>
