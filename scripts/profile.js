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

    const follow = document.querySelector('.follow');
    const unfollow = document.querySelector('.unfollow');


    let connected_profile = false
    if (userId === sessionStorage.getItem('fashion_token')) {
        connected_profile = true

        document.querySelector('.unfollow').style.display = 'none'
        document.querySelector('.follow').style.display = 'none'

        console.log("my profile")
    }


    let following = false
    if (!connected_profile) {
        useFetch('/S2_PHP/api/following/getFollowers/' + userId, 'GET')
            .then(response => {
                let i = 0;
                for (i; i < response.length; i++) {
                    if (response[i].id === sessionStorage.getItem('fashion_token')) {
                        following = true
                        document.querySelector('.unfollow').style.display = 'block'
                        document.querySelector('.follow').style.display = 'none'
                        return;
                    }
                    document.querySelector('.unfollow').style.display = 'none'
                    document.querySelector('.follow').style.display = 'block'
                }
            })
    }




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
            profile_picture.src = '/S2_PHP/api/' + response.profile_picture;
            username.innerHTML = response.pseudo;
        })

    // faire le trait séparateur

    //posts
    const posts = document.querySelector('.posts');

    useFetch('/S2_PHP/api/post/getAllPostsFromUserId/' + userId, 'GET', {})
        .then(response => {
            displayPosts(response, '.posts')
        })



    //bouton pour s'abonner

    follow.addEventListener('click', (e) => {
        e.preventDefault();

        if (userId !== sessionStorage.getItem('fashion_token')) { //si le profile n'est pas celui de la personne connectée
            console.log("the profile is not the profile of the connected user")

            useFetch('/S2_PHP/api/following/getFollowers/' + userId, 'GET', {}) //si la personne n'est pas déjà abonnée
                .then(response => {
                    let i = 0;
                    for (i; i < response.length; i++) {
                        if (response[i].id === sessionStorage.getItem('fashion_token')) {
                            console.log("already following")
                            return;
                        }
                    }

                    useFetch('/S2_PHP/api/following/', 'POST', {
                        idFollowing : userId,
                        idFollower : sessionStorage.getItem('fashion_token')
                    }).then(response => {
                        console.log("followed")
                        followers_number.innerHTML = i + 1;
                        document.querySelector('.follow').style.display = 'none'
                        document.querySelector('.unfollow').style.display = 'block'
                        following = true
                    })
                })
        }
    })

    //bouton pour se désabonner

    unfollow.addEventListener('click', (e) => {
        e.preventDefault();

        useFetch('/S2_PHP/api/following/' + sessionStorage.getItem('fashion_token') + '/' + userId, 'DELETE', {})
            .then(response => {
                console.log("unfollowed")
                followers_number.innerHTML -= 1;
                document.querySelector('.unfollow').style.display = 'none'
                document.querySelector('.follow').style.display = 'block'
                following = false
        })
    })

    console.log(profile)
}

