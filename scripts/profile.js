import {useFetch} from "./modules/fetchTools.js";
import {displayPosts} from "./modules/postTools.js";

window.addEventListener('DOMContentLoaded', () => {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const userId = urlParams.get('user')

    if (!userId) {
        // gérer mieux l'erreur
        alert("merci de sélectionner un user / http://localhost/S2_PHP/profile.html?user=2 par exemple");
    }

    useFetch('/S2_PHP/api/user/' + userId, 'GET')
        .then(response => {
            // Quand on récupère les résultats, on les affiche
            displayProfile(response, '.profile', userId);
        })

    // utiliser un fetch et displayPosts pour afficher les posts de l'utilisateur en question
});

function displayProfile(profile, selector, userId) {

    //nombre d'abonnés
    const followers_number = document.querySelector('.followers');

    useFetch('/S2_PHP/api/following/countFollowers/' + userId, 'GET', {})
        .then(response => {
            followers_number.innerHTML = Object.values(response)[0];
        })
    //console.log(followers_nb)


    //nombre d'abonnement
    const following_number = document.querySelector('.following');

    useFetch('/S2_PHP/api/following/countFollowing/' + userId, 'GET', {})
        .then(response => {
            following_number.innerHTML = Object.values(response)[0];
        })

    //profile picture
    //username
    const profile_picture = document.querySelector('.profilePicture');
    const username = document.querySelector('.username');

    useFetch('/S2_PHP/api/user/' + userId, 'GET', {})
        .then(response => {
            profile_picture.innerHTML = response.profile_picture;
            username.innerHTML = response.pseudo;
        })



    // faire le trait séparateur

    //posts
    const posts = document.querySelector('.posts');

    useFetch('/S2_PHP/api/post/getAllPostsFromUserId/' + userId, 'GET', {})
        .then(response => {
            console.log(response)
            displayPosts(response, '.posts')
        })


    console.log(profile)
}

