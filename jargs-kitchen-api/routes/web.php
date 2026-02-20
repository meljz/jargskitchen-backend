<?php

$router->get('/', function () use ($router) {
    return $router->app->version();
});

/* auth routes */
$router->post('/register', 'AuthController@register');
$router->post('/login', 'AuthController@login');
$router->get('/user', ['middleware' => 'auth', 'uses' => 'AuthController@me']);
$router->post('/logout', ['middleware' => 'auth', 'uses' => 'AuthController@logout']);

// CORS preflight
$router->options('/{any:.*}', function () {
    return response('', 200);
});
