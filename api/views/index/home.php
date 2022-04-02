<main class="container">
<h1>API Generated Documentation</h1>
<?php
// ToDo Make a cleaner code
$html = '<table>';
$html .= '<tr><th>Route link</th><th>Method</th><th>Short description</th></tr>';
for ($i = 0; $i < count($routes); $i++) {
    $url = $routes[$i][0];
    $method = $routes[$i][1]['method'];
    $desc = $routes[$i][1]['desc'];
    $html .= "<tr><td><a href='.$url'>$url</a></td><td>$method</td><td>$desc</td></tr>";
}

$html .= '</table>';

echo $html;
?>

</main>

<script>
    window.addEventListener('DOMContentLoaded', () => {
        const url = 'http://localhost/S2_PHP/api/example';

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