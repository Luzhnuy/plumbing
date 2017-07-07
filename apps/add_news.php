<?php include('../configs/config.php'); 
	if ($_POST) {
		if ($_SESSION and $_SESSION['type'] == "superadmin") {
			$name = $_POST['name'];
			$text = $_POST['text'];
			$image = $_FILES['picture'];
			// if($name and $text and $image){
			$news = R::dispense("news");
			$news->name = $name;
			$news->text = $text;
			$news->image = $image;
			R::store($news);

			header('Location:../admin/list/news.php');
			//}
		} else {
			echo "Fuck out";
		}
	} else {
		header("Location:../index.php");
	}