<?php

class Controller {
	protected $viewBag = array();

	private function isolateRender($viewPath) {
		explode($viewBag);
		include($viewPath);
	}

	private function buildViewFileName($functionName) {
		return '../views/' . $functionName . '.php';
	}

	private function getCallingFunction() {
		$stack = debug_backtrace();
		$callingFunction = $stack[2]['function'];

		return $stack;
	}	

	public function render() {
		$functionName = getCallingFunction();
		$viewFileName = buildViewFileName($functionName);
		
		if (file_exists($viewFileName)) {
			isolateRender($viewFileName);
		}
	}
}
