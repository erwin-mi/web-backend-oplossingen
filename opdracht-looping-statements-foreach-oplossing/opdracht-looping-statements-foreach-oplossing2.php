<?php
	$text = file_get_contents('D:\Erwin\SkyDrive\Drupal\PHP\web-backend\oplossingen\opdracht-looping-statements-foreach-oplossing\text-file.txt');
	$textChars = str_split($text);
	sort($textChars);
	$onlyAlpha = preg_grep('/[a-zA-Z]/', $textChars);
	$allToLower = array_map('strtolower', $onlyAlpha);
	$charCount = array_count_values($allToLower);
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
            <h1 class="extra">Opdracht foreach: deel 2</h1>

            <ul>
                <li>Maak een HTML-document met een PHP code-block</li> 

                <li>Maak een variabele <code>$tekst</code> met waarde (volledige inhoud van text-file.txt)</li>

                <li>Analyseer hoe vaak elke letter van het alfabet voorkomt in de tekst (enkel de letters uit het alfabet, geen onderscheid tussen hoofdletters en kleine letters)</li>

                <li>Toon de resultaten op het scherm:
                	<?php foreach ($charCount as $char => $Count): ?>
                          <li>Het karakter '<?php echo $char ?>' komt <?php echo $Count ?> keer voor.</li>
                     <?php endforeach ?>
                    <p class="tip">Doe wat opzoekingswerk vooraleer je aan deze opdracht begint.</p>
                </li>
            </ul> 

        </section>
      

    </body>
</html>