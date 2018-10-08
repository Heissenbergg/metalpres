<!DOCTYPE html>
<html>
<head>
	<title>ADMIN PANEL</title>
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<link rel="stylesheet" type="text/css" href="css/post.css">
	<script type="text/javascript" src="js/insert.js"></script>
</head>
<body>
        <div id="loadingBar">
	   <img id="loadingGif" src="../icon/loading.gif">
	   <img id="loadingLogo" src="../icon/logo.png">
        </div>
	<?php require 'includes/menu.php'; ?>
	<section>
		<div id="sectioNSlider">
			<h4>NOVI POST</h4>
		</div>
		<div id="sectionBody">
			<div id="textPart">
				<input type="text" id="header" name="" placeholder="Naslov.." autocomplete="off">
				<textarea id="text" placeholder="Text.." autocomplete="off"></textarea>
			</div>
			<div id="insertImage">
				<form enctype="multipart/form-data">
					<input type="file" class="hiddenElements" id="file" name="file">
					<div onclick="uploadAllPictures();" id="saveImagebutton">UPLOAD</div>
				</form>
			</div>
			<div id="allImages">
			</div>
			<div id="savePost" onclick="savePOST();">
				SPREMITE POST
			</div>
		</div>
	</section>
</body>
</html>