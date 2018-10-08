<?php 
	require '../class/db.php';
	require '../class/user.php';
	$photo = new Photo();
	if(!empty($_FILES['file'])){
		$files = $_FILES['file'];
		$count = 0;
		foreach($_FILES['file']['name'] as $f => $name){
			$ext = pathinfo($_FILES['file']['name'][$f],PATHINFO_EXTENSION);
			$name = md5($_FILES['file']['name'][$f].time()).'.'.$ext;
		    move_uploaded_file($_FILES['file']['tmp_name'][$f], 'images/'. $name);
		    $photo -> insert($name);
		}
	}

	if(!empty($_POST['delete'])){
		$delete = $_POST['delete'];
		$photo->delete($delete);
	}

	$db = new DB();
	$photoQuery = $db->query("slider");
?>

<!DOCTYPE html>
<html>
<head>
	<title>ADMIN PANEL</title>
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<link rel="stylesheet" type="text/css" href="css/slider.css">
</head>
<body>
	<?php require 'includes/menu.php'; ?>
	<section>
		<div id="sectioNSlider">
			<h4>SLIDER</h4>
		</div>
		<div id="sectionBody">
			<form method="post" enctype="multipart/form-data">
				<input type="file" name="file[]" multiple="multiple">
				<input type="submit" value="Spremite">
			</form>
		</div>
		<div id="slides">
			<?php 
				while($phot = $photoQuery -> fetch()){ ?>
					<div class="photo">
						<img src="images/<?php echo $phot['name']; ?>">
						<div class="delete">
							<form method="post">
								<input type="hidden" name="delete" value="<?php echo $phot['name']; ?>">
								<input type="submit" value="X">
							</form>
						</div>
					</div>
				<?php }
			?>
		</div>
	</section>
</body>
</html>