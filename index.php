<?php 
require 'class/db.php';
$db = new DB();
$dbQueray = $db->query("slider");
$prodQuery = $db->query("product");
$date = new Date(date("d"),date("m"), date("y"));
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="Keywords" content="stubovi, ograde, kanalice, podesti, stepenici">
    <meta name="Description" content="Proizvodnja pocinčanih ograda, stubova, kanalica, podesta po vašoj mjeri i namjeni">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-111108207-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-111108207-1');
    </script>

	<title>Metalpress d.o.o</title>
	<link rel="shortcut icon" type="image/x-icon" href="icon/logo.ico"/>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<script type="text/javascript" src="js/menu.js"></script>
	<script type="text/javascript" src="js/app.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script src="https://use.fontawesome.com/85a780918f.js"></script>
	<meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no" />
</head>
<body onload="onloadCall();">
<?php require_once 'includes/menu.php'; ?>
<img id="backgroundImage" src="img/1.jpg"></img>
<img id="logo" src="icon/logo.png">
<div id="slider">
	<?php 
	$i = 0;
	while($photo = $dbQueray -> fetch()){ ?>
		<img class="sliderImage" id="<?php echo $i++; ?>" src="admin/images/<?php echo $photo['name']; ?>"></img>
	<?php }	
	?>
	<div id="leftArrow" onclick="previousOne();">
		<img src="icon/arrowLeftt.png">
	</div>
	<div id="rightArrow" onclick="nextOne();">
		<img src="icon/arrowRight.png">
	</div>
	<div id="sliderPages">
	</div>
</div>
<div id="nestPart1">
	<?php 
	$specialQuery = $db->query("product");
	$specialCounter = 0;
	while($spec = $specialQuery -> fetch()){
		if($spec['highlighted'] && $specialCounter == 0){ $specialCounter++; ?>
			<div id="nestedLeft1">
				<?php 
					$specImageQuery = $db->query("photos");
					while($specImg = $specImageQuery -> fetch()){
						if($specImg['idofpost'] == $spec['id']){ ?>
							<div id="nestedLeft1pic">
								<img src="admin/images/<?php echo $specImg['name']; ?>"></img>
							</div>
						<?php }
					}
				?>
				<div id="nestedLeft1wrapper">
					<p id="nestedLeft1gold">Ponos firme</p>
					<p id="nestedLeft1bold"><?php echo $spec['header']; ?></p>
				</div>
				<a href="singlepost.php?id=<?php echo $spec['id']; ?>"><p id="nestedLeft1details">Više informacija ..</p></a>
			</div>
		<?php } else if($spec['highlighted'] && $specialCounter == 1){ $specialCounter++; ?>
			<div id="nestedRight1">
				<?php 
					$specImageQuery = $db->query("photos");
					while($specImg = $specImageQuery -> fetch()){
						if($specImg['idofpost'] == $spec['id']){ ?>
							<div id="nestedRight1pic">
								<img src="admin/images/<?php echo $specImg['name']; ?>"></img>
							</div>
						<?php }
					}
				?>
				<div id="nestedRight1wrapper">
					<p id="nestedRight1gold">Ponos firme</p>
					<p id="nestedRight1bold"><?php echo $spec['header']; ?></p>
				</div>
				<a href="singlepost.php?id=<?php echo $spec['id']; ?>"><p id="nestedRight1details">Više informacija ..</p></a>
			</div>
		<?php }
	}

	?>
</div>
<div id="nestPart2">
	<p id="zadovoljniKupci">Vrste proizvoda</p> <br>
	<div class="comment newOne" id="textSlide0">
		<p>K A N A L I C E<br>
	</div>
	<div class="comment newOne" id="textSlide1">
		<p>O G R A D E<br>
	</div>
	<div class="comment newOne" id="textSlide2">
		<p>P O D E S T I<br>
	</div>
	<div class="comment newOne" id="textSlide3">
		<p>S T E P E N I C I<br>
	</div>
	<div class="comment newOne" id="textSlide4">
		<p>S T U B O V I<br>
	</div>
	<!--<div class="comment" id="textSlide0">
		<p>KANALICE<br>
		<hr id="linija"> <br></p>
		<p id="zadovoljniText">"Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
	</div>
	<div class="comment" id="textSlide1">
		<p>OGRADE<br>
		<hr id="linija"> <br></p>
		<p id="zadovoljniText">"Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
	</div>
	<div class="comment" id="textSlide2">
		<p>PODESTI<br>
		<hr id="linija"> <br></p>
		<p id="zadovoljniText">"Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
	</div>
	<div class="comment" id="textSlide3">
		<p>STEPENICI<br>
		<hr id="linija"> <br></p>
		<p id="zadovoljniText">"Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
	</div>
	<div class="comment" id="textSlide4">
		<p>STUBOVI<br>
		<hr id="linija"> <br></p>
		<p id="zadovoljniText">"Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
	</div> -->
</div>
<div id="nestPart3">
	<p id="izdvojeno">Naši proizvodi</p>
	<p id="shortDesc">Pogledajte posljednje odrađene projekte</p>
	<div id="nineofthem" cellpadding="0" cellspacing="0">
		<?php 
			while($item = $prodQuery -> fetch()){ ?>
				<div class="singlePart">
					<?php 
						$imgQuery = $db->query("photos");
						while($img = $imgQuery -> fetch()){
							if($img['idofpost'] == $item['id']){ ?>
								<img src="admin/images/<?php echo $img['name']; ?>">
							<?php break; }
						}
					?>
					<div class="abutText">
						<div class="headerOfAboutText">
							<h4><?php echo $item['header']; ?></h4>
						</div>
						<div class="moreOfAboutText">
							<p><a href="singlepost.php?id=<?php echo $item['id']; ?>">POGLEDAJTE DETALJNIJE</a></p>
						</div>
					</div>
					<div class="shaddowOfAbout"></div>
				</div>
			<?php }
		?>
	</div>
</div>
<?php require_once 'includes/footer.php'; ?>
</body>
</html>