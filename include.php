<?php

// Aggregate all needed files to require
$preSystemIncludes = array('config.php', 'controllers/Controller.php', 'models/Model.php');

$helperIncludes = glob("helpers/*.php");
$controllerIncludes = glob("controllers/*.php");
$modelIncludes = glob("models/*.php");

$postSystemIncludes = array('session.php');

$includes = array_merge($preSystemIncludes, $helperIncludes,  $controllerIncludes, $modelIncludes, $postSystemIncludes);
$includes = array_unique($includes);

foreach($includes as $include) {
	require_once($include);
}
