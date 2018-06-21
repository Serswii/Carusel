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
				<input name = "title" type="text" size="35">
				<p><h2>Содержание</h2></p>
		       	<textarea rows="10" cols="60" name="text"></textarea>
		       	<p><h2>Загрузка фото/видео в БД</h2></p>
						<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
		       	<input name = "loadFile" type="file">
		        <input type = "submit" name = "submit"  value = "Добавить"
    		</center>
    </form>

</body>
</html>
