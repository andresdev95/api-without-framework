<?php

use App\Lib\Router;
use App\Lib\Request;
use App\Lib\Response;

Router::get('/', function ($req, $res) {
    //dump($req, $res);
    echo 'Hello World';
});

Router::get('/post', function (Request $req, Response $res) {
    $res->toJSON([]);
});

Router::get('/post/([0-9]*)', function (Request $req, Response $res) {
    $res->toJSON([
        'post' =>  ['id' => $req->params[0]],
        'status' => 'ok'
    ]);
});
