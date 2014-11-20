<?php

$routes = array(
	'/hello' => array( 'controller' => 'HelloWorldController', 'action' => 'index', 'method' => 'get')
	'default' => array( 'controller' => 'HelloWorldController', 'action' => 'index', 'method' => 'get')
	'error' => array( 'controller' => 'HelloWorldController', 'action' => 'index', 'method' => 'get')

);

$controller = 'HelloWorldController';
$action = 'index';
$method = 'get';

$selectedRoute = 

if (isset($_GET['path']) && !empty($_GET['path'])) {
	$path = $_GET['path'];

	foreach($routes as $route => $opts) {
		if ($route === $path) {
			$selectedRoute = $route;
		}	
		break;
	}

	if (!$selectedRoute) {
		$selectedRoute = $routes['error'];
	}

}
else {
	$selectedRoute = $route['default'];
}

$controller = $selectedRoute['controller'];
$action = $selectedRoute['action'];
$method = $selectedRoute['method'];

$instance = new $controller();
$instance->$action();
