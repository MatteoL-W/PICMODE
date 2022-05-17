import {useFetch} from "./modules/fetchTools.js";
import {displayPosts} from "./modules/postTools.js";

window.addEventListener('DOMContentLoaded', () => {
    useFetch('/S2_PHP/api/post', 'GET')
        .then(response => {
            // Quand on récupère les résultats, on les affiche
            displayPosts(response, '.feed');
        })
});
