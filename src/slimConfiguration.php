<?php

namespace src;

function slimConfiguration(): \Slim\Container{
  $config = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
  ];
  return new \Slim\Container($config);
}