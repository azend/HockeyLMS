<?php

class DashboardController extends Controller {
	private $lh = null;

	function __construct() {
		$this->lh = new LoginHelper();
		$this->checkLogin();
	}

	function index () {
		$this->viewBag['user'] = $this->lh->getUser();
		$this->render();
	}

	function schedule () {
		$user = $this->lh->getUser();

		if ($user->userRole === UserRoles::COACH) {
			$this->viewBag['user'] = $user;
			$this->render();
		}
		else {
			header('Location: ' . UrlHelper::genUrl('dashboard'));
		}
	}

	private function checkLogin() {
		if (!$this->lh->isLoggedIn()) {
			header('Location: ' . UrlHelper::genUrl('login'));
			die();
		}
	}
}
