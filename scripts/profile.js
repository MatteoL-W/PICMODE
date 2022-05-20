import {useFetch} from "./modules/fetchTools.js";
import {displayPosts} from "./modules/postTools.js";
import {header, needToLogin} from "./modules/tools";

window.addEventListener('DOMContentLoaded', () => {
    needToLogin();
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const userId = urlParams.get('user')

    if (!userId) {
        alert("merci de sélectionner un user / http://localhost/S2_PHP/profile.html?user=2 par exemple");
    }

    useFetch('/S2_PHP/api/user/' + userId, 'GET')
        .then(response => {
            displayProfile(response, '.profile', userId);
        })

    useFetch('/S2_PHP/api/post/getAllPostsFromUserId/' + userId, 'GET')
        .then(response => {
            displayPosts(response, '.section');
        })

    header();
});

function displayProfile(profile, selector, userId) {
    const follow = document.querySelector('.follow');
    const unfollow = document.querySelector('.unfollow');
    unfollow.style.display = 'none'
    follow.style.display = 'block'

    const followersNumberElement = document.querySelector('.followers');

    useFetch('/S2_PHP/api/following/countFollowers/' + userId, 'GET', {})
        .then(response => {
            followersNumberElement.innerHTML = Object.values(response)[0];
        })


    //nombre d'abonnements
    const followingNumberElement = document.querySelector('.following');

    useFetch('/S2_PHP/api/following/countFollowing/' + userId, 'GET', {})
        .then(response => {
            followingNumberElement.innerHTML = Object.values(response)[0];
        })

    //profile picture + username
    const profilePictureElement = document.querySelector('.profilePicture');
    const usernameElement = document.querySelector('.username');

    useFetch('/S2_PHP/api/user/' + userId, 'GET', {})
        .then(response => {
            profilePictureElement.src = '/S2_PHP/api/' + response.profile_picture;
            usernameElement.innerHTML = response.pseudo;
        })

    if (userId === sessionStorage.getItem('fashion_token')) {
        unfollow.style.display = 'none'
        follow.style.display = 'none'
        return
    }

    // Abonnés
    useFetch('/S2_PHP/api/following/getFollowers/' + userId, 'GET')
        .then(response => {
            let followersIndex = 0;
            for (followersIndex; followersIndex < response.length; followersIndex++) {
                if (response[followersIndex].id === sessionStorage.getItem('fashion_token')) {
                    unfollow.style.display = 'block'
                    follow.style.display = 'none'
                    return;
                }
            }
        })

    // Bouton de follow
    follow.addEventListener('click', (e) => {
        e.preventDefault();

        useFetch('/S2_PHP/api/following/getFollowers/' + userId, 'GET', {}) //si la personne n'est pas déjà abonnée
            .then(response => {
                let i = 0;
                for (i; i < response.length; i++) {
                    if (response[i].id === sessionStorage.getItem('fashion_token')) {
                        follow.style.display = 'none';
                        return;
                    }
                }

                useFetch('/S2_PHP/api/following/', 'POST', {
                    idFollowing: userId,
                    idFollower: sessionStorage.getItem('fashion_token')
                }).then(response => {
                    console.log("followed")
                    followersNumberElement.innerHTML = i + 1;
                    follow.style.display = 'none'
                    unfollow.style.display = 'block'
                })
            })

    })

    //bouton pour se désabonner

    unfollow.addEventListener('click', (e) => {
        e.preventDefault();

        useFetch('/S2_PHP/api/following/' + sessionStorage.getItem('fashion_token') + '/' + userId, 'DELETE', {})
            .then(response => {
                console.log("unfollowed")
                followersNumberElement.innerHTML -= 1;
                unfollow.style.display = 'none'
                follow.style.display = 'block'
            })
    })

}

