import {useFetch, toBase64} from "./modules/fetchTools";

window.addEventListener('DOMContentLoaded', () => {
    useFetch('http://localhost/S2_PHP/api/example', 'GET').then(results => {
        console.log(results)
    })

    const form = document.querySelector('.form')
    form.addEventListener('submit', async (e) => {
        e.preventDefault()
        let working = true;
        let image = document.querySelector('.image').files[0]
        const result = await toBase64(image).catch(e => Error(e));
        if (result instanceof Error) {
            working = false
            console.log('Error: ', result.message);
        }

        if (working) {
            document.querySelector('.dynamic').src = result
            document.querySelector('iframe').contentDocument.open().write(result);
        }
    })

    /*useFetch('http://localhost/S2_PHP/api/example/7', 'DELETE').then(results => {
        console.log(results)
    })

    useFetch('http://localhost/S2_PHP/api/example/', 'POST', {
        example_name: 'Sara_nvelle',
        description: 'test_nvelle',
    }).then(results => {
        console.log(results)
    })

    useFetch('http://localhost/S2_PHP/api/example/9', 'PUT', {
        description: 'Sara_nvellePUT'
    }).then(results => {
        console.log(results)
    })*/
})