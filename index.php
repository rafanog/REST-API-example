<?php

 // Require composer autoloader
  require __DIR__ . '/vendor/autoload.php';

  $app = new \App\Main();

  // creates a router instance
  $router = new \Bramus\Router\Router();

  // Activate CORS
  function sendCorsHeaders() {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Authorization");
    header("Access-Control-Allow-Methods: GET,HEAD,PUT,PATCH,POST,DELETE");
  }

  $router->options('/.*', function() {
      sendCorsHeaders();
  });

  sendCorsHeaders();

  $router->get('/api/public', function() use ($app){
      echo json_encode($app->publicPing());
  });

  $router->set404(function() {
    header('HTTP/1.1 404 Not Found');
    echo "Page not found";
  });

  // Run the Router
  $router->run();
?>