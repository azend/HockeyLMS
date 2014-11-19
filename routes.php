<?php

$routes = array(
	'/hello' => array( 'controller' => 'HelloWorldController', 'action' => 'index', 'method' => 'get');

);

$path = $_GET['path'];

foreach($routes as $route => $opts) {
	if ($route === $path) {
		$controller = $opts['controller'];
		$action = $opts['action'];

		$instance = new $controller();
		$instance->$action;
	}	
}
