import {fetchGET, fetchPOST} from "./modules/fetchTools";

window.addEventListener('DOMContentLoaded', () => {
    fetchGET('http://localhost/S2_PHP/api/example').then(results => {
        console.log(results)
    })

    fetchPOST('http://localhost/S2_PHP/api/example', {
        example_name: 'Sara_nvelle',
        description: 'test_nvelle',
    }).then(results => {
        console.log(results)
    })
})