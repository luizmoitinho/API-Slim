<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

use App\DAO\db_reservas_locais\BlocoDAO;
use App\Model\BlocoModel;

final class BlocoController{

  private $blocoDAO;

  public function __construct(){
    $this->blocoDAO = new BlocoDAO();
  }
  

  public function getAllBlocos(Request $request, Response $response, array $args): Response{
    $blocos = $this->blocoDAO->getAllBlocos();
    return $response->withJson($blocos);
  }

  public function insertBloco(Request $request, Response $response, array $args): Response{
    $data = $request->getParsedBody();

    $bloco = new BlocoModel();
    $bloco->setNmBloco($data['nm_bloco']);

    $res = $this->blocoDAO->insertBloco($bloco);
    if($res)
      return $response->withJson(['message'=>'Bloco cadastrado com sucesso']);
    
    return $response->withJson(['message'=>'Não foi possivel cadastrar o bloco']);
  }

  public function updateBloco(Request $request, Response $response, array $args): Response{
    $data = $request->getParsedBody();
    $bloco = new BlocoModel();

    $bloco->setIdBloco($data['id_bloco'])
          ->setNmBloco($data['nm_bloco']);

    $res = $this->blocoDAO->updateBloco($bloco);

    if($res)
      return $response->withJson(['message'=>'Bloco atualizado com sucesso']);
    
    return $response->withJson(['message'=>'Não foi possível atualizar o bloco']);
  }

  public function deleteBloco(Request $request, Response $response, array $args): Response{
    $data = $request->getParsedBody();

    $bloco = new BlocoModel();
    $bloco->setIdBloco($data['id_bloco']);
    
    $res = $this->blocoDAO->deleteBloco($bloco);

    if($res)
      return $response->withJson(['message'=>'Bloco removido com sucesso']);

    return $response->withJson(['message'=>'Não foi possível remover o bloco']);
  
  }
}

    $bloco = new BlocoModel();
    $bloco->setNmBloco($data['nm_bloco'])
          ->setIdBloco($data['id_bloco']);
    $this->blocoDAO->insertBloco($bloco);

  }
  

}

