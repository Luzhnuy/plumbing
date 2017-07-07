<?php include('../configs/config.php'); 
	

	if ($_POST) {
		if ($_SESSION and $_SESSION['type'] == "superadmin") {
			$name = $_POST['name'];
			// if($name and $cost and $description and $image and $category){
			$category = R::dispense("categories");
			$category->category = $name;
			R::store($category);
			header('Location:../admin/list/categories.php');
			//}
		} else {
			echo "Fuck out";
		}
	} else {
		header("Location:../index.php");
	}