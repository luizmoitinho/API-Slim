<?php

use function src\slimConfiguration;
use function src\basicAuth;

use App\Controllers\FuncaoController;
use Tuupola\Middleware\HttpBasicAuthentication;

$app = new \Slim\App(slimConfiguration());

// =============================================

$app->group('', function() use ($app){
  $app->get('/funcao', FuncaoController::class.':getFuncoes');
  $app->post('/funcao', FuncaoController::class.':insertFuncao');
  $app->put('/funcao', FuncaoController::class.':updateFuncao');
  $app->delete('/funcao', FuncaoController::class.':deleteFuncao');

});
// =============================================
$app->run();
