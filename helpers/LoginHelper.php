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

	function isLoggedIn() {
		return $_SESSION['user'] === null;
	}
}
