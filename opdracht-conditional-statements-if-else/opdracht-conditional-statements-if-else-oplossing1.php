<?php
	$jaartal = 1900;
	if ($jaartal %4 === 0 && ($jaartal %400 === 0 || $jaartal %100 != 0 )) {
		$message = 'dit is een schrikkeljaar!';
		} 
	else {
		$message = 'dit is geen schrikkeljaar!';
	};
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht if else</title> 
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
            <h1>Opdracht if else: deel 1</h1>

            <ul>
                <li>Maak een PHP-script dat kan bepalen of de variabele 'jaartal' al dan niet een schrikkeljaar is
                    <ul>
                        <li>Een jaar is een schrikkeljaar als het deelbaar is door 4</li>
                        <li>Een jaartal deelbaar door 100 is geen schrikkeljaar, tenzij het deelbaar is door 400.</li>
                    </ul>
                </li>
                <li>Jaartal is <?= $jaartal ?>: <?= $message ?></li>
            </ul>  
        </section>

    </body>
</html>