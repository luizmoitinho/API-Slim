<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\DAO\db_geren_lojas\LojasDAO;
use App\Model\LojaModel;

final class LojaController{

    public function getLojas(Request $request, Response $response, array $args): Response{

      $lojasDAO =  new LojasDAO();
      
      $lojas =  $lojasDAO->getAllLojas();
      $response  =  $response->withJson($lojas);

      return $response;
    }


    public function insertLoja(Request $request, Response $response, array $args): Response{
     
      $data = $request->getParsedBody();

      $lojasDAO = new LojasDAO();
      $loja =  new LojaModel();
      $loja->setNmLoja($data['nm_loja'])
           ->setTelLoja($data['tel_loja'])
           ->setEndLoja($data['end_loja']);
      var_dump($loja);
      
      $lojasDAO->insertLoja($loja);

      return $response->withJson(['message'=>'Loja inserida com sucesso.']);
    }

    public function updateLoja(Request $request, Response $response, array $args): Response{
      
      $response = $response->withJson([
        'message'=>'Hello World'
      ]);

      return $response;
    }

    public function deleteLoja(Request $request, Response $response, array $args): Response{
      
      $response = $response->withJson([
        'message'=>'Hello World'
      ]);

      return $response;

    }

} 