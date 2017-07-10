<?php 
	include('config.php');

	$user = R::dispense('users');
	$user->username = 'admin';
	$user->firstname = 'admin';
	$user->lastname = 'admin';
	$user->password = password_hash('admin', PASSWORD_DEFAULT);
	$user->type = 'superadmin';
	$user->email = 'admin';
	$user->phone = 'admin';
	$user->discount = 0;
	R::store($user);

?>