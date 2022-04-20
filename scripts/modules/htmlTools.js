/**
 * @brief Create a textual element and fill it with text
 * @param element
 * @param text
 * @returns {*}
 */
export function createElementAndText(element, text) {
    let newElement = document.createElement(element);
    const newText = document.createTextNode(text);
    newElement.appendChild(newText);
    return newElement;
}

/**
 * @brief Create an image and fill it with an src
 * @param src
 * @returns {HTMLImageElement}
 */
export function createImage(src) {
    let newPicture = document.createElement('img');
    newPicture.src = src;
    return newPicture;
}

/**
 * @brief Create a div with multiples classes
 * @param classes
 * @returns {HTMLDivElement}
 */
export function createDiv(classes = []) {
    let newDiv = document.createElement('div');
    classes.forEach((className) => {
        newDiv.classList.add(className);
    })
    return newDiv;
}