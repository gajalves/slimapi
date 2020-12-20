<?php

    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Slim\Factory\AppFactory;

    require __DIR__ . '/vendor/autoload.php';
    require 'class.php';

    $app = new Slim\App;

    

    $app->get('/json', function(Request $req, Response $res) {       
        //return $res->write("Header return");
        // return $res->withJson([
        //     "nome" => "Gabriel Jaime",
        //     "bonito" => "muito"
        // ]);


       
    });



    /** Middleware */

    $app->add(function($req, $res, $next) {
        $res->write("middleware - camada 1 + "); 
        //return $next($req, $res);
        $res = $next($req, $res);
        $res->write(' + Fim da camada 1');
        return $res;
    });

    // $app->add(function($req, $res, $next) {
    //     $res->write("middleware - camada 2 + "); 
    //     return $next($req, $res);
    // });


    $app->get('/usuarios', function(Request $req, Response $res) {       
        return $res->write("Lista usuarios");
    });

    $app->get('/posts', function(Request $req, Response $res) {       
        return $res->write("Lista posts");
    });

    $app->run();

