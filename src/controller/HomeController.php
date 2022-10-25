<?php

namespace App\Controller;

use App\Lib\Response;

class HomeController // extends BaseController
{
    public function indexAction()
    { 
        // you could add the twig package 'composer require "twig/twig:^2.0"' 
        // and use it as "echo $twig->render('index', ['name' => 'Fabien']);"
        echo 'Home';
    }

    public function indexAction2()
    { 
        // you could add the twig package 'composer require "twig/twig:^2.0"' 
        // and use it as "echo $twig->render('index', ['name' => 'Fabien']);"
        echo 'Home 2';
    }

    public function post(){

        $r = new Response();
        $r->toJSON([
            'posts' =>  [
                ['id' => 1],
                ['id' => 2],
                ['id' => 3],
            ],
            'status' => 'ok'
        ]);
    }

    public function getOne($id) {

        (new Response)->toJSON([
            'post' =>  ['id' => $id],
            'status' => 'ok'
        ]);
        
    }
}