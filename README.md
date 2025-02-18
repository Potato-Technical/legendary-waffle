# 🚗 Ecoride - Plateforme de covoiturage écologique 🌱

## 📌 Description
Ecoride est une plateforme de covoiturage écologique développée dans le cadre de l’ECF 2025 Studi.

## 🚀 Technologies utilisées
- Front-end : HTML, CSS (Bootstrap), JavaScript
- Back-end : PHP (PDO)
- Base de données : MySQL (relationnelle) + MongoDB (NoSQL)
- Hébergement : Fly.io / Vercel

## 📁 Structure du projet
![image](https://github.com/user-attachments/assets/7bdadf38-6be8-4b73-9d42-9c29e0725fa5)


## ⚙️ Installation
### 1️⃣ Prérequis
- **XAMPP** ou un serveur Apache avec PHP & MySQL.
- **Git** installé et configuré.

### 2️⃣ Cloner le projet
```bash
git clone https://github.com/Potato-Technical/legendary-waffle.git
cd legendary-waffle
```
3️⃣ Configurer la base de données
- Créer une base ecoride sur phpMyAdmin.
- Ajouter un utilisateur MySQL ecoride_admin.
- Modifier config/config.php avec les bons identifiants.

4️⃣ Lancer le projet
Placer le projet dans C:/xampp/htdocs/.
Démarrer Apache & MySQL via XAMPP.
Accéder à http://localhost/mon-projet-git/public/?url=home.

📌 Fonctionnalités actuelles
- Connexion MySQL avec PDO
- Routeur simple (routes.php)
- Gestion des erreurs 404 (views/404.php)
- Structure MVC (controllers, models, views)
