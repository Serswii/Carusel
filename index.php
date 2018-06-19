<?php
	try {
	    $dbh = new PDO('mysql:host=localhost;dbname=carusel', "root", "");
	    
	} catch (PDOException $e) {
	    print "Error!: " . $e->getMessage() . "<br/>";
	    die("Ошибка подлючения!");
	}

?>


<!DOCTYPE html>
<html lang="en" >

<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="/css/Shrift.css">
	
	<link rel="stylesheet" href="/css/flickity.min.css">
	<link rel="stylesheet" href="css/style.css">

	
	<script src='/js/jquery.min.js'></script>
	<script src='/js/flickity.min.js'></script>
  
</head>

<body background="">
	<style type="text/css">
		body {
			background-size: 100%;
  			font-family: "Fira Sans", sans-serif;
		}

.slide--parent {
  max-width: 1300px;
  margin: auto;
  }

p {
  line-height: 1.8;
}

h1 {
  letter-spacing: 10px; /* Расстояние между буквами*/
 color: #343434; 
}

small {
  font-style: italic;
  font-weight: 100;
  margin-bottom: 0.5em; /* Расстояние между линиями */
  display: inline-block;
  color: #999;
  position: relative;
  padding-left: 3em; /* Расстояние между линией и текстом */
}
small:after {
  content: "";
  position: absolute;
  left: -0em;
  top: 50%;
  height: 4px;
  width: 2.4em;
  background: red;
  transform: translateY(-50%);
}

.parent--el {
  width: 100%;
  max-width: 1500px;
  margin: auto;
}
.parent--el .two--col {
  display: flex;
  align-items: center;
}

figure {
  margin: 0;
}

.is-item.has--img {
  width: 100%;
}

.the-img {
  width: 100%;
  position: relative;
  overflow: hidden;
}
/*.the-img img {
  width: 100%;
}*/

.is-item--inner {
  padding: 0em 3em;
}

hr {
  margin: 0.5em 0em;
  height: 10px;
  background: #eee;
  border: none;
}

.the-img {
  overflow: hidden;
}
.the-img img {
  position: relative;
  transform: translateX(100%);
  transition: all 600ms ease;
}


.is-item--inner p {
  transform: translateY(15px);
  position: relative;
  opacity: 0;
  transition: all 400ms ease;
}

h1 {
	margin-top: 0.3em;
	margin-left: 45px;
  overflow: hidden;
}
h1 span {
  transform: translateY(100%);
  position: relative;
  transition: all 500ms ease;
  display: inline-block;
}

hr {
  width: 0;
  max-width: 80em;
  transition: all 2500ms ease;
}

small {
  transform: translateY(10px);
  opacity: 0;
  transition: all 100ms ease;
}
small:after {
  width: 0;
  max-width: 2.4em;
  transition: all 1500ms ease;
}

.parent--el.is-selected .the-img {
  overflow: hidden;
}
.parent--el.is-selected .the-img img {
  position: relative;
  transform: translateX(0%);
  transition-delay: 500ms;
}
.parent--el.is-selected .is-item--inner p {
  transform: translateY(0px);
  transition-delay: 500ms;
  position: relative;
  opacity: 1;
}
.parent--el.is-selected .is-item--inner p:nth-of-type(2) {
  color: red;
  transition-delay: 700ms;
}
.parent--el.is-selected .is-item--inner p:nth-of-type(3) {
  transition-delay: 900ms;
}
.parent--el.is-selected h1 {
  overflow: hidden;
}
.parent--el.is-selected h1 span {
  transform: translateY(0%);
  position: relative;
  transition-delay: 400ms;
  display: inline-block;
}
.parent--el.is-selected hr {
  width: 100%;
  max-width: 8em;
  transition-delay: 500ms;
}
.parent--el.is-selected small {
  transform: translateY(0px);
  opacity: 1;
  transition-delay: 400ms;
}
.parent--el.is-selected small:after {
  width: 100%;
  transition-delay: 600ms;
  max-width: 2.4em;
}

	</style>
	<p id="hours"></p>
	<style type="text/css">
		#hours{
		  font-size: 190%;
		  position: absolute;
		  right: 5%;
		  margin-top: 0.1em; /* Подымание и опускание часов */
		  color: #343434;
		}
	</style>


  	<div class="slide--parent">


  		<!-- <div class="parent--el">
	    		<h1><span>'werwer'</span></h1>
					<div class="two--col">
						<div class="is-item has--img">
							<figure class="the-img">
								<video id="video"  width="1000" height="500" src="video/Blurred Bokeh Video.mp4" autoplay poster=""></video>
								
							</figure>
						</div>
						<div class="is-item has--content">
							<div class="is-item--inner">
								
								<small>Последние новости:</small>
								<hr>
								<p>assdasd</p>
							</div>
						</div>
					</div>
				</div> -->

  	<?php
// <img src=images/'.$row['foto'].' width = "900" height = "540" alt=""> 
		$test = $dbh->query("SELECT * FROM `spisok`");
	    $test->setFetchMode(PDO::FETCH_ASSOC);
	    while ($row = $test->fetch()) {
	    	if($row['foto']!=""){
	    	echo '
	    		<div class="parent--el">
	    		<h1><span>'.$row['title'].'</span></h1>
					<div class="two--col">
						<div class="is-item has--img">
							<figure class="the-img">
								<video id="video" width="1000" height="500" src="video/Blurred Bokeh Video.mp4" autoplay poster=""></video>
								
							</figure>
						</div>
						<div class="is-item has--content">
							<div class="is-item--inner">
								
								<small>Последние новости:</small>
								<hr>
								<p>'.$row['text'].'</p>
							</div>
						</div>
					</div>
				</div>
	    	';
	    }

	else{ 

		echo '
	    		<div class="parent--el">
					<div class="two--col">
					<div class="is-item has--content">
							<div class="is-item--inner">
								<h1>'.$row['title'].'</h1>
								<small>Последние новости:</small>
								<hr>
								<p><center>'.$row['text'].'</center></p>
							</div>
						</div>
					</div>
				</div>
	    	';
	    }
	}
?>

</div>
	<script type="text/javascript">
		var slideEl = $(".slide--parent");

			var video = document.getElementById("video");
			

			slideEl.flickity({
				imagesLoaded: true,
				wrapAround: true,
				autoPlay: 5000,
				pauseAutoPlayOnHover: false,
			});
			video.play();
			


	</script>
	<script type="text/javascript">

		

		aud.onended = function() {
	    alert("The audio has ended");



		obj_hours=document.getElementById("hours");

name_month=new Array ("Января","Февраля","Марта","Апреля","Мая",
"Июня","Июля","Августа","Сентября","Октября","Ноября","Декабря");
name_day=new Array ("Воскресенье ","Понедельник ","Вторник ",
"Среда ","Четверг ","Пятница ","Суббота ");

function wr_hours()
{
time=new Date();

time_sec=time.getSeconds();
time_min=time.getMinutes();
time_hours=time.getHours();
time_wr=((time_hours<10)?"0":"")+time_hours;
time_wr+=":";
time_wr+=((time_min<10)?"0":"")+time_min;
time_wr+=":";
time_wr+=((time_sec<10)?"0":"")+time_sec;

time_wr=name_day[time.getDay()]+time.getDate()+" "+name_month[time.getMonth()]+" "+time.getFullYear()+" "+time_wr;

obj_hours.innerHTML=time_wr;
}

wr_hours();
setInterval("wr_hours();",1000);
	</script>
	<!-- <script type="text/javascript" src="/js/clock.js"></script> -->
	</body>
</html>
