<?php

require_once __DIR__ . '/../../config/config.php';

class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function register($nom, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT); // Hash du mot de passe

        $sql = "INSERT INTO utilisateur (nom, email, mot_de_passe) VALUES (:nom, :email, :mot_de_passe)";
        $stmt = $this->pdo->prepare($sql);
        try {
            $stmt->execute([
                'nom' => $nom,
                'email' => $email,
                'mot_de_passe' => $hashedPassword
            ]);
            return true; // Confirme que l'inscription a réussi
        } catch (PDOException $e) {
            die("Erreur lors de l'inscription : " . $e->getMessage()); // Affiche l'erreur précise
        }        
    }

    public function login($email, $password) {
        $sql = "SELECT * FROM utilisateur WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();

        if ($user && isset($user['mot_de_passe']) && password_verify($password, $user['mot_de_passe'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            return true;
        } else {
            return false;
        }
    }
    public function findById($id) {
        $sql = "SELECT * FROM utilisateur WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }
    
}
