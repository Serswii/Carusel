<?php
require_once ('db.php');

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$src = $_GET['src'];
	$type = $_GET['type'];
	$dir;

	if ($type == "text") {
		$STH = $DBH->prepare("DELETE FROM `items` WHERE `id`= :id");
		$STH->bindParam(':id', $id);
		$STH->execute();
	}else {
		if ($type == "image") {
			$dir = "images/";
		}else if ($type == "video") {
			$dir = "video/";
		}
		$file = $dir.$src;
		if (unlink($file)) {
			$STH = $DBH->prepare("DELETE FROM `items` WHERE `id`= :id");
			$STH->bindParam(':id', $id);
			$STH->execute();
		}
	}
	header('Location: /delete.php');

}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<table align="center" width="100%" border="1">
				<tr>
					<td>id</td>
					<td>Title</td>
					<td>Text</td>
					<td>src</td>
					<td>type</td>
				</tr>
		<?php

				$test = $DBH->query("SELECT items.id, items.title, items.text, items.src, type.name AS type FROM `items` JOIN `type` ON items.id_type = type.id");
			    $test->setFetchMode(PDO::FETCH_ASSOC);
			    while ($row = $test->fetch()) {

				  echo '<tr><td>'.$row['id'].'</td>';
					echo '<td>'.$row['title'].'</td>';
					echo '<td>'.$row['text'].'</td>';
					echo '<td>'.$row['src'].'</td>';
					echo '<td>'.$row['type'].'</td>';
					echo '<td><a href=?id='.$row['id'].'&src='.$row['src'].'&type='.$row['type'].'>Delete</a></td></tr>';
			    }
		?>
		</table>
	</body>
</html>
