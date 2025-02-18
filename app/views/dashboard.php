<?php
session_start();
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../models/User.php';

// Vérifie si l'utilisateur est bien connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: /mon-projet-git/public/index.php?url=connexion");
    exit;
}

$userModel = new User($pdo);
$user = $userModel->findById($_SESSION['user_id']);

if (!$user) {
    die("Erreur : Utilisateur introuvable.");
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Bienvenue, <?= htmlspecialchars($user['nom']) ?> !</h1>

    <form action="logout.php" method="POST">
        <button type="submit">Déconnexion</button>
    </form>
</body>
</html>
