<?php

require 'vendor/autoload.php';
// Include Config
require('config.php');

$bootstrap = new App\Classes\Bootstrap($_GET);
$controller = $bootstrap->createController();

if ($controller) {
    $controller->executeAction();
}