import {useFetch} from "./modules/fetchTools.js";
import {generatePostHtml} from "./modules/postTools.js";
import {clear, header, needToLogin} from "./modules/tools.js";

window.addEventListener('DOMContentLoaded', () => {
    header();
    needToLogin();
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const postId = urlParams.get('postId')

    if (!postId) {
        // gérer mieux l'erreur
        alert("merci de sélectionner un post / http://localhost/S2_PHP/profile.html?postId=3 par exemple");
    }

    // All clothes in selector
    let selector = document.querySelector('.clothesSelector')
    useFetch('/S2_PHP/api/clothing/', 'GET')
        .then(response => {
            if (response) {
                for (let i = 0; i < response.length; i++) {
                    let opt = document.createElement('option');
                    opt.appendChild(document.createTextNode(response[i].type + " / " + response[i].color));
                    opt.value = response[i].id;
                    selector.appendChild(opt);
                }
            }
        })

    // get info of the post
    useFetch('/S2_PHP/api/post/' + postId, 'GET')
        .then(response => {
            displayPost(response, '.postPage');
            if (response.idUser != sessionStorage.getItem('fashion_token')) {
                document.querySelector('.link-clothing').style.display = 'none';
            }
        })

    // Display the clothes list
    let clothesList = document.querySelector('.clothesList')
    useFetch('/S2_PHP/api/clothing/getFromPost/' + postId, 'GET')
        .then(response => {
            for (let i = 0; i < response.length; i++) {
                let li = document.createElement('li');
                li.appendChild(document.createTextNode(response[i].type + " from "));
                let shopLink = document.createElement('a')
                shopLink.setAttribute('href', response[i].url_shop)
                shopLink.appendChild(document.createTextNode(response[i].store))
                li.appendChild(shopLink)
                clothesList.appendChild(li);
            }
        })

    // Display the tags
    let tagsList = document.querySelector('.tagsList')
    useFetch('/S2_PHP/api/tag/getTagFromIdPost/' + postId, 'GET')
        .then(response => {
            for (let i = 0; i < response.length; i++) {
                let link = document.createElement('a');
                link.setAttribute('href', '/S2_PHP/tag.html?tagId=' + response[i].id)
                let li = document.createElement('li');
                li.appendChild(document.createTextNode(response[i].name))
                link.appendChild(li)
                tagsList.appendChild(link);
            }
        })

    // Link a clothe to a post
    let linkForm = document.querySelector('.link-clothing')
    linkForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData(e.target);
        const form = Object.fromEntries(formData);

        if (!sessionStorage.getItem('fashion_token')) {
            alert("you must login")
            return;
        }

        useFetch('/S2_PHP/api/contains', 'POST', {
            idPost: postId,
            idClothing: form.clothes
        }).then(response => {
            if (response) {
                clear('.clothesList');
                clear('.tagsList');
                useFetch('/S2_PHP/api/clothing/getFromPost/' + postId, 'GET')
                    .then(response => {
                        for (let i = 0; i < response.length; i++) {
                            let li = document.createElement('li');
                            li.appendChild(document.createTextNode(response[i].type + " from "));
                            let shopLink = document.createElement('a')
                            shopLink.setAttribute('href', response[i].url_shop)
                            shopLink.appendChild(document.createTextNode(response[i].store))
                            li.appendChild(shopLink)
                            clothesList.appendChild(li);
                        }
                    })
                useFetch('/S2_PHP/api/tag/getTagFromIdPost/' + postId, 'GET')
                    .then(response => {
                        for (let i = 0; i < response.length; i++) {
                            let li = document.createElement('li');
                            li.appendChild(document.createTextNode(response[i].name));
                            tagsList.appendChild(li);
                        }
                    })
            }
        })

    });
});

function displayPost(post, selector) {
    // je recommande d'utiliser la fonction generatePostHtml(post) du module postTools.js pour
    // afficher le post en question en évitant les doublons de code
    let postGenerated = generatePostHtml(post)
    document.querySelector(selector).appendChild(postGenerated);
}