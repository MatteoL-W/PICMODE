import {toBase64, useFetch} from "./modules/fetchTools";
import {getDate} from "./modules/tools";

window.addEventListener('DOMContentLoaded', (e) => {
    let userId = sessionStorage.getItem('fashion_token');

    if (!userId) {
        if (sessionStorage.getItem('fashion_token')) {
            location.assign('/S2_PHP/login');
        }
    }

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
            picture: base64picture,
            date: getDate()
            //idAuthor : userId
        }).then(response => {
            console.log(response);
        })
    });


});