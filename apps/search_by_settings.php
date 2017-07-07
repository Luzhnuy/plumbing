<?php 
	include('../configs/config.php');

	if ($_POST){
		$catalog = intval($_POST['catalog']);
		$from = $_POST['from'];
		$to = $_POST['to'];
		$brand = $_POST['brand'];
		if ($catalog == 0) {
			$search = $_POST['brand'];
			$goods = R::getAll("SELECT * FROM goods WHERE brand = ".$brand." AND cost > ".$from." AND cost < ".$to);
			echo json_encode($goods);
		} else {
			$search = $_POST['brand'];
			$goods = R::getAll("SELECT * FROM goods WHERE brand = ".$brand." AND cost > ".$from." AND cost < ".$to." AND category = ".$catalog);
			echo json_encode($goods);
		}
	}
?>