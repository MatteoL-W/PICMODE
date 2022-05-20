import {createDiv, createElementAndText, createImage} from "./htmlTools.js"

export function displayPosts(posts, selector) {
    for (let i = 0; i < posts.length; i++) {
        let post = generatePostHtml(posts[i])
        document.querySelector(selector).appendChild(post);
    }
}

export function generatePostHtml(post) {
    // A post have a "description", a "picture", a "date" and will have an idAuthor -> "pseudo" / "name" / "firstName" / "profile_picture"
    //pseudo
    const postUserName = createElementAndText('a', post.pseudo);
    postUserName.classList.add('user');
    postUserName.setAttribute('href', 'profile.html?user='+post.idUser)

    //date
    const postDate = createElementAndText('p', post.date);
    postDate.classList.add('hour');

    //profile_picture
    const postUserPicture = createImage('api/' + post.profile_picture);
    postUserPicture.classList.add('pictureProfil');

    //picture
    const postPicture = createImage('api/' + post.picture);


    //description
    const postDescription = createElementAndText('p', post.description);

    //tags
    //const postTag = createElementAndText('a', post.tag);

    //like
    //const postLike = createElementAndText('a', post.react);
    //const postLikeImg = createImage('api/' + post.like);

    //add
    //const postAdd = createElementAndText('a', post.react);
    //const postAddimg = createImage('api/' + post.add);


    const card = createDiv(['post']);
    const head = createDiv(['head']);
    const right = createDiv(['right']);
    card.appendChild(head);
    head.appendChild(postDate);
    head.appendChild(right);
    right.appendChild(postUserName);
    right.appendChild(postUserPicture);
    card.appendChild(postPicture);
    //const foot = createDiv(['foot']);
    //const tags = createDiv(['tags']);
    //const react = createDiv(['post_button']);
    //foot.appendChild(tags);
    //tags.appendChild()

    card.appendChild(postDescription);


    return card;
}