<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en" >

<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="/css/Shrift.css">
	<link rel="stylesheet" href="/css/flickity.min.css">
	<link rel="stylesheet" href="/css/style.css">

	<script src='/js/jquery.min.js'></script>
	<script src='/js/flickity.min.js'></script>

</head>
<body><div class="slide--parent">
  	<?php
		$test = $DBH->query("SELECT items.id, items.title, items.text, items.src, type.name AS type FROM `items` JOIN `type` ON items.id_type = type.id");
	    $test->setFetchMode(PDO::FETCH_ASSOC);
	    while ($row = $test->fetch()) {
	    	echo '<div class="parent--el"><div class="colors">
	    		<h1><span>'.$row['title'].'</span></h1>
	    		</div>
					<div class="two--col">
						<div class="is-item has--img">
							<figure class="the-img">';
							if ($row['type'] == "image"){echo '<img src=images/'.$row['src'].' alt="">';
							}else if($row['type'] == "video") {echo '<video id="video" onended="endVideo()" controls="controls" width="900" height="540" src="video/'.$row['src'].'" poster=""></video>';
							}else if ($row['type'] == "text") {echo "<div class='texts'><p>".$row['text']."</p>";
							}echo'
							</figure>
						</div>
						<div class="is-item has--content">
							<div class="is-item--inner">';
								if ($row['type'] != "text") {echo "<p>".$row['text']."</p>";
								}echo '
							</div>
						</div>
					</div>
				</div>
	    	';
	    }
?>
</div>

	<script type="text/javascript">
		var slideEl = $(".slide--parent");

			slideEl.flickity({
				imagesLoaded: true,
				wrapAround: true,
				autoPlay: 5000,
				pauseAutoPlayOnHover: false,
			});

			var flkty = slideEl.data('flickity');

			slideEl.on( 'select.flickity', function( event, index ) {
				// console.log(cellElements.length);
				// slideEl.flickity('reloadCells');
				$(video).each(function( i, video) {
					video.currentTime = 0;
				  video.pause();
				});

				var element = $(flkty.selectedElement);

				element.find("video").each( function(i ,video) {

					video.play();
					slideEl.flickity('stopPlayer');
				});
			});

			function endVideo(){
				slideEl.flickity('playPlayer');
				slideEl.flickity('next');
			}
    </script>
    <p id="hours"></p>
	<script src='/js/clock.js'></script>
	</body>
</html>
