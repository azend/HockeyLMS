<?php

class DashboardController extends Controller {
	private $lh = null;

	function __construct() {
		$this->lh = new LoginHelper();
	}

	function index () {
		checkLogin();

		render();
	}

	private function checkLogin() {
		if (!$lh->isLoggedIn()) {
			header('Location: ?path=/login');
			die();
		}
	}
}
