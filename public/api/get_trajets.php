<?php
require_once "../../config/config.php";

header("Content-Type: application/json");

try {
    // Récupérer les trajets en s'assurant que les colonnes correspondent bien à ta table
    $stmt = $pdo->query("
        SELECT id, conducteur_id, vehicule_id, depart, arrivee, date_depart, prix, places_restantes, ecologique 
        FROM Covoiturage
    ");
    $trajets = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Convertir 'ecologique' en booléen (0 ou 1)
    foreach ($trajets as &$trajet) {
        $trajet['ecologique'] = (bool) $trajet['ecologique'];
    }

    echo json_encode($trajets);
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>
