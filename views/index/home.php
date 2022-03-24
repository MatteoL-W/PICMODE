<h1>home <?= $nom ?></h1>

<script>
    window.addEventListener('DOMContentLoaded', () => {
        const url = 'http://localhost/S2_PHP/example';

        /*let data = {
            name: 'Sara',
            description: 'test',
        }*/

        let request = new Request(url, {
            //method: 'POST',
            method: 'GET',
            //body: JSON.stringify(data),
            headers: new Headers()
        });

        fetch(request)
            .then(response => {
                response.text().then(data => {
                    console.log(data)
                })
            })
            .catch(error => {
                console.log(error)
            })
    })
</script>