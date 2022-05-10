import {useFetch} from "./modules/fetchTools.js";

window.addEventListener('DOMContentLoaded', () => {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const postId = urlParams.get('postId')

    if (!postId) {
        // gérer mieux l'erreur
        alert("merci de sélectionner un post / http://localhost/S2_PHP/profile.html?postId=3 par exemple");
    }

    useFetch('/S2_PHP/api/post/' + postId, 'GET')
        .then(response => {
            // Quand on récupère les résultats, on les affiche
            displayPost(response, '.post');
        })
});

function displayPost(post, selector) {
    // je recommande d'utiliser la fonction generatePostHtml(post) du module postTools.js pour
    // afficher le post en question en évitant les doublons de code
    console.log(post)
}