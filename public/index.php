<?php
// Basic initialization 
declare(strict_types=1);
require_once __DIR__ . '/../vendor/autoload.php';
require_once  __DIR__ . '/../app/routes.php';
// Twig cofnig
$loader = new \Twig\Loader\FilesystemLoader( __DIR__ . '/../views');
$twig = new \Twig\Environment($loader, []);
// Front controller for routes - basic url filtering
$url = htmlspecialchars(strtok($_SERVER["REQUEST_URI"], '?'));
array_walk($routes, function($v, $k) use($url, $controllers, $twig){
  $arg = (stripos($k, '*') !== FALSE) ? explode('/*', $k)[0] : NULL;
  if ($k === $url || ($arg && stripos($url, $arg) !== FALSE)) {
    $s = explode('::', $v);
    $obj = $controllers.$s[0];
    $c = new $obj($twig);
    print $c->{$s[1]}();
    exit(0);
  }
});
// Fails if nothing is found
http_response_code(404);