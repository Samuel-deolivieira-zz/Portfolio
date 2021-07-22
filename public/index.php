<?php

require '../vendor/autoload.php';
$router = new AltoRouter();
$router->map('GET', '/', function() {
    require __DIR__ . '/../view/home.php';
});
$router->map('GET', '/home', function() {
    require __DIR__ . '/../view/home.php';
});
$router->map('GET', '/contact', function() {
    require __DIR__ . '/../view/contact.php';
});

$match = $router->match();

if( is_array($match) && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] ); 
} else {
	// no route was matched
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}