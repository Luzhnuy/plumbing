<?php include('../configs/config.php'); 

	if ($_GET) {
		if ($_SESSION and $_SESSION['type'] == "superadmin") {
			$category = $_GET['category'];
			R::exec("DELETE FROM categories WHERE id = ".$category);
			header("Location:../admin/list/categories.php");
		} else {
			header("Location:../admin/");
		}
	} else {
		header("Location:../index.php");
	}