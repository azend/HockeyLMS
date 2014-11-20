<?php

function isHttpGet() {
	$isGet = false;

	if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
		$isGet = true;
	}

	return $isGet;
}

function isHttpPost() {
	$isPost = false;

	if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
		$isPost = true;
	}

	return $isPost;
}

class FormValidator {

	private $method = 'REQUEST';
	private $rules = array();

	function enforce ( $field, $strategy ) {
		$this->rules[$field] = $strategy;
	}

	function enforceMethod ( $method ) {
		switch ( $method ) {
			case 'GET':
			case 'POST':
			case 'REQUEST':
				$this->method = $method;
				break;
			default:
				break;
		}
	}

	function validate () {
		$isValid = true;

		if ( $_SERVER['REQUEST_METHOD'] == $this->method ) {

			$formData = null;

			switch($this->method) {
				case 'GET':
					$formData = $_GET;
					break;
				case 'POST':
					$formData = $_POST;
					break;
				default:
					$formData = $_REQUEST;
					break;
			}

			foreach ( $this->rules as $field => $strategy ) {

				if ( isset($formData[$field]) ) {
					if ( (!isset($strategy['required']) || $strategy['required']) && empty($formData[$field]) ) {
						// User missed a required field
						$isValid = false;
						break;
					}

					if ( !isset($strategy['regex']) || $strategy['regex'] ) {
						if ( !preg_match($strategy['rule'], $formData[$field]) ) {
							// User did not meet required regex
							$isValid = false;
							break;
						}
					}
					else {
						if ( $formData[$field] !== $strategy['rule']) {
							// User did not enter required information
							// NOTE: This is intended to be used for password confirmations and CAPTCHAs
							$isValid = false;
							break;
						}
					}

				}
				else {
					// User hasn't passed in the correct form data parameter
					$isValid = false;
					break;
				}
			}


		}
		else {
			$isValid = false;
		}

		
		return $isValid;
	}
}

// Debug ofc
if ( isHttpGet() ) { ?>

<form action="" method="POST">
	<input id="deviceId" name="deviceId" type="text">
	<input id="status" name="status" type="text">
	<input type="submit" value="Push status">
</form>

<?php }