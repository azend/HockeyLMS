<?php

class LoginController extends Controller {
	function index () {
		$this->render();
	}

	function login () {
		$fv = new FormValidator();

		$fv->enforceMethod('POST');
		$fv->enforce('email', array('required' => true));
		$fv->enforce('password', array('required' => true));
		
		if($fv->validate()) {
			print_r($_POST);
		}
	}
}
