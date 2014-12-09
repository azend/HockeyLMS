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

	private function checkLogin() {
		if (!$this->lh->isLoggedIn()) {
			header('Location: ?path=/login');
			die();
		}
	}
}
