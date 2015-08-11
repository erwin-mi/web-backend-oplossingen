<?php
	$fruit = 'ananas';
	$posA = strpos ($fruit, 'a', 3);
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht string extra functions</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
            <h1>Opdracht string extra functions: deel 2</h1>

            <ul>
                <li>Maak een variabele <code>fruit</code> met waarde <code>'ananas'</code></li>
                <li>Bepaal de positie van de laatste 'a' in de variabele <code>$fruit</code>.</li>
                <li>Druk deze waarde af:</li>
                	<ul>
                    	<li><?= $posA ?></li>
                    </ul>
                <li>Zet het de value van de <code>$fruit</code> variable in hoofdletters enkel door gebruik te maken van een PHP-functie:</li>
                	<ul>
                    	<li><?= strtoupper ($fruit) ?></li>
                    </ul>
            </ul>
        </section>

    </body>
</html>
