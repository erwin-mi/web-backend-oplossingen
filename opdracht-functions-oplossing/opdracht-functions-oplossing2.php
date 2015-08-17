<?php
	$testArray = array ('appel', 'peer', 'banaan');
	
	function drukArrayAf ($array) {
		$result = '';
		foreach($array as $key => $value) {
    		$result .= '$testArray[' . $key . '] heeft de waarde ' . $value . '<br>';
		}
		return $result;
	}
	$drukArrayAfResult = drukArrayAf ($testArray);
	
/*-------------------------------------------------------------*/
	
	$testMultiArray = array ('fruit' => array('appel', 'peer'),
							'groenten' => array('sla', 'tomaat'));
							
	function drukMultiArrayAf ($array) {
		static $result = '$testMultiArray is opgebouwd uit:<br>';
		foreach($array as $key => $value) {
			if(is_array($value)){
				$result .= '&bull; key [' . $key . '] heeft een arrey als waarde:<br>';
				drukMultiArrayAf ($value);
        	} else{
            	$result .= '&nbsp;&nbsp;&nbsp;&#9642 waarin key [' . $key . '] de waarde ' . $value . ' heeft<br>';
        	}
		}
		return $result;
	}
	$drukMultiArrayAfResult = drukMultiArrayAf ($testMultiArray);
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
            <h1 class="extra">Opdracht functies: deel 2</h1>

            <ul>
                <li>Maak een functie <code>drukArrayAf</code> die 1 parameter heeft, <code>$array</code></li>

                <li>Deze <code>$array</code> bevat enkele waarden die je zelf mag kiezen</li>

                <li>Resultaat:

                    <ul>
                        	<ul>
                        		<li><?= $drukArrayAfResult ?></li>
                        	</ul>

                        <li>De naam van de array afdrukken is niet zo belangerijk (mag hardcoded of via een andere inventieve manier)</li>
                        
                        <li class="extension">Zorg ervoor dat je ook meerdimensionale arrays kan afdrukken op dezelfde manier:
                        	<ul>
                        		<li><?= $drukMultiArrayAfResult ?></li>
                        	</ul>
                        </li>
                    </ul>
                </li>

                <li>Maak een functie <code>validateHtmlTag</code> die 1 parameter heeft, <code>$html</code>

                    <ul>
                        <li>Zorg ervoor dat deze functie kan valideren of er een correcte &lt;html&gt;&lt;/html&gt; tag aanwezig is in de gegeven string <code>$html</code></li>
                    </ul>
                </li>

                <li>Voer al deze functies uit en zorg ervoor dat de resultaten op het scherm verschijnen</li>

            </ul>

        </section>

    </body>
</html>