<?php
  // Require composer autoloader
  require __DIR__ . '/vendor/autoload.php';

  // Read .env
  try {
    $dotenv = new Dotenv\Dotenv(__DIR__);
    $dotenv->load();
  } catch(InvalidArgumentException $ex) {
    // Ignore if no dotenv
  }

  $app = new \App\Main();

  // Create Router instance
  $router = new \Router\Router();

  $router->get('/random', function() use ($app){
      echo json_encode($app->getRandomJokes(rand(0,9)));
  });

  $router->get('/categories', function() use ($app){
      echo json_encode($app->getCategories());
  });

  $router->set404(function() {
    header('HTTP/1.1 404 Not Found');
    echo "Page not found";
  });

  // Run the Router
  $router->run();
