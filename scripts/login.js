import {useFetch} from "./modules/fetchTools";

window.addEventListener('DOMContentLoaded', () => {
    let loginForm = document.querySelector('.loginForm');
    loginForm.addEventListener('submit', (e) => {
        e.preventDefault();

        const formData = new FormData(e.target);
        const formProps = Object.fromEntries(formData);

        useFetch('http://localhost/S2_PHP/api/user/login', 'POST', {
            pseudo: formProps.name,
            password: formProps.password,
        }).then(results => {
            if (results) {
                sessionStorage.setItem('id', results);
            }
        })
    })
})