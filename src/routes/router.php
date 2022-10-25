<?php

use App\Lib\Router;

Router::get('/', function () { echo 'Hello World'; });

Router::get('/home', 'HomeController@indexAction');
Router::get('/home2', 'HomeController@indexAction2');

Router::get('/post', 'HomeController@post');

Router::get('/post/([0-9]*)', 'HomeController@getOne');
Router::get('/post/([0-9]*)/edit', function ($id) {

    echo json_encode([
        'post' =>  ['id' => $id],
        'edit' => 'ok'
    ]);

});
