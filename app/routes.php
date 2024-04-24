<?php
/**
 * Basic controllers namespace.
 * Do not change it if you don't want to change default autoload folder.
 */
$controllers = 'TanksBattle\\Controllers\\';
/**
 * Routes array to match a given URL to a controller method.
 * Wildcards allowed as an argument, but use carefully, do not use them without a '/' before !
 */
$routes = [
  '/' => 'GameController::index',
  '/prepare' => 'GameController::prepare',
  '/game' => 'GameController::run',
  '/api/v1/*' => 'GameController::api'
];