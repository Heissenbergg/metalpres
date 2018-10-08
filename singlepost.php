<?php 

require 'class/db.php';
$id = Input::get('id');

$db = new DB();
$prodQuery = $db->query("product");

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="Keywords" content="stubovi, ograde, kanalice, podesti, stepenici">
    <meta name="Description" content="Proizvodnja pocinčanih ograda, stubova, kanalica, podesta po vašoj mjeri i namjeni">

	<title>NASLOV PROJEKTA</title>
	<link rel="shortcut icon" type="image/x-icon" href="icon/logo.ico"/>
	<meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<link rel="stylesheet" type="text/css" href="css/singlepost.css">
	<script type="text/javascript" src="js/menu.js"></script>
	<script type="text/javascript" src="js/app.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script src="https://use.fontawesome.com/85a780918f.js"></script>
</head>
<body onload="singleOnload();">
<?php require 'includes/menu.php'; ?>

<div id="slider">
	<?php 
	$imgQuery = $db->query("photos");
	$i = 0;
	while($img = $imgQuery -> fetch()){
		if($img['idofpost'] == $id){ ?>
			<img class="sliderImage" id="<?php echo $i++; ?>" src="admin/images/<?php echo $img['name']; ?>"></img>
		<?php }
	}
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
<div class="singlePostPart">
	<?php 
		while($item = $prodQuery -> fetch()){
			if($item['id'] == $id){ ?>
				<div id="singlePostPartHeader">
					<h4><?php echo $item['header']; ?></h4>
				</div>
				<div id="singePartBody">
					<p>
						<?php echo $item['text']; ?>
					</p>
				</div>
			<?php }
		}
	?>
	<?php require_once 'includes/footer.php'; ?>
</div>
</body>
</html>