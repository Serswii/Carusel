<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Добавление записей в карусель</title>
</head>
<body>
	<meta charset="utf-8">

	<form enctype="multipart/form-data" method="POST" action="upload.php">
			<center>
				<p><h2>Оглавление</h2></p>
				<input name = "title"  type="text" size="60" maxlength="40">
				<p><h2>Содержание</h2></p>
		       	<textarea name="text" rows="20" cols="60" name="text" maxlength="350" ></textarea>
		       	<p><h2>Загрузка фото/видео в БД</h2></p>
				<!-- <input type="hidden" name="MAX_FILE_SIZE" value="1024" /> -->
		       	<input name = "loadFile" type="file">
		        <input type = "submit" name = "submit"  value = "Добавить">
		        <p><h1><?php echo $_SESSION['msg']; ?></h1></p>
    		</center>
    </form>

</body>
</html>
