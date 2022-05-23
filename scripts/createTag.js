import {useFetch} from "./modules/fetchTools.js";
import {header, needToLogin} from "./modules/tools";

window.addEventListener('DOMContentLoaded', () => {
    needToLogin();

    header();
    let tagForm = document.querySelector('.add-tag')
    tagForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(e.target);
        const form = Object.fromEntries(formData);

        if (!sessionStorage.getItem('fashion_token')) {
            alert("you must login")
            return;
        }

        useFetch('/S2_PHP/api/tag', 'POST', {
            name: form.name
        }).then(response => {
            if (response) {
                location.assign('/S2_PHP/createClothe');
            }
        })
    });
});
