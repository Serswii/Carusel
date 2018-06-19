<?php 

$id = $_GET['id'];

try {
	 $dbh = new PDO('mysql:host=localhost;dbname=carusel', "root", "");
	    
} catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
	die("Ошибка подлючения!");
}
$dbh->query("DELETE FROM `spisok` WHERE `id`=$id");
// header("Location : http://slauder/add.php");





?>


<table align="center" width="100%" border="1">
		<tr>
			<td>id</td>
			<td>Title</td>
			<td>Text</td>
			<td>Video</td>
			<td>Foto</td>
		</tr>
	<?php

		$test = $dbh->query("SELECT * FROM `spisok`");
	    $test->setFetchMode(PDO::FETCH_ASSOC);
	    while ($row = $test->fetch()) {


	    echo '<tr><td>'.$row['id'].'</td>';
		echo '<td>'.$row['title'].'</td>';
		echo '<td>'.$row['text'].'</td>';
		echo '<td>'.$row['video'].'</td>';
		echo '<td>'.$row['foto'].'</td>';
		echo '<td><a href=delete.php/?id='.$row['id'].'>Delete</a></td>';

	    }
?>
	</table>