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
            document.querySelector('.dynamic-picture').src = '/S2_PHP/api' + response.picture
            document.querySelector('.clothe-legend p').innerHTML = response.description
        })
});
