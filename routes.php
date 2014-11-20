<?php

$routes = array(
	'/hello' => array( 'controller' => 'HelloWorldController', 'action' => 'index', 'method' => 'get'),
	'/login' => array( 'controller' => 'LoginController', 'action' => 'index', 'method' => 'get'),
	'default' => array( 'controller' => 'HelloWorldController', 'action' => 'index', 'method' => 'get'),
	'error' => array( 'controller' => 'HelloWorldController', 'action' => 'index', 'method' => 'get')

);

$selectedRoute = null;

if (isset($_GET['path']) && !empty($_GET['path'])) {
	$path = $_GET['path'];

	foreach($routes as $route => $opts) {
		if ($route === $path) {
			$selectedRoute = $opts;
			break;
		}	
	}

	if (!$selectedRoute) {
		$selectedRoute = $routes['error'];
	}

}
else {
	$selectedRoute = $routes['default'];
}

$controller = $selectedRoute['controller'];
$action = $selectedRoute['action'];
$method = $selectedRoute['method'];

$instance = new $controller();
$instance->$action();
