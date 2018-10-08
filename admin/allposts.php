<?php 
	require '../class/db.php';
	$db = new DB();
	$prodQuery = $db->query("product");

	if(!empty($_POST['delete'])){
		$id = $_POST['delete'];
		$db->action("DELETE FROM `product` WHERE id = $id");
		$deleteImg = $db->query("photos");
		while($img = $deleteImg -> fetch()){
			$path = 'images/'.$img['name'];
			if($img['idofpost'] == $id) unlink($path);
		}
		$db->action("DELETE FROM `photos` WHERE idofpost = $id");
		Redirect::to('allposts.php');
	}

	if(!empty($_POST['settwo'])){
		$id = $_POST['settwo'];
		if(isset($_POST['check'])){
			$is = 1;
			$update = "UPDATE `product` SET `highlighted` = '{$is}' WHERE id = $id";
		}else{
			$is = 0;
			$update = "UPDATE `product` SET `highlighted` = '{$is}' WHERE id = $id";
		}
		$db->action($update);
		Redirect::to('allposts.php');
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>ADMIN PANEL</title>
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<link rel="stylesheet" type="text/css" href="css/all.css">
</head>
<body>
	<?php require 'includes/menu.php'; ?>
	<section>
		<div id="sectioNSlider">
			<h4>SVI POSTOVI</h4>
		</div>
		<div id="sectionBody">
			<?php 
			while($post = $prodQuery -> fetch()){ ?>
				<div class="specificPost">
					<div class="imagePart">
						<?php 
						$imgQuery = $db->query("photos");
						while($img = $imgQuery -> fetch()){
							if($img['idofpost'] == $post['id']){ ?>
								<img src="images/<?php echo $img['name']; ?>">
							<?php break; }
						}
						?>
					</div>
					<div class="button">
						<form method="post">
							<input type="hidden" name="delete" value="<?php echo $post['id']; ?>">
							<input type="submit" value="Obrišite">
						</form>
					</div>
					<div class="button button2">
						<a target="_blank" href="../singlepost.php?id=<?php echo $post['id']; ?>">PREGLEDAJ</a>
					</div>
					<div class="button button3">
						<a href="#"><?php echo $post['header']; ?></a>
					</div>
					<div class="button button4">
						<form method="post">
							<?php 
							if($post['highlighted'] == 1){ ?>
								<input class="checkboc" type="checkbox" name="check" checked>
							<?php }else { ?>
								<input class="checkboc" type="checkbox" name="check" >
							<?php }
							?>
							
							<input type="hidden" name="settwo" value="<?php echo $post['id']; ?>">
							<input type="submit" value="OK">
						</form>
					</div>
				</div>
			<?php }

			?>
		</div>
	</section>
</body>
</html>