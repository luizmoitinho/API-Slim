<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require_once "vendor/autoload.php";
$app = new \Slim\App();

$app->get('/users/[{nome}]', function(Request $request,Response $response,array $args){

  $limit=  $request->getQueryParams()['limit'] ?? 1;
  $nome =  $args['nome'] ?? '';

  return $response->getBody()->write("{$limit} Usuario autenticado: $nome");

});

$app->run();
