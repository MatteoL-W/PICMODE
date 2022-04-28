import {createDiv, createElementAndText, createImage} from "./htmlTools"

export function displayPosts(posts, selector) {
    for (let i = 0; i < posts.length; i++) {
        let post = generatePostHtml(posts[i])
        document.querySelector(selector).appendChild(post);
    }
}

export function generatePostHtml(post) {
    // A post have a "description", a "picture", a "date" and will have an idAuthor -> "pseudo" / "name" / "firstName" / "profile_picture"

    const postDate = createElementAndText('p', post.date);
    const postDescription = createElementAndText('p', post.description);
    const postPicture = createImage(post.picture)

    const card = createDiv(['card']);
    card.appendChild(postDate);
    card.appendChild(postDescription);
    card.appendChild(postPicture);

    return card;
}