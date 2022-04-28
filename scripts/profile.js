import {useFetch} from "./modules/fetchTools";
import {displayPosts} from "./modules/postTools";

window.addEventListener('DOMContentLoaded', () => {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const userId = urlParams.get('user')

    if (!userId) {
        // gérer mieux l'erreur
        alert("merci de sélectionner un user / http://localhost/S2_PHP/profile.html?user=2 par exemple");
    }

    useFetch('/S2_PHP/api/user/' + userId, 'GET')
        .then(response => {
            // Quand on récupère les résultats, on les affiche
            displayProfile(response, '.profile');
        })

    // utiliser un fetch et displayPosts pour afficher les posts de l'utilisateur en question
});

function displayProfile(profile, selector) {
    // afficher le haut du profil dynamiquement
    // faire le trait séparateur
    console.log(profile)
}