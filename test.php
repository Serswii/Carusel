<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<video id="qwe" width="1000" height="500" src="video/Blurred Bokeh Video.mp4" autoplay poster="">
  
</video>

<script type="text/javascript">
	
	var aud = document.getElementById("qwe");
	aud.onended = function() {
    alert("The audio has ended");
}


</script>

</body>
</html>