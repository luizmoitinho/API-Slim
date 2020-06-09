<?php

namespace App\Controllers;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class ProductController{

  public function getProducts(Request $request, Response $response, array $args): Response{
    
    return $response->withJson([
      'response'=>'Controller de produtoss'
    ]);
   
  }

}