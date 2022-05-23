import {useFetch} from "./modules/fetchTools.js";
import {header, needToLogin} from "./modules/tools";

window.addEventListener('DOMContentLoaded', () => {
    needToLogin();
    header();
    let clotheForm = document.querySelector('.add-clothing')
    let selector = document.querySelector('.add-clothing select')

    useFetch('/S2_PHP/api/tag/', 'GET')
        .then(response => {
            if (response) {
                for (let i = 0; i < response.length; i++) {
                    let opt = document.createElement('option');
                    opt.appendChild( document.createTextNode(response[i].name) );
                    opt.value = response[i].id;
                    selector.appendChild(opt);
                }
            }
        })

    clotheForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData(e.target);
        const form = Object.fromEntries(formData);

        if (!sessionStorage.getItem('fashion_token')) {
            alert("you must login")
            return;
        }

        useFetch('/S2_PHP/api/clothing', 'POST', {
            type: form.type,
            color: form.color,
            url_shop: form.color,
            style: form.style,
            store: form.store,
            idTag: form.tag
        }).then(response => {
            if (response) {
                alert("c'est créer!")
            }
        })
    });
});
