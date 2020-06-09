<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require_once "vendor/autoload.php";
$app = new \Slim\App();


$configuration = [
  'settings' => [
      'displayErrorDetails' => true
  ]
];

$mid01 =  function (Request $request, Response $response, $next): Response{
  $response->getBody()->write('Dentro do mid01<br>');
  $response = $next($request,$response);
  $response->getBody()->write('Dentro do mid02<br>');
  return $response;
};

$configuration = new \Slim\Container($configuration);


$app->group('/login', function() use($app){
  $app->get('usuarios');
})->add($mid01);

$app->get('/users/[{nome}]', function(Request $request,Response $response,array $args){
  $limit=  $request->getQueryParams()['limit'] ?? 1;
  $nome =  $args['nome'] ?? '';
  return $response->getBody()->write("{$limit} Usuario autenticado: $nome");
});

$app->post('/login',function(Request $request, Response $response, array $args): Response{
  $data =  $request->getParsedBody();
  if(is_null($data['matricula']) or empty($data['matricula']) or is_null($data['senha']) or empty($data['senha'])){
    print('Preencha todos os campos!');
    exit;
  }
  $data =  json_encode($data);
  $response->getBody()->write("$data");
  return $response;
})->add($mid01);

$app->run();
