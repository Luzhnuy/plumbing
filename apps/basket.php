<?php 
	include('../configs/config.php');
	// if ($_POST) {
		if ($_SESSION) {
			$basket = R::dispense('basket');
			$basket->client = $_SESSION['id'];
			$basket->goods = $_POST["goods"];
			R::store($basket);
			$story = R::dispense('history');
			$story->story = $_SESSION['firstname']." ".$_SESSION['lastname']."[".$_SESSION['phone']."] додав до кошика ".R::getCell("SELECT name FROM goods WHERE id = ?", [ $_POST['goods'] ]);
			$story->date = date("d.m.Y, H:i");
			R::store($story);	
			$countg = 0;
			$summ = 0;
			$basket = R::getAll("SELECT * FROM basket");
			$goods = R::getAll("SELECT * FROM goods");
			$usd = json_decode(file_get_contents("https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?valcode=USD&json"));
			$eur = json_decode(file_get_contents("https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?valcode=EUR&json"));
			$usd_rate = intval($usd[0]->rate);
			$eur_rate = intval($eur[0]->rate);
			$discount = $_SESSION['discount'];
			if (strlen($discount == 1)) {
				$discount = 0.01;
			} elseif (strlen($discount == 2)) {
				// $discount = 0.10;
				echo $discount;
			}

			// echo var_dump($_SESSION);
			// foreach ($basket as $b) {
			// 	if ($_SESSION['id'] == $b['client']) {
			// 		$countg = $countg + 1;
			// 		if (R::getCell("SELECT currency FROM goods WHERE id = ?", [ $b['goods'] ]) == 0) {
			// 			$gcost = R::getCell("SELECT cost FROM goods WHERE id = ?", [ $b['goods'] ]) * $usd_rate;
			// 			$gcost = $gcost - ( $gcost * $_SES )
			// 			$summ = $summ + 
			// 		} elseif (R::getCell("SELECT currency FROM goods WHERE id = ?", [ $b['goods'] ]) == 1) {
			// 			$gcost = R::getCell("SELECT cost FROM goods WHERE id = ?", [ $b['goods'] ]) * $eur_rate;
			// 			$summ = $summ + 
			// 		}
			// 	}
			// }
			$vars = [$countg, $summ];
			// echo json_encode($vars);
		} else {
			echo json_encode("nologon");
		}
	// } else {
	// 	// header("Location:../index.php");
	// }

?>