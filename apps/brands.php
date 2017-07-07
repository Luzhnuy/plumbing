<?php include('../configs/config.php'); 
	

	if ($_POST) {
		if ($_SESSION and $_SESSION['type'] == "superadmin") {
			$name = $_POST['name'];
			$image = $_FILES['picture'];
			if($name and $image){
				$brand = R::dispense("brands");
				$brand->name = $name;
				$image = $_FILES['picture'];
				$image_name = $image['name'];
				$image_path = $image['tmp_name'];
				if(move_uploaded_file($image_path, '../src/brands_images/'.$image_name))
					$pdo->query('UPDATE goods SET image="src/brands_images/'.$image_name.'" WHERE id ='.$brand['id']);
				R::store($brand);
				header('Location:../admin/index.php');
			}
		} else {
			echo "Fuck out";
		}
	} else {
		header("Location:../index.php");
	}