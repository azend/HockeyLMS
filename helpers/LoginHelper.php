<?php

class LoginHelper {
	private $user = null;

	function login($email, $password) {
		$um = new UserModel();
		$user = $um->find($email);

		if ($user) {
			if (validate_password($password, $user->passwordHash)) {
				// Logged in
				$this->user = $user;
			}
		}
	}

	function logout() {
		$this->user = null;
	}

	function isLoggedIn() {
		return $this->user === null;
	}
}
