<?php include('../configs/config.php'); 

	if ($_GET) {
		if ($_SESSION and $_SESSION['type'] == "superadmin") {
			$news = $_GET['news'];
			R::exec("DELETE FROM news WHERE id = ".$news);
			header("Location:../admin/list/news.php");
		} else {
			header("Location:../admin/");
		}
	} else {
		header("Location:../index.php");
	}