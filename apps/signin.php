<?php 
	include('../configs/config.php');

	if ($_POST) {
        $user_exist = false;
		$users = R::getAll( 'SELECT * FROM users');
		$email = $_POST['email'];
        $password = $_POST['password'];
        foreach ( $users as $u ) {
            if ( strtolower($u['email']) == strtolower($email) ) {
                $user = $u;
                $user_exist = true;
            }
        }
        if ($user_exist == true) {
            if (strtolower($user['password']) == strtolower($password)) {
                $_SESSION = $user;
                header("Location: ../index.php");
            } else {
                header("Location: ../index.php?wrong=password");
            }
        } else {
            header("Location: ../index.php?wrong=username");
        }
	}

?>