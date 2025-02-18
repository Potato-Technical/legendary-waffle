<?php
// Récupère l'URL demandée
$request = $_GET['url'] ?? 'home';

// Liste des routes disponibles
$routes = [
    'home' => 'controllers/HomeController.php',
    'about' => 'controllers/AboutController.php',
    'contact' => 'controllers/ContactController.php'
];

// Vérifie si le fichier du contrôleur existe
$filePath = __DIR__ . '/../app/' . ($routes[$request] ?? '');
if (isset($routes[$request]) && file_exists($filePath)) {
    require_once $filePath;
} else {
    http_response_code(404);
    require_once __DIR__ . '/../app/views/404.php';
}

?>
