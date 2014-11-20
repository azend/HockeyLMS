<?php

class Controller {
	protected $viewBag = array();

	public function render() {
		$callingInfo = $this->getCallingInfo();
		$viewFileName = $this->buildViewFileName($callingInfo);
		
		if (file_exists($viewFileName)) {
			$this->isolateRender($viewFileName);
		}
	}

	private function isolateRender($viewPath) {
		explode($viewBag);
		include($viewPath);
	}

	private function buildViewFileName($callingInfo) {
		return 'views/' . str_replace('Controller', '', $callingInfo['class']) . '/' . $callingInfo['function'] . '.php';
	}

	private function getCallingFunction() {
		$stack = debug_backtrace();
		$callingFrame = $stack[2];

		return array('function' => $callingFrame['function'], 'class' => $callingFrame['class']);
	}	
}
