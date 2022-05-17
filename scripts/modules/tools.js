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