<?php

class LoginHelper {

	function login($email, $password) {
		$um = new UserModel();
		$user = $um->find($email);

		if ($user) {
			if (validate_password($password, $user->passwordHash)) {
				// Logged in
				$_SESSION['user'] = $user;
			}
		}
	}

	function logout() {
		$_SESSION['user'] = null;
	}

	function register($username, $email, $password) {
		$user = new User();
		$user->username = $username;	
		$user->email = $email;
		$user->passwordHash = create_hash($password);
		$user->isActivated = false;
		$user->userRole = UserRoles::PLAYER;

		$um = new UserModel();
		$user = $um->create($user);
		
		$_SESSION['user'] = $user;

		return $user;
	}	

	function isLoggedIn() {
		return isset($_SESSION['user']) && $_SESSION['user'] != null;
	}

	function getUser() {
		return isset($_SESSION['user']) && $_SESSION['user'] != null ? $_SESSION['user'] : NULL;
	}
}
