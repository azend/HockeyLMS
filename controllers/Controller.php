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
		extract($this->viewBag);
		include($viewPath);
	}

	private function buildViewFileName($callingInfo) {
		return 'views/' . str_replace('Controller', '', $callingInfo['class']) . '/' . $callingInfo['function'] . '.php';
	}

	private function getCallingInfo() {
		$stack = debug_backtrace();
		$callingFrame = $stack[2];

		return array('function' => $callingFrame['function'], 'class' => $callingFrame['class']);
	}	
}
