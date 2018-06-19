<?php
session_start();
require_once ('config.php');

	if (isset($_POST['submit'])){
	    $title = $_POST['title']; 
	 	$text = $_POST['text']; 
	 	$video = $_POST['video'];
	 	//$video = '"video/'.$_FILES['video']['name'].'"';
	 	$foto = $_FILES['foto']['name'];
// $sql3 = "SELECT `video` FROM `spisok` WHERE `video`='$video' ";
// $sql = "SELECT `foto` FROM `spisok` WHERE `foto`='$foto'";
// 			$result = $mysqli->query($sql);
			// $result2 = $mysqli->query($sql3);
			// $row2 = $result2->num_rows;
			// $row = $result->num_rows;
			// 	if($row == 0){
	 			if($title !="" OR $text !="" OR $foto !="" OR $video !=""){
		 			$sql2 = "INSERT INTO `spisok`(`title`,`text`,`foto`,`video`) VALUES ('$title','$text','$foto','$video' )";
		 			$result = $mysqli->query($sql2);
		 		echo $sql2;
		 	}
	 		
		}

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
							$test =$_FILES['foto']['name'];
						if(move_uploaded_file($_FILES['foto']['tmp_name'], 'images/'.$test)){
							$_SESSION['msg'] = 'Не удалось загрузить файл';
							

					$_SESSION['msg'] = ' Фото добавлено в БД "images/'.$test;
						$_SESSION['msa'] ='"images/';
					echo $_SESSION['msg'];
					}else{

						$_SESSION['msg'] = 'Вы не загрузили файл';
						echo $_SESSION['msg'];
					}
			}

			// if(!empty($_FILES['video']['tmp_name'])){

			// 			if(!empty($_FILES['video']['error'])){
			// 			$_SESSION['msg'] = 'Произошла ошибка загрузки';
							
			// 			}

			// 			switch (!empty($_FILES['video']['type'])) {

			// 				case 'video/MPEG-4':
			// 				$type = 'mp4';
			// 				break;

			// 				default:
			// 				echo "Неправильный тип изображения";
			// 				$_SESSION['msg'] = 'Неправильный тип изображения';
			// 				break;
			// 			}
			// 				$test =$_FILES['video']['name'];
			// 			if(move_uploaded_file($_FILES['video']['tmp_name'],'video/'.$test)){
			// 				$_SESSION['msg'] = 'Не удалось загрузить файл';
							

			// 		$_SESSION['msg'] = ' Фото добавлено в БД "video/'.$test.'"';
						
			// 		echo $_SESSION['msg'];
			// 		}else{

			// 			$_SESSION['msg'] = 'Вы не загрузили файл';
			// 			echo $_SESSION['msg'];
			// 		}
			// }


?>

<!DOCTYPE html>
<html>
<head>
	<title>Добавление записей в карусель</title>
	
</head>
<body>
	<meta charset="utf-8">
	
	<form enctype="multipart/form-data" method="POST" action="add.php">
			<center>
				<p><h2>Оглавление</h2></p>
				<input name = "title" type="text" size="35">
				<p><h2>Содержание</h2></p>
		       	<textarea rows="10" cols="60" name="text"></textarea>
		       	<p><h2>Загрузка фотографий в БД</h2></p>
		       	<input name = "foto" type="file">
		       	<p><h2>Загрузка видео в БД</h2></p>
		       	<input name = "video" type="file" multiple accept="video/*,video/mp4">
		        <input type = "submit" name = "submit"  value = "Добавить">
    		</center>
    </form>
   			 	
    			
</body>
</html>