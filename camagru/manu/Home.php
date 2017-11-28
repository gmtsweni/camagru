<?php
include("connect.php");
if(isset($_POST["upload"])){
	$image = addslashes(file_get_contents($_FILES['file1']['tmp_name']));
	mysql_query("INSERT INTO users values('$image')");
}
if(isset($_POST["display"])){
	$res = mysql_query("SELECT * FROM user");
	echo "<table>";
	echo "<tr>";
	while($row = mysql_fetch_array($res)){
		echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image1']).'"height="100" width="100"/>';
	}
}
?>
<html>

<head>
				<title>Home page</title>
				<link rel="stylesheet" type="text/css" href="timeline.css">
		<meta charset="utf-8">
		<meta content="stuff, to, help, search, engines, not" name="keywords">
		<meta content="What this page is about." name="description">
		<meta content="Display Webcam Stream" name="title">
		<title>Camagru</title>
		<script> $(function() {$('div.split-pane').splitPane();});</script>
</head>
<!--body class="body_bg">
	<header>
		<div class="nav">
			<ul>
				<li class="home"><a class="active" href="home.php">Home</a></li>
				<li class="gallary"><a  href="gallary.php">Gallary</a></li>
				<li class="profile"><a href="profile.php">profile</a></li>
				<li  class="contact"><a href="logout.php">Logout</a></li>
			</ul>
		</div>
	</header>
	<pan> 
		<ul  class="gallery cf">  
				<div id="container"> <video autoplay="true" id="videoElement"></video></div>
				<div > <canvas id="canvas" width="700" height="450"></canvas> </div>
</ul>
</pan>
		<article  class="card">
				<form name="form" action="" method="post" enctype="multipart/form-data">
				<div >
						<a href="#" class="booth-capture-button" id="btn-download" download="image.jpg">Download</a>
							<a href="#" id="capture" class="booth-capture-button"><h1>capture</h1></a>
							<input type="file" name="file"></td>
							<a type="submit" class="booth-capture-button" name="upload" value="upload">upload</a>
							<a type="submit" class="booth-capture-button" name="display" value="display">Display</a>
						</div>
				</from>
		</article>
	
			<footer>
				<div class="nav">
					 <ul>
						&copy;
					</ul>
				</div>
			</footer>
</body-->
<header>
		<div class="nav">
			<ul>
				<li class="home"><a class="active" href="home.php">Home</a></li>
				<li class="profile"><a href="profile.php">profile</a></li>
				<li  class="contact"><a href="logout.php">Logout</a></li>
			</ul>
		</div>
	</header>
<div class="gall_hm">
      <table >
		<tr>
            <td bgcolor = "#aaa" width = "20%">
			<div id="container"> <video autoplay="true" id="videoElement"></video></div>
							<a href="#" id="capture" class="booth-capture-button"><h1>capture</h1></a>
			</td>
			<td bgcolor = "#aaf"></td>
			<td bgcolor = "#aff"></td>
			<td bgcolor = "#faa"></td>
			<td bgcolor = "#aaa" width = "20%">
			<div > <canvas id="canvas" width="700" height="450"></canvas> </div>
			<a href="#" class="booth-capture-button" id="btn-download" download="image.jpg">Download</a>
			
            </td>
		 </tr>
</div>
      <table>
	  <footer>
				<div class="nav">
					 <ul>
						&copy;
					</ul>
				</div>
			</footer>
   </body>
<script src="vid.js"></script>
</html>
