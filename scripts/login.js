import {useFetch, toBase64} from "./modules/fetchTools.js";

function loginFormHandling() {
    let loginForm = document.querySelector('.loginForm');
    loginForm.addEventListener('submit', (e) => {
        e.preventDefault();

        const formData = new FormData(e.target);
        const form = Object.fromEntries(formData);

        useFetch('/S2_PHP/api/user/login', 'POST', {
            pseudo: form.pseudo,
            password: form.password
        }).then(results => {
            if (results) {
                sessionStorage.setItem('fashion_token', results);
                location.assign('/S2_PHP/home');
            } else {
                alert("didnt login")
            }
        })
    })
}

function registerFormHandling() {
    let registerForm = document.querySelector('.registerForm');
    registerForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData(e.target);
        const form = Object.fromEntries(formData);

        // vérifier que profile pic est une image

        const base64picture = await toBase64(form.profile_picture).catch(e => Error(e));
        if (!base64picture instanceof Error) {
            alert("pdp marche po");
            return;
        }

        useFetch('/S2_PHP/api/user/', 'POST', {
            pseudo: form.pseudo,
            mail_address: form.mail_address,
            password: form.password,
            name: form.name,
            firstname: form.firstname,
            date_of_birth: form.date_of_birth,
            profile_picture: base64picture
        }).then(results => {
            if (results) {
                alert("wp! login now!");
            } else {
                alert("didnt register")
            }
        })
    })
}

window.addEventListener('DOMContentLoaded', () => {
    if (sessionStorage.getItem('fashion_token')) {
        location.assign('/S2_PHP/home');
    }

    loginFormHandling();
    registerFormHandling();
})