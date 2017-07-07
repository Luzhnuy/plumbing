<?php include('../configs/config.php'); 
if ($_SESSION): header("Location: index.php");
?>
<?php else: ?>
<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="../src/img/logo.png" type="image/x-icon">
		<title>Реєстрації</title>
		<link rel="stylesheet" href="../src/css/normalize.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="../src/css/signup.css">
	</head>
	<body>
		<div class="image">
			<div class="Menuwoda container">
			<div class="row">
				<div class="blok">
				<form action="../apps/signup.php" method="post">
						<div class="form-group row">
						  <label for="text-input" class="col-2 col-form-label">Name</label>
						  <div class="col-10">
						    <input class="form-control" type="text" placeholder="Name" id="text-input" name="name">
						  </div>
						</div>
						<div class="form-group row">
						  <label for="example-search-input" class="col-2 col-form-label">Lastname</label>
						  <div class="col-10">
						    <input class="form-control" type="text" placeholder="How do I shoot web" id="search-input" name="lastname">
						  </div>
						</div>
						<div class="form-group row">
						  <label for="email-input" class="col-2 col-form-label">Email</label>
						  <div class="col-10">
						    <input class="form-control" type="email" placeholder="bootstrap@example.com" id="email-input" name="email">
						  </div>
						</div>
					
						<div class="form-group row">
						  <label for="tel-input" class="col-2 col-form-label">Telephone</label>
						  <div class="col-10">
						    <input class="form-control" type="tel" placeholder="+380971750340" id="tel-input" name="phone">
						  </div>
						</div>
						<div class="form-group row">
						  <label for="password-input" class="col-2 col-form-label">Password</label>
						  <div class="col-10">
						    <input class="form-control pass" type="password" placeholder="password" id="password-input" name="password">
						  </div>
						</div>
						<div class="form-group row">
						  <label for="confirm" class="col-2 col-form-label">Confirm password</label>
						  <div class="col-10">
						    <input class="form-control conf_pass" type="password" placeholder="password" id="confirm" name="">
						  </div>
						</div>
						<button type="submit" class="btn btn-outline-primary col-sm-4 col-sm-offset-4 sb" id="id_submit">Save</button>			
		     	</form>
		     </div>	
			</div>
		
		</div>
		</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>	
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript" src="../src/js/script.js"></script>
	</body>
	</html>	
<?php endif; ?>