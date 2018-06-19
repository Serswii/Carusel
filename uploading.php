<?php
session_start();
require_once ('config.php');

if(!empty($_FILES['foto']['tmp_name'])){

	if(!empty($_FILES['foto']['error'])){
	$_SESSION['msg'] = 'Произошла ошибка загрузки';
	header('Location:add.php');
		
	}

	switch (!empty($_FILES['foto']['type'])) {

		case 'image/jpeg':
		case 'image/pjpeg';
		$type = 'jpeg';
		break;

		case 'image/png':
		case 'image/x-png':
		$type = 'png';
			break;

		case 'image/gif':
		$type = 'gif';
		break;

		default:
		echo "Неправильный тип изображения";
		$_SESSION['msg'] = 'Неправильный тип изображения';
		header('Location:add.php');
		break;
	}

	if(move_uploaded_file($_FILES['foto']['tmp_name'],'images/'.$_FILES['foto']['name'])){
		$_SESSION['msg'] = 'Не удалось загрузить файл';
		

$_SESSION['msg'] = 'Файл успешно загружен';
	$test =$_FILES['foto']['name'];
echo $test;
}else{
	echo "Вы не загрузили файл";
	$_SESSION['msg'] = 'Вы не загрузили файл';

}
}
// if (isset($_POST['submit'])){
// 	$foto = $test;
// 		 	$sql2 ="INSERT INTO `spisok` VALUES (NULL,'','','','"'images/'.$_FILES['foto']['name']"')";
// 		 	$result = $mysqli->query($sql2);
// 		 	echo " Фото загружено ";
// 		 	}
// ?>
	<form method="POST" action="add.php">
 		<input type = "submit" name = "submit"  value = "Добавить в БД">
 	</form>