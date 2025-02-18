<?php

require_once __DIR__ . '/../app/controllers/AuthController.php';

$authController = new AuthController($pdo);

$routes = [
    'home' => 'views/home.php',
    'covoiturages' => 'views/covoiturages.php',
    'detail' => 'views/detail.php',
    'inscription' => function() use ($authController) { $authController->register(); },
    'connexion' => function() use ($authController) { $authController->login(); },
    'logout' => function() use ($authController) { $authController->logout(); },
    'dashboard' => 'views/dashboard.php'
];

$request = $_GET['url'] ?? 'home';

if (isset($routes[$request])) {
    if (is_callable($routes[$request])) {
        $routes[$request]();
    } else {
        require_once __DIR__ . '/../app/' . $routes[$request];
    }
} else {
    http_response_code(404);
    require_once __DIR__ . '/../app/views/404.php';
}
