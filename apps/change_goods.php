<?php include('../configs/config.php'); 
	if ($_POST) {
		if ($_SESSION and $_SESSION['type'] == "superadmin") {
			$name = $_POST['name'];
			$cost = $_POST['cost'];
			$description = $_POST['description'];
			$category = $_POST['category'];
			$brand = $_POST['brand'];
			$currency = $_POST['currency'];
			$id = $_POST['id'];
			$is = 0;
			if (isset($_POST['storage'])) {
				$is = 1;
			}
			$images = $_FILES;
			$gimages = [];
			$noerror = true;
			$old_images_count = $_POST['oldimages'];
			for ($i = 1; $i <= $old_images_count; $i++) {
				if (isset($_POST['oldimage'.$i])) {
					$gimages[] = $_POST['oldimage'.$i];
				}
			}
			foreach ($images as $image) {
				if($image['error'] != 4) {
					if(move_uploaded_file($image['tmp_name'], '../src/goods_images/'.$image['name'])) {
						$gimages[] = 'src/goods_images/'.$image['name'];
					} else {
						$noerror = false;
					}
				}
			}
			$gimages = serialize($gimages);
			if($name and $cost and $description and $category){
				$goods = R::load("goods", $id);
				$goods->name = $name;
				$goods->cost = $cost;
				$goods->description = $description;
				$goods->category = $category;
				$goods->brand = $brand;
				$goods->images = $gimages;
				$goods->currency = $currency;
				$goods->is = $is;
				R::store($goods);
				header('Location:../admin/list/goods.php');
			} else {
				header('Location:../admin/change/goods.php?goods='.$id);
			}
		} else {
			echo "Fuck out";
		}
	} else {
		header("Location:../index.php");
	}