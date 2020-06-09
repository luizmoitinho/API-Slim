<?php

namespace src;

function slimConfiguration(): \Slim\Container{
  $config = [
    'settings' => [
        'displayErrorDetails' => getenv('DISPPLAY_ERROS_DETAILS'),
    ],
  ];
  return new \Slim\Container($config);
}