<?php

    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Slim\Factory\AppFactory;

    require __DIR__ . '/vendor/autoload.php';

    $app = new Slim\App;
    
    //padrao psr7
    $app->get('/postagens', function(Request $request, Response $response){       
        $response->getBody()->write("lista essa porra");        
        return $response;
    });
    
    //http methods
    $app->get('/posts', function(Request $request, Response $response){
        $response->getBody()->write("lista de posts");        
        return $response;
    });

    $app->post('/usuarios/add', function(Request $request, Response $response){       

        //recupera post
        $post = $request->getParsedBody();
        $nome = $post['nome'];
        $email = $post['email'];

        return $response->getBody()->write($nome);
    });
    
    $app->put('/usuarios/edit', function(Request $request, Response $response) {
        $post = $request->getParsedBody();
        $id = $post['id'];
        $nome = $post['nome'];

        return $response->getBody()->write("Sucesso ao atualizar o id: " . $id);
    });


    $app->delete('/usuarios/remove/{id}', function(Request $request, Response $response) {
        $id = $request->getAttribute('id');
        
        return $response->getBody()->write("Sucesso ao remover o id: " . $id);
    });

    $app->run();







    // // $app->get('/json', function(){
    // //     $data = ['name' => 'gabriel', 'age' => '22'];
    // //     echo json_encode($data);
    // // });

    // // $app->get('/postagens', function(){
    // //     echo 'Lista de posts';
    // // });

    // // $app->get('/usuarios/{id}', function($request, $response){
    // //     $id = $request->getAttribute('id');
    // //     echo $id;
    // // });

    // // $app->get('/lista/{itens:.*}', function($request, $response){
    // //     $itens = $request->getAttribute('itens');
    // //     echo $itens;
    // // });


    // // /* nomear rotas */

    // // $app->get('/blog/fodase/{id}', function($request, $response){
    // //     echo 'Lista fodase';
    // // })->setName('fodase');


    // // $app->get('/testfodase', function($request, $response){
    // //     $retorno = $this->get("router")->pathFor("fodase", ['id' => '10']);

    // //     //echo $retorno;
    // // });

    // // /* agrupar rotas */

    // // $app->group('/v1', function(){
    // //     $this->get('/usuarios', function($request, $response){
    // //         echo 'lista usuarios';        
    // //     });            

    // //     $this->get('/postagens', function($request, $response){
    // //         echo 'lista postagens';        
    // //     });
    // // });               
    