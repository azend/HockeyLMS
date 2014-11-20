<?php

class Controller {
	protected $viewBag = array();

	public function render() {
		$functionName = $this->getCallingFunction();
		$viewFileName = $this->buildViewFileName($functionName);
		
		if (file_exists($viewFileName)) {
			$this->isolateRender($viewFileName);
		}
	}

	private function isolateRender($viewPath) {
		explode($viewBag);
		include($viewPath);
	}

	private function buildViewFileName($functionName) {
		return 'views/' . $functionName . '.php';
	}

	private function getCallingFunction() {
		$stack = debug_backtrace();
		$callingFunction = $stack[2]['function'];

		return $callingFunction;
	}	
}
