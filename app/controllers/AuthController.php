<?php

require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../../config/config.php';

class AuthController {
    private $pdo;
    private $userModel;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->userModel = new User($pdo);
    }

    // Gérer l'inscription
    public function register() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nom = $_POST['nom'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            if ($this->userModel->register($nom, $email, $password)) {
                echo "Inscription réussie ! <a href='/mon-projet-git/public/index.php?url=connexion'>Se connecter</a>";
            } else {
                echo "Erreur lors de l'inscription.";
            }
        } else {
            require_once __DIR__ . '/../views/inscription.php';
        }
    }

    // Gérer la connexion
    public function login() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $email = $_POST["email"] ?? '';
            $password = $_POST["password"] ?? '';
    
            $user = $this->userModel->login($email, $password);
            if ($user) {
                session_start();
                $_SESSION["user"] = $user;
    
                // Vérifie si la session est bien enregistrée
                var_dump($_SESSION); 
    
                // Redirige vers le dashboard
                header("Location: /mon-projet-git/public/index.php?url=dashboard");
                exit;
            } else {
                echo "Identifiants incorrects.";
            }
        } else {
            require_once __DIR__ . '/../views/connexion.php';
        }
    }
    

    // Déconnexion
    public function logout() {
        session_start();
        session_destroy();
        header("Location: /mon-projet-git/public/index.php?url=connexion");
        exit;
    }
}
