<?php
	var_dump($_FILES);
	//UPLOAD
	$message	=	false;
	try
	{
		if (isset($_POST['submit'])) 
		{
			if ((($_FILES["file"]["type"] == "image/gif")
			|| ($_FILES["file"]["type"] == "image/jpeg")
			|| ($_FILES["file"]["type"] == "image/png"))
			&& ($_FILES["file"]["size"] < 5000000)) 
			{
			// Het bestand moet gif, jpeg of png zijn en mag niet groter zijn dan 2MB
				if ($_FILES["file"]["error"] > 0) 
				{
					// Als er een fout in het bestand wordt gevonden (bv. corrupte file door onderbroken upload), moet er een foutboodschap getoond worden
					throw new Exception( "Return Code: " . $_FILES["file"]["error"] );
				} 
				else 
				{
					// De root van het bestand moet achterhaald worden om de absolute pathnaam (de plaats op de schijf van de server) te achterhalen
					// Zo weet de server waar het bestand moet terecht komen.
					// We kunnen dit doen door de functie dirname() toe te passen op dit bestand (=__FILE__)
					define('ROOT', dirname(__FILE__));
					if (file_exists(ROOT . "/img/" . $_FILES["file"]["name"])) {
						//Als het bestand reeds bestaat in de map, moet er een foutboodschap getoond worden
						throw new Exception( $_FILES["file"]["name"] . " bestaat al. " );
					} 
					else 
					{
						// Anders mag het bestand ge�pload worden naar de map
						move_uploaded_file($_FILES["file"]["tmp_name"], (ROOT . "/img/" . $_FILES["file"]["name"]));
						$message[ 'type' ]	=	'success';
						$message[ 'text' ]	=	'<p>Upload: ' . $_FILES["file"]["name"] .'</p>';
						$message[ 'text' ]	=	'<p>Type: ' . $_FILES["file"]["type"] .'</p>';
						$message[ 'text' ]	=	'<p>Size: ' . $_FILES["file"]["size"] / 1024 .'</p>';
						$message[ 'text' ]	=	'<p>Temp file: ' . $_FILES["file"]["tmp_name"] .'</p>';
						$message[ 'text' ]	=	'<p>Opgeslagen in: : ' . ROOT . "/img/" . $_FILES["file"]["name"] .'</p>';
					}
				}
			} 
			else 
			{
				throw new Exception( 'Ongeldig bestand' );
			}
		}
	}
	catch( Exception $e )
	{
		$message[ 'type' ]	=	'error';
		$message[ 'text' ]	=	$e->getMessage();
	}
	
	//IMAGE MANIPULATION
	if (isset($_POST['submit']))
	{
		$imageFile	=	'img/' . $_FILES["file"]["name"];
	
		// Haal de bestandsnaam en de extensie uit het bestand
		$fileParts	=	pathinfo($imageFile);
		$fileName	=	$fileParts['filename'];
		$ext		=	$fileParts['extension'];
	
		// Bepaal de dimensies van de verkleining
		$thumbDimensions['w']	=	100;
		$thumbDimensions['h']	=	100;
	
		// Haal de breedte en de hoogte op uit het originele bestand
		list($width, $height)	=	getimagesize($imageFile); // kent automatisch de value uit getimagesize (retunt array(width, height)) toe aan de variabele in de list in de overeenstemmende volgorde
	
		// Controleer om welke extensie het gaat en voer de overeenstemmende methode uit
		switch ($ext)
		{
			case ('jpg'):
			case ('jpeg'):
				$source 	= 	imagecreatefromjpeg($imageFile);
				break;
				
			case ('png'):
				$source 	=	imagecreatefrompng($imageFile);
				break;
	
			case ('gif'):
				$source 	=	imagecreatefromgif($imageFile);
				break;
		}
	
		// Creëer een leeg canvas met de dimensies van de nieuwe afbeelding
		$thumb 	=	imagecreatetruecolor($thumbDimensions['w'], $thumbDimensions['h']);
	
		// Resize het origineel naar de gewenste dimensies en plaats het de verkleinde versie in het nieuwe canvas.
		// nieuwe canvas = destination, oude canvas = source, destination x, destination y, source x, source y, destination width, destination height, source width, source height
		if ($width > $height) //landscape
		{
			$sourceX = ($width/2)-($height/2);
			$width = $height;
			imagecopyresized($thumb, $source, 0, 0, $sourceX, 0, $thumbDimensions['w'],$thumbDimensions['h'], $width, $height);
		}
		else //portrait
		{	
			$sourceY = ($height/2)-($width/2);
			$height = $width;
			imagecopyresized($thumb, $source, 0, 0, 0, $sourceY, $thumbDimensions['w'],$thumbDimensions['h'], $width, $height);
		}
	
		// Slaag het nieuwe canvas op (canvas, (folder).fileName, kwaliteit)
		$resized = imagejpeg($thumb, ('img/thumb-' . $fileName . '.' . $ext), 100);
	}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht Image Manipulation: thumb - Oplossing</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
        <style>
            img
            {
                display:block;
                margin: 12px 0;
            }
        </style>
    </head>
    <body>
        <div>
            <h1>Thumbnail Genereren</h1>
            
            <?php if ( $message ): ?>
                <div class="modal <?= $message[ 'type' ] ?>"><?= $message[ 'text' ] ?></div>
            <?php endif ?>
            
            <h2>Originele afbeelding</h2>
            
            <?php if (isset($_POST['submit'])): ?>
            	<img src="<?= 'img/' . $_FILES["file"]["name"] ?>" alt="origineel <?= $_FILES["file"]["name"] ?>">
             <?php endif ?>
        
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                <ul>
                    <label for="file">Foto kiezen</label>
                    <input type="file" id="file" name="file">
                    <input type="submit" name="submit" value="Submit">
                </ul>
            </form>
            
            <h2>Thumbnail</h2>
            
            <?php if (isset($_POST['submit'])): ?>
            	<img src="img/thumb-<?= $fileName . '.' . $ext ?>" alt="thumb <?= $_FILES["file"]["name"] ?>">
            <?php endif ?>
        </div>
    </body>
</html>