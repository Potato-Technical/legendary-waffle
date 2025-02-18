document.addEventListener("DOMContentLoaded", () => {
    const trajetContainer = document.getElementById("trajet-list");
    const prixMaxInput = document.getElementById("prix-max");
    const placesMinInput = document.getElementById("places-min");
    const ecoCheckbox = document.getElementById("eco");
    const filtrerBtn = document.getElementById("filtrer-btn");

    let trajetsData = []; // Stocke les trajets pour filtrer plus tard

    // Charger les trajets depuis le JSON
    fetch("/mon-projet-git/public/assets/data/trajets.json")
        .then(response => response.json())
        .then(trajets => {
            trajetsData = trajets; // Stocke les trajets en mémoire
            afficherTrajets(trajetsData);
        })
        .catch(error => console.error("Erreur de chargement des trajets :", error));

    // Fonction pour afficher les trajets
    function afficherTrajets(trajets) {
        trajetContainer.innerHTML = ""; // Nettoyer l'affichage

        trajets.forEach(trajet => {
            const trajetDiv = document.createElement("div");
            trajetDiv.classList.add("trajet");

            trajetDiv.innerHTML = `
                <h3>${trajet.depart} -> ${trajet.arrivee}</h3>
                <p>Prix : ${trajet.prix}€</p>
                <p>Places disponibles : ${trajet.places}</p>
                <p>Éco-responsable : ${trajet.eco ? "Oui" : "Non"}</p>
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
            trajet.places >= placesMin &&
            (!ecoChecked || trajet.eco === true)
        );

        afficherTrajets(trajetsFiltres);
    }

    // Désactiver le filtrage instantané : le bouton est obligatoire
    filtrerBtn.addEventListener("click", filtrerTrajets);
});
