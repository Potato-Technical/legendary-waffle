<?php
// Activer l'affichage des erreurs pour le débogage
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Récupère l'URL demandée
$request = $_GET['url'] ?? 'home';

// Liste des routes disponibles
$routes = [
    'home' => 'views/home.php',
    'covoiturages' => 'views/covoiturages.php',
    'detail' => 'views/detail.php',
    'inscription' => 'views/inscription.php',
    'connexion' => 'views/connexion.php',
    'dashboard' => 'views/dashboard.php'
];

// Vérification du chemin du fichier
if (isset($routes[$request])) {
    $filePath = __DIR__ . '/../app/' . $routes[$request];

    if (file_exists($filePath)) {
        require_once $filePath;
    } else {
        http_response_code(404);
        require_once __DIR__ . '/../app/views/404.php';
    }
} else {
    http_response_code(404);
    require_once __DIR__ . '/../app/views/404.php';
}
?>
