import {createDiv, createElementAndText, createImage} from "./htmlTools.js"

export function displayPosts(posts, selector) {
    console.log(posts)
    for (let i = 0; i < posts.length; i++) {
        let post = generatePostHtml(posts[i])
        document.querySelector(selector).appendChild(post);
    }
}

export function generatePostHtml(post) {
    // A post have a "description", a "picture", a "date" and will have an idAuthor -> "pseudo" / "name" / "firstName" / "profile_picture"
    //pseudo
    const postUserName = createElementAndText('div', post.pseudo);
    postUserName.classList.add('user');

    //date
    const postDate = createElementAndText('p', post.date);
    postDate.classList.add('hour');

    //profile_picture
    const postUserPicture = createImage('/S2_PHP/api' + post.profile_picture);
    postUserPicture.classList.add('pictureProfil');

    //picture
    const postPicture = createImage('/S2_PHP/api' + post.picture);

    //description
    const postDescription = createElementAndText('p', post.description);

    const card = createDiv(['post']);
    const head = createDiv(['head']);
    const author = document.createElement('a');
    author.classList.add('right')
    if (post.idUser) {
        author.setAttribute('href', 'profile.html?user=' + post.idUser)
    }

    const content = document.createElement('a');
    content.classList.add('content')
    if (!window.location.href.includes('postId')) {
        console.log(post)
        content.setAttribute('href', '/S2_PHP/post.html?postId=' + post.id)
    }

    card.appendChild(head);
    head.appendChild(postDate);
    head.appendChild(author);
    author.appendChild(postUserName);
    author.appendChild(postUserPicture);
    card.appendChild(content);
    content.appendChild(postPicture);
    content.appendChild(postDescription);
    //const foot = createDiv(['foot']);
    //const tags = createDiv(['tags']);
    //const react = createDiv(['post_button']);
    //foot.appendChild(tags);
    //tags.appendChild()


    return card;
}