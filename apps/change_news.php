<?php include('../configs/config.php'); 
	if ($_POST) {
		if ($_SESSION and $_SESSION['type'] == "superadmin") {
			$name = $_POST['name'];
			$text = $_POST['text'];
			$image = $_FILES['picture'];
			$id = $_POST['id'];
			// if($name and $text and $image){
			$news = R::load("news", $id);
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