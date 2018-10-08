<?php

require '../../class/db.php';

$db = new DB();

$header = $_POST['header'];
$text = $_POST['text'];

$d = date("d");
$m = date("m");
$y = date("y");

$insert = "INSERT INTO `product` (`header`,`text`,`d`,`m`,`y`) 
		   VALUES ('{$header}', '{$text}', '{$d}', '{$m}', '{$y}')";
$db->action($insert); 

$query = $db->query("product");
$id = 0;
while($row = $query -> fetch()){
	$id = $row['id'];
}

echo $id;

$photos = explode(",", $_POST['photos']);
foreach($photos as $photo){
	$db->action("INSERT INTO `photos` (`name`,`idofpost`) VALUES ('{$photo}', '{$id}' )" );
}
