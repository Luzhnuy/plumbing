<?php 
	include('../configs/config.php');

	if ($_POST){
		$catalog = intval($_POST['catalog']);
		if ($_POST['type'] == 'brands') {
			if ($catalog == 0) {
				$search = $_POST['brand'];
				$goods = R::getAll('SELECT * FROM goods WHERE brand ='.$search);
				echo json_encode($goods);
			} else {
				$search = $_POST['brand'];
				$goods = R::getAll('SELECT * FROM goods WHERE brand ='.$search.' AND category = '.$catalog);
				echo json_encode($goods);
			}
		} else {
			if ($catalog == 0) {
				$search = $_POST['goods'];
				$goods = R::getAll('SELECT * FROM goods WHERE name LIKE "%'.$search.'%" OR description LIKE "%'.$search.'%"');
				echo json_encode($goods);
			} else {
				$search = $_POST['goods'];
				$goods = R::getAll('SELECT * FROM goods WHERE name LIKE "%'.$search.'%" OR description LIKE "%'.$search.'%" AND category = '.$catalog);
				echo json_encode($goods);
			}
		}
	} else {
		header("Location:../index.php");
	}
	

?>