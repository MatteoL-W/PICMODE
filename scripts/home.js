import {useFetch} from "./modules/fetchTools";
import {displayPosts} from "./modules/post";

window.addEventListener('DOMContentLoaded', () => {
    let posts;

    useFetch('http://localhost/S2_PHP/api/post', 'GET')
        .then(results => {
            // Quand on récupère les résultats, on les stocke
            posts = results;
        }).then(() => {
        // Quand on les a stocké, on les affiche
        displayPosts(posts, '.feed');
    })

});
