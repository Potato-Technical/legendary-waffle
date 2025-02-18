document.addEventListener("DOMContentLoaded", () => {
    const trajetContainer = document.getElementById("trajet-list");
    const prixMaxInput = document.getElementById("prix-max");
    const placesMinInput = document.getElementById("places-min");
    const ecoCheckbox = document.getElementById("eco");
    const filtrerBtn = document.getElementById("filtrer-btn");

    let trajetsData = []; // Stocke les trajets pour filtrer plus tard

    // Charger les trajets depuis le JSON
    fetch("/mon-projet-git/public/api/get_trajets.php")
        .then(response => response.json())
        .then(trajets => {
            console.log("Données reçues :", trajets); // Vérification
            trajetsData = trajets;
            afficherTrajets(trajetsData);
        })
        .catch(error => console.error("Erreur de chargement des trajets :", error));

    // Fonction pour afficher les trajets
    function afficherTrajets(trajets) {
        if (!trajetContainer) {
            console.error("❌ ERREUR : #trajet-list introuvable !");
            return;
        }
    
        trajetContainer.innerHTML = ""; // Nettoyer l'affichage
    
        trajets.forEach(trajet => {
            const trajetDiv = document.createElement("div");
            trajetDiv.classList.add("trajet");
    
            trajetDiv.innerHTML = `
                <h3>${trajet.depart} ➡️ ${trajet.arrivee}</h3>
                <p>Date de départ : ${trajet.date_depart}</p>
                <p>Prix : ${trajet.prix}€</p>
                <p>Places restantes : ${trajet.places_restantes}</p>
                <p>Éco-responsable : ${trajet.ecologique ? "✅ Oui" : "❌ Non"}</p>
            `;
    
            trajetContainer.appendChild(trajetDiv);
        });
    }

    // Fonction pour filtrer les trajets
    function filtrerTrajets() {
        const prixMax = parseFloat(prixMaxInput.value) || Infinity;
        const placesMin = parseInt(placesMinInput.value) || 0;
        const ecoChecked = ecoCheckbox.checked;

        const trajetsFiltres = trajetsData.filter(trajet =>
            trajet.prix <= prixMax &&
            trajet.places_restantes >= placesMin &&
            (!ecoChecked || trajet.ecologique === true)
        );

        afficherTrajets(trajetsFiltres);
    }

    // Activer le bouton "Filtrer"
    filtrerBtn.addEventListener("click", filtrerTrajets);
});
