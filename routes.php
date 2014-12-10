<?php

$routes = array(
	array('path' => '/hello', 'controller' => 'HelloWorldController', 'action' => 'index', 'method' => 'get'),
	array('path' => '/login', 'controller' => 'LoginController', 'action' => 'index', 'method' => 'get'),
	array('path' => '/login', 'controller' => 'LoginController', 'action' => 'login', 'method' => 'post'),
	array('path' => '/logout', 'controller' => 'LoginController', 'action' => 'logout', 'method' => 'get'),
	array('path' => '/register', 'controller' => 'LoginController', 'action' => 'register', 'method' => 'get'),
	array('path' => '/register', 'controller' => 'LoginController', 'action' => 'register', 'method' => 'post'),
	array('path' => '/forgotPassword', 'controller' => 'LoginController', 'action' => 'forgotPassword', 'method' => 'post'),
	array('path' => '/resetPassword', 'controller' => 'LoginController', 'action' => 'resetPassword', 'method' => 'post'),
	array('path' => '/dashboard', 'controller' => 'DashboardController', 'action' => 'index', 'method' => 'get'),
	'default' => array( 'controller' => 'StaticPagesController', 'action' => 'frontPage', 'method' => 'get'),
	'error' => array( 'controller' => 'HelloWorldController', 'action' => 'index', 'method' => 'get')

);

$selectedRoute = null;

if (isset($_GET['path']) && !empty($_GET['path'])) {
	$path = $_GET['path'];
	$method = strtolower($_SERVER['REQUEST_METHOD']);

	if (REWRITE_ENABLED) {
		$path = '/' . $path;
	}

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
