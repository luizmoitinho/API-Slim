<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\DAO\db_reservas_locais\FuncaoDAO;
use App\Model\FuncaoModel;


final class FuncaoController{
  
  private $funcaoDAO;

  public function __construct(){
    $this->funcaoDAO = new FuncaoDAO();
  }

  public function getAllFuncoes(Request $request, Response $response,array $args): Response{
    
    $funcoes = $this->funcaoDAO->getAllFuncoes();

    return $response->withJson($funcoes);

  }

  public function insertFuncao(Request $request, Response $response,array $args): Response{
    $data =  $request->getParsedBody();
    $funcao =  new FuncaoModel();
    $funcao->setNmFuncao($data['nm_funcao']);
    
    $res = $this->funcaoDAO->insertFuncao($funcao);
    if($res)
      return $response->withJson(['message'=>'Função cadastrada com sucesso']);

    return $response->withJson(['message'=>'Não foi possível cadastrar a função']);

  }
  public function updateFuncao(Request $request, Response $response,array $args): Response{
    $data = $request->getParsedBody();

    $funcao =  new FuncaoModel();

    $funcao->setIdFuncao($data['id_funcao'])
           ->setNmFuncao($data['nm_funcao']);

    $res =  $this->funcaoDAO->updateFuncao($funcao);
    if($res)
      return $response->withJson(['message'=>'Função atualizada com sucesso']);
    return $response->withJson(['message'=>'Não foi possível atualizar a função']);

  }

  public function deleteFuncao(Request $request, Response $response,array $args): Response{
    $data = $request->getParsedBody();
    $funcao =  new FuncaoModel();
    $funcao->setIdFuncao($data['id_funcao']);

    $res =  $this->funcaoDAO->deleteFuncao($funcao);
    if($res)
      return $response->withJson(['message'=>'Função removida com sucesso']);

    return $response->withJson(['message'=>'Não foi possível remover a função']);

  }



}
