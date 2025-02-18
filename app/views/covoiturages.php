<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/mon-projet-git/public/assets/css/style.css">
    <script src="/mon-projet-git/public/assets/js/trajets.js"></script>

</head>
<body>
    <h1>Liste des Covoiturages</h1>

    <label for="prix-max">Prix max :</label>
    <input type="number" id="prix-max" placeholder="Ex: 30">

    <label for="places-min">Places min :</label>
    <input type="number" id="places-min" placeholder="Ex: 2">

    <label for="eco">Éco-responsable :</label>
    <input type="checkbox" id="eco">

    <button id="filtrer-btn">Filtrer</button>

    <div id="trajet-list">
        <p>Chargement des trajets...</p>
    </div>

    <script src="/mon-projet-git/public/assets/js/trajets.js"></script>
</body>
</html>
