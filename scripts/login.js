import {useFetch} from "./modules/fetchTools";

window.addEventListener('DOMContentLoaded', () => {
    if (sessionStorage.getItem('fashion_token')) {
        location.assign('http://localhost/S2_PHP/home');
    }

    let loginForm = document.querySelector('.loginForm');
    loginForm.addEventListener('submit', (e) => {
        e.preventDefault();

        const formData = new FormData(e.target);
        const form = Object.fromEntries(formData);

        useFetch('http://localhost/S2_PHP/api/user/login', 'POST', {
            pseudo: form.name,
            password: form.password,
        }).then(results => {
            if (results) {
                sessionStorage.setItem('fashion_token', results);
                location.assign('http://localhost/S2_PHP/home');
            }
        })
    })
})