<?php
	$lettertje = 'e';
	$cijfertje = 3;
	$langsteWoord = 'zandzeepsodemineralenwatersteenstralen';
	$vervangWoord = str_replace('e', 3, $langsteWoord);
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
    		<h1>Opdracht string extra functions: deel 3</h1>

    		<ul> 
                <li>Maak een variabele <code>$lettertje</code> met <code>'e'</code> als value</li>
                <li>Maak een variabele <code>$cijfertje</code> met <code>3</code> als value</li>
                <li>Maak een variabele <code>$langsteWoord</code> met <code>'zandzeepsodemineralenwatersteenstralen'</code> als value</li>
                <li>Vervang nu alle e’s in de <code>$langsteWoord</code> variable door 3's:
                	<ul>
                    	<li><?= $vervangWoord ?></li>
                    </ul> 
                    <p class="remark">Je mag enkel gebruik maken van de variable names. De values  <code>'e'</code>, <code>'3'</code> en <code>'zandzeepsodemineralenwatersteenstralen'</code> mogen in totaal maar één keer in het php-document voorkomen.</p>
                </li>
    		</ul>

        </section>

    </body>
</html>