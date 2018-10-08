<?php 
require '../class/db.php';
require '../class/user.php';

if(!Session::getUsername()){
	Redirect::to('../index.php');
}

$d = new Date();
$date = $d->days(date("m"));

?>


<!DOCTYPE html>
<html>
<head>
	<title>ADMIN PANEL</title>
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
    <script type="text/javascript" src="js/minevideo.js"></script>
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
	<?php require 'includes/menu.php'; ?>
	<section>
            <div id="numberOfViews">
                <h4>Broj posjeta na stranici</h4>
                <h1><?php echo $d->numOfViews(); ?></h1>
            </div>
        	<div id="chart_div" style="height:600px;"></div>
			<?php require_once 'includes/graph.php'; ?>
        </section>
</body>
</html>