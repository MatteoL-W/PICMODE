import {toBase64, useFetch} from "./modules/fetchTools.js";
import {displayPosts} from "./modules/postTools.js";
import {clear, getDate, header, needToLogin} from "./modules/tools";
import {createImage} from "./modules/htmlTools";

window.addEventListener('DOMContentLoaded', () => {
    needToLogin();
    let postForm = document.querySelector('.postForm');
    postForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData(e.target);
        const form = Object.fromEntries(formData);

        const base64picture = await toBase64(form.picture).catch(e => Error(e));
        if (!base64picture instanceof Error) {
            alert("photo marche po");
            return;
        }

        useFetch('http://localhost/S2_PHP/api/post', 'POST', {
            description: form.description,
            date: getDate(),
            idUser : sessionStorage.getItem('fashion_token'),
            picture: base64picture
        }).then(response => {
            if (response) {
                clear('.section');
                displayPosts(response, '.section');
            }
        })


    });

    // Fil d'actualité
    useFetch('/S2_PHP/api/post/getAllPosts/', 'GET')
        .then(response => {
            // Quand on récupère les résultats, on les affiche
            displayPosts(response, '.section');
        })

    header();

});
