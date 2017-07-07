<?php 
	include('config.php');

	$user = R::dispense('users');
	$user->username = 'Nazar';
	$user->firstname = 'somelastname';
	$user->lastname = 'somelastname';
	$user->password = 'admin';
	$user->type = 'superadmin';
	$user->email = 'nazar.l@ukr.net';
	$user->phone = '+(067)966-80-07';
	$user->discount = 0;
	R::store($user);



?>