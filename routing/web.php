<?php

$router = new \Routing\Router;
$router->get(['/dividas', 'DividaController@select']);
$router->get(['/dividas/{$id}', 'DividaController@findById']);
$router->post(['/dividas/store', 'DividaController@store']);
$router->put(['/dividas/{$id}', 'DividaController@update']);
$router->patch(['/dividas/{$id}', 'DividaController@update']);
$router->delete(['/dividas/{$id}', 'DividaController@delete']);
$router->run();