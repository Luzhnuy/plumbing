<?php 
	include('../configs/config.php'); 
	

	if ($_POST) {
		if ($_SESSION and $_SESSION['type'] == "superadmin") {
			$name = $_POST['name'];
			$cost = $_POST['cost'];
			$description = $_POST['description'];
			$category = $_POST['category'];
			$brand = $_POST['brand'];
			$currency = $_POST['currency'];
			$images = $_FILES;
			$gimages = [];
			$noerror = true;
			foreach ($images as $image) {
				if(move_uploaded_file($image['tmp_name'], '../src/goods_images/'.$image['name'])) {
					$gimages[] = 'src/goods_images/'.$image['name'];
				} else {
					$noerror = false;
				}
			}
			$gimages = serialize($gimages);
		 	if($name and $cost and $description and $noerror == true and $category){
				$goods = R::dispense("goods");
				$goods->name = $name;
				$goods->cost = $cost.'';
				$goods->description = $description;
				$goods->category = $category;
				$goods->brand = $brand;
				$goods->sales = 0;
				$goods->currency = $currency;
				$goods->images = $gimages;
				$goods->data_add = date('h-i-s j-m-y');
				R::store($goods);
				header('Location:../admin/index.php');
			} else {
				header("Location:../admin/add/goods.php");
			}
		} else {
			echo "kek";
		}
	} else {
		header("Location:../index.php");
	}