<?php include('../configs/config.php'); ?>
<?php if ($_SESSION): ?>
<?php if ($_SESSION['type'] == 'superadmin'): ?>

	
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<link rel="stylesheet" href="../src/css/normalize.css">
		<link rel="shortcut icon" href="../src/img/logo.png" type="image/x-icon">
		<title>ADD | Goods</title>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css?family=Slabo+27px|Ubuntu" rel="stylesheet">
		<link rel="stylesheet" href="../src/css/admin.css">
	</head>
	<body>
		
		<div class="header">
		    <div class="header-hello">Привіт, <?=$_SESSION['username'];?>! <a href="../apps/logout.php">Вийти</a></div>
		</div>
		<div class="admin-nav">
		    <ul>
		        <a href="........"><li>Список товарів</li></a>
		    </ul>
		</div>

	</body>
</html>	


<?php else: header("Location: ../admin/index.php"); ?>
<?php endif; ?>
<?php else: header("Location: ../admin/index.php"); ?>
<?php endif; ?>
