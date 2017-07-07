<?php include('../../configs/config.php');  
$categories = R::getAll("SELECT * FROM categories ORDER BY category ASC");
$lastgoods = R::getAll("SELECT * FROM goods ORDER BY id DESC LIMIT 2"); 
$goods = R::getAll("SELECT * FROM goods");
$random = rand(0, count($goods)-1);
$random_goods = $goods[$random];
$brands = R::getAll("SELECT * FROM brands");
$hots = R::getAll("SELECT * FROM goods ORDER BY sales DESC LIMIT 2");
$countg = 0;
$summ = 0;
$basket = R::getAll("SELECT * FROM basket");
foreach ($basket as $b) {
	if ($_SESSION['id'] == $b['client']) {
		$countg = $countg + 1;
		$summ = $summ + R::getCell("SELECT cost FROM goods WHERE id =".$b['goods']);
	}
}
?>
<!DOCTYPE html> 
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
		<title>Plumbing</title>

		<!-- Normalize.css-->
		<link rel="stylesheet" href="../css/normalize.css">

		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            
		<!-- Double Range -->
  		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

		<!-- Our styles -->
		<link rel="stylesheet" href="../css/style.css">
		<link rel="stylesheet" href="../css/responsive.css">
	</head>
	<body>
		<header>
			<div class="container">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6 padinishka">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<a class="navbar-brand" href="/"><img src="../img/big-logo.png" alt=""></a>
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-3 padinishka">
						<button class="btn btn-default back-call">Зворотній зв'язок</button>
					</div>
					<div class="back_call_div">
						<form action="apps/back_call.php" method="post" class="kek">
							<div class="form-group row ">
  								<label for="example-tel-input" class="col-2 col-form-label">Введіть ваш телефон і ми вам передзвоним</label>
  								<div class="col-10">
    								<input class="form-control" name="phone" type="tel" placeholder="+38-(095)-322-4546" id="example-tel-input">
  								</div>
							</div>
							<button type="submit" class="btn btn-default back_call_sb">Відправити</button>
						</form>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-3 padinishka">
						<span class="contact-span">
							<span><img src="../img/tel.png"></span>+(067)966-80-07
						</span>
						<span class="contact-span">
							<span><img src="../img/web.png"></span>nazar.l@ukr.net
						</span>
						<span class="contact-span">
							<span><img src="../img/fb.png"></span>Назар Сантехніка
						</span>
					</div>
				</div>
			</div>
			<nav class="navbar navbar-default">
			    <div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-menu-col" aria-expanded="false">
						    <span class="sr-only">Toggle navigation</span>
						    <span class="icon-bar"></span>
						    <span class="icon-bar"></span>
						    <span class="icon-bar"></span>
						</button>
					</div>
					<div class="collapse navbar-collapse nav-menu-col" id="nav-menu-col">
						<ul class="nav navbar-nav navbar-nav-drop">
							<li class="active">
								<a href="#!">Головна</a>
							</li>
						</ul>
						<ul class="nav navbar-nav navbar-nav-drop">
							<li>
								<a href="../template/about_us.php">Про нас</a>
							</li>
						</ul>
						<ul class="nav navbar-nav navbar-nav-drop">
							<li>
								<a href="../template/payment_and_delivery.php">Оплата і доставка</a>
							</li>
						</ul>
						<ul class="nav navbar-nav navbar-right nav-form">
							<li>
								<form class="navbar-form navbar-left">
									<div class="form-group">
										<input type="text" id="catalog_name" style="display: none" value="0">
										<input type="text" class="form-control search" placeholder="Пошук..." name="search">
									</div>
									<span class="btn btn-default btn-search srch"><img src="../img/searching.png"></span>
								</form>
							</li>
						</ul>
					</div><!-- /.navbar-collapse -->
			    </div><!-- /.container-fluid -->
			</nav>
		</header>

		<section>
			<div class="section-header">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-4 col-md-3">
							<div class="dropdown">
							  <button class="btn btn-default dropdown-toggle btn-catalog" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span><img src="../img/list.png"></span>Каталог товарів</button>
							  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
							    <?php foreach($categories as $category): ?>
									<li><a href="catalog.php?catalog=<?=$category['category'];?>"><?=$category['category'];?></a></li>
								<?php endforeach; ?>
							  </ul>
							</div>
						</div>
						<div class="col-xs-6 col-sm-2 col-md-3">
							<span class="sh-span" id="countg"><img src="../img/cart.png"> <?=$countg;?> товарів</span>
						</div>
						<div class="col-xs-6 col-sm-2 col-md-3">
							<span class="sh-span" id="summ">всього: <?=$summ;?> грн</span>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-3">
						<? if($_SESSION) {
							echo '<a href="admin/index.php"><button class="btn btn-default dropdown-toggle btn-my-room" type="button" id="btn-my-room" aria-haspopup="true" aria-expanded="true"><span><img src="../img/user.png"></span>Мій кабінет</button></a>';
						} else {
							echo '<a href="admin/index.php"><button class="btn btn-default dropdown-toggle btn-my-room" type="button" id="btn-my-room" aria-haspopup="true" aria-expanded="true"><span><img src="../img/user.png"></span>Вхід</button></a> ';
							echo '<a href="admin/signup.php"><button class="btn btn-default dropdown-toggle btn-my-room" type="button" id="btn-my-room" aria-haspopup="true" aria-expanded="true"><span><img src="../img/user.png"></span>Реєстрація</button></a>';
						}
						?>	 
						</div>
					</div>
				</div>
			</div>
			<div class="section-body">
				<div class="container">
					<div class="row">
						<div class="com-xs-12 col-sm-8 col-md-6 col-md-offset-3">
							<h2>Ванни</h2>
							<div class="sb-settings">
								<span class="sb-span settings" data-status="hidden"><!-- <button class="settings"> --><span><img src="../img/gear.png"></span><!-- </button> --> Налаштування пошуку</span>
								<div class="toggle">
								<form action="">
									<div class="row">
										<div class="cil-xs-12 col-md-4">
											<div class="form-group">
											    <label for="price-from">Ціна, від(грн)</label>
											    <input type="text" class="form-control" id="price-from" placeholder="Пошук..." name="from">
											</div>
										</div>
										<div class="cil-xs-12 col-md-4">
											<div class="form-group">
											    <label for="price-to">Ціна, до(грн)</label>
											    <input type="text" class="form-control" id="price-to" placeholder="Пошук..." name="to">
											</div>
										</div>
										<div class="cil-xs-12 col-md-4">
											<div class="form-group">
											    <label for="brand">Бренд</label>
											    <select class="form-control" id="brand" name="brand">
												<? foreach($brands as $brand): ?>
												<option value='<?=$brand['id'];?>'><?=$brand['name']; ?></option>
												<? endforeach; ?>
											</select>
											</div>
										</div>
										<div class="col-xs-12 col-md-8">
											<div class="form-group form-group-range">
												<div id="slider-range"></div>
											</div>
										</div>
										<div class="col-xs-12 col-md-4 col-md-offset-8">
											<span  class="btn btn-default btn-search-sb" >Знайти</span>
										</div>
									</div>
								</form>
								</div>
							</div>
							<div class="sb-ware">
								<span class="sb-span star"><span><img src="../img/star.png"></span>Хіти продажу</span>
								<div class="row">
         <div class="col-sm-6">
          <h3>Унітаз "Агент-007"</h3>
         </div>
         <div class="col-sm-4 col-sm-offset-2">
          <h3 class="h3-right">210.00 Грн<img src="../img/tags.png"></h3 class="h3-right">
         </div>
        </div>
        <div class="row">
         <div class="col-sm-3">
          <div class="ware-img">
           <img src="../img/tron.jpg">
          </div>
         </div>
         <div class="col-sm-9">
          <div class="row">
           <div class="col-sm-12">
            <div class="ware-text">
             <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
             </p>
            </div>
           </div>
           <div class="col-sm-7 col-sm-offset-5">
            <button type="submit" class="btn btn-default btn-add-basket"><img src="../img/cart.png">Додати в кошик</button>
           </div>
          </div>
         </div>
        </div> 
									<?php foreach($hots as $g): ?>
									<div class="col-xs-6 col-sm-6 col-md-6 border-right">
										<h3 class="h3-center"><?=$g['name'];?></h3>
										<div class="ware-img"><img src="<?=$g['image'];?>"></div>
										<h3 class="h3-center"><?=$g['cost'];?> Грн<img src="../img/tags.png"></h3 class="h3-right">
										<div class="btn-add-center" data-id="<?=$g['id'];?>"><span class="btn btn-default btn-add-basket"><img src="../img/cart.png">Додати в кошик</span></div>
									</div>
									<?php endforeach;?>
								</div>
							</div>
							<div class="sb-ware">
								<span class="sb-span jewel"><span><img src="../img/jewel.png"></span>Нові надходження</span>
								<div class="row">
									<?php foreach ($lastgoods as $l): ?>
									<div class="col-xs-12 col-md-6 border-right">
										<h3 class="h3-center"><?=$l['name'];?></h3>
										<div class="ware-img"><img src="<?=$l['image'];?>"></div>
										<h3 class="h3-center"><?=$l['cost'];?> Грн.<img src="../img/tags.png"></h3 class="h3-right">
										<div class="btn-add-center" data-id="<?=$l['id'];?>"><span class="btn btn-default btn-add-basket"><img src="../img/cart.png">Додати в кошик</span></div>
									</div>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-3">
							<div class="random-ware">
								<h3>Випадковий товар</h3>
								<h5><?=$random_goods['name'];?></h5>
								<div class="random-ware-img"><img src="<?=$random_goods['image'];?>" alt=""></div>
								<h3 class="h3-center"><?=$random_goods['cost'];?> Грн.<img src="../img/tags.png"></h3>
								<h6><a href="goods.php?goods=<?=$random_goods['id'];?>">Детальніше...</a></h6>
							</div>
							<div class="random-ware">
								<h3>Реклама брендів</h3>
								<h5>Унітаз "Агент-007"</h5>
								<div class="random-ware-img"><img src="../img/tron.jpg" alt=""></div>
								<h3 class="h3-center">210.00 Грн<img src="../img/tags.png"></h3>
								<h6><a href="">Детальніше...</a></h6>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="section-slider">
			<div class="slider">
				<div class="container-fluid">
				  <div id="myCarousel" class="carousel slide" data-ride="carousel">
				    <!-- Wrapper for slides -->
				    <div class="carousel-inner">
				      <div class="item active">
				        <div class="row">
				        	<div class="col-xs-1 col-sm-1 col-md-1"></div>
				        	<div class="col-xs-5 col-sm-2 col-md-2 vert-align-center">
				        		<img src="<?=$brands[0]['image'];?>" alt="<?=$brands[0]['name'];?>" data-id="<?=$brands[0]['id'];?>" class="do-search-brand">
				        	</div>
				        	<div class="col-xs-5 col-sm-2 col-md-2 vert-align-center">
				        		<img src="<?=$brands[1]['image'];?>" alt="<?=$brands[1]['name'];?>" data-id="<?=$brands[1]['id'];?>" class="do-search-brand">
				        	</div>
				        	<div class="col-xs-5 col-xs-offset-1 col-sm-2 col-md-2 vert-align-center">
				        		<img src="<?=$brands[2]['image'];?>" alt="<?=$brands[2]['name'];?>" data-id="<?=$brands[2]['id'];?>" class="do-search-brand">
				        	</div>
				        	<div class="col-xs-5 col-sm-2 col-md-2 vert-align-center">
				        		<img src="<?=$brands[3]['image'];?>" alt="<?=$brands[3]['name'];?>" data-id="<?=$brands[3]['id'];?>" class="do-search-brand">
				        	</div>
				        	<!-- <div class="col-xs-12 col-sm-2 col-md-2 vert-align-center">
				        		<img src="../img/cersanit.png" alt="cersanit">
				        	</div> -->
				        	<div class="col-xs-1 col-sm-1 col-md-1"></div>
				        </div>
				      </div>

				      <div class="item">
				        <div class="row">
				        	<div class="col-xs-1 col-sm-1 col-md-1"></div>
				        	<!-- <div class="col-xs-12 col-sm-2 vert-align-center">
				        		<img src="../img/wavin.png" alt="wavin">
				        	</div> -->
				        	<div class="col-xs-5 col-sm-2 vert-align-center">
				        		<img src="<?=$brands[4]['image'];?>" alt="<?=$brands[4]['name'];?>" data-id="<?=$brands[4]['id'];?>" class="do-search-brand">
				        	</div>
				        	<div class="col-xs-5 col-sm-2 vert-align-center">
				        		<img src="<?=$brands[5]['image'];?>" alt="<?=$brands[5]['name'];?>" data-id="<?=$brands[5]['id'];?>" class="do-search-brand">
				        	</div>
				        	<div class="col-xs-5 col-sm-2 vert-align-center">
				        		<img src="<?=$brands[6]['image'];?>" alt="<?=$brands[6]['name'];?>" data-id="<?=$brands[6]['id'];?>" class="do-search-brand">
				        	</div>
				        	<div class="col-xs-5 col-xs-offset-1 col-sm-2 vert-align-center">
				        		<img src="<?=$brands[7]['image'];?>" alt="<?=$brands[7]['name'];?>" data-id="<?=$brands[7]['id'];?>" class="do-search-brand">
				        	</div>
				        	<div class="col-xs-1 col-sm-1 col-md-1"></div>
				        </div>
				      </div>
				    </div>

				    <!-- Left and right controls -->
				    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
				      <span class="glyphicon glyphicon-chevron-left"></span>
				      <span class="sr-only">Previous</span>
				    </a>
				    <a class="right carousel-control" href="#myCarousel" data-slide="next">
				      <span class="glyphicon glyphicon-chevron-right"></span>
				      <span class="sr-only">Next</span>
				    </a>
				  </div>
				</div>
			</div>
			</div>
		</section>
		<footer> 
		    <div class="container">
		    	<div class="row">
		    		<div class="col-sm-12 col-md-6">
		    			<nav class="navbar navbar-default navbar-footer">
					        <ul class="nav navbar-nav">
					            <li><a href="#!">Головна</a></li>
					            <li><a href="#!">Оплата та доставка</a></li>
					            <li><a href="#!">Про нас</a></li>
					        </ul>
						</nav>
		    		</div>
		    	</div>
		    	<div class="row">
		    		<div class="col-sm-12 col-md-5">
		    				<div class="contact-span-div">
								<span class="contact-span">
									<span><img src="../img/tel-white.png"></span>+(067)966-80-07
								</span>
								<span class="contact-span">
									<span><img src="../img/web-white.png"></span>nazar.l@ukr.net
								</span>
								<span class="contact-span">
									<span><img src="../img/fb-white.png"></span>Назар Сантехніка
								</span>
							</div>
							<div class="catalog-ware">
								<div class="catalog">
									<h4>Каталог товарів</h4><br>
									<span>Біде</span>
									<span>Ванни</span>
									<span>Верхні душі</span>
									<span>Душові двері</span>
									<span>Душові кабіни</span>
									<span>Душові піддони</span>
									<span>Кухонні мийки</span>
									<span>Меблі для ванної</span>
									<span>Сифони</span>
									<span>Змішувачі</span>
									<span>Умивальники</span>
									<span>Шторки для ванної</span>
									<span>Душові стійки та гідромасажні панелі</span>
									<span>Унітази</span>
								</div>
							</div>
		    		</div>
		    		<div class="col-sm-12 col-md-6 col-md-offset-1">
		    			<iframe src="https://www.google.com/maps/d/embed?mid=1yFzSlwXqkVHU7LcWh9ovnuJPeGQ" width="100%" height="230"></iframe>
		    			<h4 class="h4-span">
		    				<span><img src="../img/location.png" alt=""></span>
		    			</h4>
		    			<h4 class="h4-span">
		    				<span>Львів</span>
		    				<span>Вул. Монастирського 2</span>
		    				<span>Ринок промисловий</span>
		    			</h4>
		    		</div>
		    	</div>
		    </div>
 		
		</footer><!--DANGEROUS-->

		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> <!-- Double Range -->
		<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
		<script src='../js/script.js'></script>
		<script src="../js/back_connect.js"></script>
		<script src="../js/settings_toggle.js"></script>
		<script src="../js/search_ajax.js"></script>
		<script src="../js/search_brands.js"></script>
		<script src="../js/search_ajax_by_settings.js"></script>
		<script src="../js/purchase.js"></script>
	</body>
</html>