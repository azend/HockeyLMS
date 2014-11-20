<?php

class DashboardController extends Controller {
	private $lh = null;

	function __construct() {
		$this->lh = new LoginHelper();
	}

	function index () {
		$this->checkLogin();

		$this->render();
	}

	private function checkLogin() {
		if (!$this->lh->isLoggedIn()) {
			header('Location: ?path=/login');
			die();
		}
	}
}
