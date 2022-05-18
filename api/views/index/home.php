<?php
$generatedTable = '';
$header = '<tr><th>Route link</th><th>Method</th><th>Short description</th></tr>';
$controller = '';

for ($i = 0, $iMax = count($routes); $i < $iMax; $i++) {
    $url = $routes[$i][0];
    $method = $routes[$i][1]['method'];
    $desc = $routes[$i][1]['desc'];
    $newController = $routes[$i][1]['controller'];

    $htmlMethod = "<span class='circle $method'></span>" . $method;

    if ($controller != $newController) {
        $controller = $newController;
        $generatedTable .= "</table><h2>$controller</h2><table>$header";
    }

    $generatedTable .= "<tr><td><a href='.$url'>$url</a></td><td class='flexing'>$htmlMethod</td><td class='description'>$desc</td></tr>";
}

$generatedTable .= '</table>';
?>


<main class="container">
    <h1>API Generated Documentation</h1>
    <?= $generatedTable ?>
</main>