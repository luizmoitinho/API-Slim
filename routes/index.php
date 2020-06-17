<?php

use function src\slimConfiguration;
use function src\basicAuth;

use App\Controllers\FuncaoController;
use App\Controllers\DepartamentoController;
use App\Controllers\BlocoController;

use Tuupola\Middleware\HttpBasicAuthentication;

$app = new \Slim\App(slimConfiguration());

// =============================================

$app->group('', function() use ($app){

  // Rotas para manipulação de funções
  $app->get('/funcao', FuncaoController::class.':getAllFuncoes');
  $app->post('/funcao', FuncaoController::class.':insertFuncao');
  $app->put('/funcao', FuncaoController::class.':updateFuncao');
  $app->delete('/funcao', FuncaoController::class.':deleteFuncao');

  // Rotas para manipulação de departamentos
  $app->get('/departamento', DepartamentoController::class.':getAllDepartamentos');
  $app->post('/departamento', DepartamentoController::class.':insertDepartamento');
  $app->put('/departamento', DepartamentoController::class.':updateDepartamento');
  $app->delete('/departamento', DepartamentoController::class.':deleteDepartamento');


  // Rotas para manipulação de blocos
  $app->get('/bloco', BlocoController::class.':getAllBlocos');
  $app->post('/bloco', BlocoController::class.':insertBloco');
});
// =============================================
$app->run();
