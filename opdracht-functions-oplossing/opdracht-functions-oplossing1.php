<?php
	$testGetal1 = 5;
	$testGetal2 = 10;
	$testString = 'alsdkfj';
	
	function berekenSom ($getal1, $getal2) {
		$som = $getal1 + $getal2;
		return $som;
	}
	$berekenSomResult = berekenSom ($testGetal1, $testGetal2);
	
	function berekenProduct ($getal1, $getal2) {
		$product = $getal1 * $getal2;
		return $product;
	}
	$berekenProductResult = berekenProduct ($testGetal1, $testGetal2);
	
	function isEven ($getal) {
		if ($getal%2 === 0) {
			$result = TRUE;
		} else {
			$result = FALSE;
			$result = (int)$result;}
		return $result;
	}
	$isEvenResult = isEven ($testGetal1);
	
	function stringToUpperLength ($string) {
		$stringToUpper = strtoupper($string);
		$stringLength = strlen($string);
		$result = array($stringToUpper, $stringLength);
		return $result;
	}
	$stringToUpperLengthResult = stringToUpperLength ($testString);
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht functies</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
            <h1>Opdracht functies: deel 1</h1>

            <ul>

                <li>Maak een functie <code>berekenSom</code> die 2 parameters heeft, <code>$getal1</code> en <code>$getal2</code>

                    <ul>
                        <li>Zorg ervoor dat in deze functie de som van de twee getallen wordt berekend.</li>
                        <li>Deze functie returnt het resultaat:
                        	<ul>
                        		<li>Resultaat som is <?= $berekenSomResult; ?>.</li>
                        	</ul>
                        </li>
                        <li>
                            <p class="remark">Zorg ervoor dat de functie enkel een waarde returnt. Het afdrukken moet buiten de functie gebeuren. 
                                Het combineren van meerdere functionaliteiten in één functie vermindert de herbruikbaarheid van de functie. Probeer vanaf nu te vermijden dat een functie meerdere dingen doet (zoals berekenen én afdrukken), ook al lijkt dit in het begin meer werk.</p>
                        </li>
                    </ul>
                </li>


                <li>Maak een functie <code>vermenigvuldig</code> die 2 parameters heeft, <code>$getal1</code> en <code>$getal2</code>

                    <ul>
                        <li>Zorg ervoor dat in deze functie het product wordt berekend.</li>
                        <li>Deze functie returnt het resultaat:
                        	<ul>
                        		<li>Resultaat product is <?= $berekenProductResult; ?>.</li>
                        	</ul>
                        </li>
                    </ul>
                </li>

                <li>Maak een functie <code>isEven</code> met 1 parameter <code>$getal</code>

                    <ul>
                        <li>Zorg ervoor dat in deze functie een boolean returnt die afhankelijk van het gegeven getal <code>true</code> of <code>false</code> is:
                        	<ul>
                        		<li>Resultaat test even is <?= $isEvenResult; ?>.</li>
                        	</ul>
                        </li>
                    </ul>
                </li>

                <li>Voer al deze functies uit en zorg ervoor dat de resultaten op het scherm verschijnen</li>

                <li class="extension">Maak een functie aan die de lengte én de uppercase-versie van een string returnt. Druk daarna de lengte en de uppercase-versie van de string af buiten de functie. <span class="tip">return een array.</span>
                	<ul>
                        		<li>Lengte van de string <?= $stringToUpperLengthResult[0]; ?> is <?= $stringToUpperLengthResult[1]; ?>.</li>
                        	</ul>
                </li>

            </ul>
        </section>

    </body>
</html>