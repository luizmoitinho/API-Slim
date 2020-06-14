<?php

namespace App\Controllers;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\DAO\db_geren_lojas\LojasDAO;
final class ProductController{

  public function getProducts(Request $request, Response $response, array $args): Response{
    
    $response = $response->withJson([
      'response'=>'Controller de produtoss'
      
    ]);
    
    $lojasDAO = new LojasDAO();
    $lojasDAO->getAll();

    return $response;
 
  }

}