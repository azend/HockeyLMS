<?php

$routes = array(
	array('path' => '/hello', 'controller' => 'HelloWorldController', 'action' => 'index', 'method' => 'get'),
	array('path' => '/login', 'controller' => 'LoginController', 'action' => 'index', 'method' => 'get'),
	array('path' => '/login', 'controller' => 'LoginController', 'action' => 'login', 'method' => 'post'),
	'default' => array( 'controller' => 'HelloWorldController', 'action' => 'index', 'method' => 'get'),
	'error' => array( 'controller' => 'HelloWorldController', 'action' => 'index', 'method' => 'get')

);

$selectedRoute = null;

if (isset($_GET['path']) && !empty($_GET['path'])) {
	$path = $_GET['path'];
	$method = strtolower($_SERVER['REQUEST_METHOD']);

	foreach($routes as $route => $opts) {
		if (isset($opts['path'])) {
			if ($path === $opts['path'] && $method === $opts['method']) {
				$selectedRoute = $opts;
				break;
			}	
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
