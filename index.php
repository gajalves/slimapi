<?php

    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Slim\Factory\AppFactory;

    require __DIR__ . '/vendor/autoload.php';

    $app = new Slim\App;

    $app->get('/json', function(){
        $data = ['name' => 'gabriel', 'age' => '22'];
        echo json_encode($data);
    });

    $app->get('/postagens', function(){
        echo 'Lista de posts';
    });

    $app->get('/usuarios/{id}', function($request, $response){
        $id = $request->getAttribute('id');
        echo $id;
    });


    $app->run();