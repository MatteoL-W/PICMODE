import {useFetch} from "./fetchTools.js";

/**
 * @brief Get Y-m-d current date
 * @returns {string}
 */
export function getDate() {
    let today = new Date();
    const dd = String(today.getDate()).padStart(2, '0');
    const mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    const yyyy = today.getFullYear();
    return yyyy + '-' + mm + '-' + dd;
}

export function clear(classname) {
    document.querySelector(classname).innerHTML = '';
}

export function header() {
    const userId = sessionStorage.getItem('fashion_token')
    if (userId) {
        useFetch('/S2_PHP/api/user/'+userId, 'GET')
            .then(response => {
                document.querySelector('.profil_name').innerHTML = response.pseudo;
                document.querySelector('.profil_name').setAttribute('href', 'profile.html?user='+response.id);
                document.querySelector('.profil_picture').src = '/S2_PHP/api/' + response.profile_picture;
            })
    }

}

export function needToLogin() {
    if (!sessionStorage.getItem('fashion_token')) {
        alert("you must login")
        window.location.href = "/S2_PHP/login.html";
        return
    }
}