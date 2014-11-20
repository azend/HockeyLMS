<?php

// Aggregate all needed files to require
$systemIncludes = array('config.php', 'controllers/Controller.php', 'models/Model.php');

$helperIncludes = glob("helpers/*.php");
$controllerIncludes = glob("controllers/*.php");
$modelIncludes = glob("models/*.php");

$includes = array_merge($systemIncludes, $helperIncludes,  $controllerIncludes, $modelIncludes);
$includes = array_unique($includes);

foreach($includes as $include) {
	require_once($include);
}
