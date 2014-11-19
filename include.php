<?php

// Aggregate all needed files to require
$systemIncludes = array('models/Model.php');

$controllerIncludes = glob("controllers/*.php");
$modelIncludes = glob("models/*.php");

$includes = array_merge($systemIncludes, $controllerIncludes, $modelIncludes);
$includes = array_unique($includes);

foreach($includes as $include) {
	require_once($include);
}
