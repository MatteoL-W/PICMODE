import {toBase64, useFetch} from "./modules/fetchTools.js";
import {displayPosts} from "./modules/postTools.js";
import {clear, getDate} from "./modules/tools";
import {createImage} from "./modules/htmlTools";

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

        if (!sessionStorage.getItem('fashion_token')) {
            alert("you must login")
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

    //profile picture
    const userId = sessionStorage.getItem('fashion_token')
    useFetch('/S2_PHP/api/user/'+userId, 'GET')
        .then(response => {
            console.log(response);
            document.querySelector('.profil_name').innerHTML = response.pseudo;
            document.querySelector('.profil_name').setAttribute('href', 'profile.html?user='+response.id);
            document.querySelector('.profil_picture').src = '/S2_PHP/api/' + response.profile_picture;
        })




});
