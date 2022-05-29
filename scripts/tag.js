import {toBase64, useFetch} from "./modules/fetchTools.js";
import {displayPosts} from "./modules/postTools.js";
import {clear, getDate, header, needToLogin} from "./modules/tools.js";
import {createImage} from "./modules/htmlTools.js";

window.addEventListener('DOMContentLoaded', () => {
    needToLogin();
    header();
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const tagId = urlParams.get('tagId')

    if (!tagId) {
        // gérer mieux l'erreur
        alert("merci de sélectionner un tag / http://localhost/S2_PHP/profile.html?tagId=3 par exemple");
    }

    useFetch('/S2_PHP/api/tag/' + tagId, 'GET')
        .then(response => {
            document.querySelector('h1').innerText = "Tag : " + response.name;
        })

    // Fil d'actualité
    useFetch('/S2_PHP/api/post/getAllPostsFromTagId/' + tagId, 'GET')
        .then(response => {
            // Quand on récupère les résultats, on les affiche
            displayPosts(response, '.section');
        })
    header();

});
