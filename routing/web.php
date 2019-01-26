<?php

$router = new \Routing\Router;

//$router->get(['/api', 'ApiController@apiSelect']);

//$router->get(['/api/{$id}', 'ApiController@apiShow']);

//$router->post(['/api/insert', 'ApiController@apiInsert']);

//$router->patch(['/api/{$id}', 'ApiController@apiUpdate']);

//$router->put(['/api/{$id}', 'ApiController@apiUpdate']);

//$router->delete(['/api/{$id}', 'ApiController@apiDelete']);

$router = new \Routing\Router;
 $router->get(['/dividas', 'DividaController@dividasSelect']);
 $router->post(['/dividas/insert', 'DividaController@dividasInsert']);
 $router->put(['/dividas/{$id}', 'DividaController@dividasUpdate']);
$router->run();