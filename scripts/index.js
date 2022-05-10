import {useFetch} from "./modules/fetchTools";

window.addEventListener('DOMContentLoaded', () => {
    useFetch('/S2_PHP/api/example', 'GET').then(results => {
        console.log(results)
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