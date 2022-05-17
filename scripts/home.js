import {toBase64, useFetch} from "./modules/fetchTools.js";
import {displayPosts} from "./modules/postTools.js";
import {clear, getDate} from "./modules/tools";

window.addEventListener('DOMContentLoaded', () => {
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
                clear('.feed');
                displayPosts(response, '.feed');
            }
        })


    });

    // Fil d'actualité
    useFetch('/S2_PHP/api/post', 'GET')
        .then(response => {
            // Quand on récupère les résultats, on les affiche
            displayPosts(response, '.feed');
        })
});
