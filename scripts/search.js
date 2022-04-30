import {useFetch} from "./modules/fetchTools.js";
import {displayPosts} from "./modules/postTools.js";

window.addEventListener('DOMContentLoaded', () => {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const search = urlParams.get('search')

    if (!search) {
        // gérer mieux l'erreur
        alert("merci de sélectionner un search / http://localhost/S2_PHP/search.html?search=dsqdsqd par exemple");
    }


    /*useFetch('untruc', 'GET')
        .then(response => {
            // Quand on récupère les résultats, on les affiche
            displaySearch(response, '.search');
        })*/

});

function displaySearch(search, selector) {
    // afficher les résultats de recherches
    console.log(search)
}