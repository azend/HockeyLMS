<?php

class LoginController extends Controller {
	function index () {
		$this->render();
	}

	function login () {
		/*
		$fv = new FormValidator();

		$fv->enforceMethod('POST');
		$fv->enforce('email', array('required' => true));
		$fv->enforce('password', array('required' => true));
		
		if($fv->validate()) {
			print_r($_POST);
		}
		 */

		$lh = new LoginHelper();
		$lh->login($_POST['email'], $_POST['password']);

		if ($lh->isLoggedIn()) {
			header('Location: ' . UrlHelper::genUrl('dashboard'));
		}
		else {
			header('Location: ' . UrlHelper::genUrl('login'));
		}
	}

	function logout () {
		$lh = new LoginHelper();

		if ($lh->isLoggedIn()) {
			$lh->logout();
		}

		header('Location: ' . UrlHelper::genUrl('login'));
	}

	function register () {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if (isset($_POST['username']) && !empty($_POST['username']) &&
				isset($_POST['email']) && !empty($_POST['email']) &&
				isset($_POST['password']) && !empty($_POST['password'])) {
				
				$username = $_POST['username'];
				$email = $_POST['email'];
				$password = $_POST['password'];
				
				// Register the user
				$lh = new LoginHelper();
				$user = $lh->register($username, $email, $password);

				$this->viewBag['result'] = 'REGISTERED';
				$this->viewBag['user'] = $user;
				
			}
			else {
				$this->viewBag['result'] = 'INVALID_PARAMS';
			}
		}
		$this->render();
	}

	function forgotPassword () {
		$um = new UserModel();
		$user = $um->find($_POST['email']);
		
		if (isset($user) && $user) {
			$r = rand(1000, 9999);

			mail(
				$user->email,
				'Password reset',
				'Your password reset code is '.$r.'.'
			);

			$_SESSION['passwordResetCode'] = $r;

			$this->viewBag['user'] = $user;
			$this->render();
		}
		else {
			header('Location: ' . UrlHelper::genUrl('login'));
		}
	}

	function resetPassword () {
		if (isset($_POST['email']) && !empty($_POST['email']) &&
			isset($_POST['resetCode']) && !empty($_POST['resetCode'])) {
			$email = $_POST['email'];
			$resetCode = $_POST['resetCode'];	

			$this->render();
		}	
	}
}
