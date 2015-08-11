<?php
	$getal = 1;
	switch ($getal) {
		case 1:
			$dag = 'maandag'; 
			break;
		case 2:
			$dag = 'dinsdag'; 
			break;
		case 3:
			$dag = 'woensdag'; 
			break;
		case 4:
			$dag = 'donderdag'; 
			break;
		case 5:
			$dag = 'vrijdag'; 
			break;
		case 6:
			$dag = 'zaterdag'; 
			break;
		case 7:
			$dag = 'zondag'; 
			break;
		default:
			$dag = 'onjuist getal!'; 
		};
	$dagUpper = strtoupper ($dag);
	$groteKlinker = array('A', 'E', 'I', 'O', 'U');
	$kleineKlinker = array('a', 'e', 'i', 'o', 'u');
	$dagKleineKlinkers = str_replace ($groteKlinker, $kleineKlinker, $dagUpper);
	$dagKleineLaatsteKlinker = str_replace ('DAG', 'DaG', $dagUpper);
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht conditional statements</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
    		<h1 class="extra">Opdracht conditional statements: deel 2</h1>

    		<ul>
                <li>Maak een kopie van deel 1</li>
    			<li>Zet de naam van de dag (bv <code>'maandag'</code>) doormiddel van een string-functie dan naar hoofdletters om (bv <code>'MAANDAG'</code>):</li>
                	<ul>
                    	<li><?= $dagUpper ?></li>
                    </ul>
                <li>Zet alle letters in hoofdletters, behalve de 'a':</li>
                	<ul>
                    	<li><?= $dagKleineKlinkers ?></li>
                    </ul>
                <li>Zet alle letters in hoofdletters, behalve de laatste 'a':</li>
                	<ul>
                    	<li><?= $dagKleineLaatsteKlinker ?></li>
                    </ul>
    		</ul>

        </section>

    </body>
</html>