<?php
	$text = file_get_contents('D:\Erwin\SkyDrive\Drupal\PHP\web-backend\oplossingen\opdracht-looping-statements-foreach-oplossing\text-file.txt');
	$textChars = str_split($text);
	rsort($textChars);
	sort($textChars);
	$charCount = array_count_values($textChars);
	$elementsCount = count($charCount);
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht foreach</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
            <h1>Opdracht foreach: deel 1</h1>

            <ul>
                <li>Maak een HTML-document met een PHP code-block</li> 
                <li>
                    Lees de tekst (text-file.txt) in en stop de tekst in een variabele <code>$text</code>.
                    <span class="tip">Misschien helpt de functie <code>file_get_contents</code></span>
                </li>
                <li>Splits de tekst op per karakter en sla deze op in een array <code>$textChars</code> ( dus een array die bestaat uit waarden van maximum 1 karakter)</li>
                <li>Zorg ervoor dat deze array gesorteerd wordt van Z naar A</li>
                <li>Draai nu de volgorde van de array volledig om</li>
                <li>Zorg er nu voor dat je via een for-lus alle karakters van de tekst overloopt en bijhoudt hoeveel keer elk karakter voorkomt. Toon een lijst met:
                    <ul>
                        <li>Hoeveel verschillende karakters er in totaal voorkomen:</li>
                        	<ul>
								<li>Er komen <?= $elementsCount ?> verschillende karakters voor.</li>
                            </ul>
                        </li>
                        <li>Hoeveel elk karakter voorkomt:
                        	  <ul>
								<?php foreach ($charCount as $char => $Count): ?>
                                    <li>Het karakter '<?php echo $char ?>' komt <?php echo $Count ?> keer voor.</li>
                                <?php endforeach ?>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </section>
    </body>
</html>