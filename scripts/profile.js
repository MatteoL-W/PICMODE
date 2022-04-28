import {useFetch} from "./modules/fetchTools";
import {displayPosts} from "./modules/post";

window.addEventListener('DOMContentLoaded', () => {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const userId = urlParams.get('user')

    if (!userId) { alert("merci de sélectionner un user / http://localhost/S2_PHP/profile.html?user=2 par exemple"); }

    useFetch('/S2_PHP/api/user/' + userId, 'GET')
        .then(response => {
            // Quand on récupère les résultats, on les affiche
            displayProfile(response, '.profile');
        })
});

function displayProfile(posts, selector) {
    // afficher le haut du profil dynamiquement
    // faire le trait séparateur
    // utiliser displayPosts pour afficher les posts de l'utilisateur
}