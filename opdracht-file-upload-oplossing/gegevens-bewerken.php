<?php

    session_start();

    function relocate( $url )
    {
        header('location: ' . $url );
    }

    function my_autoloader($class) {
        include 'classes/' . $class . '.php';
    }

    spl_autoload_register( 'my_autoloader' );

    define( 'BASE_URL', 'http://' . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'PHP_SELF' ] );
    define( 'HOST', dirname( BASE_URL ) . '/');
    
    $message    =   false;

    if ( Message::hasMessage() )
    {
        $message = Message::getMessage();

        Message::remove();
    }


    $db = new PDO('mysql:host=localhost;dbname=oplossing_crud_cms', 'root', '');
	 // Connectie maken

    $databaseWrapper    =   new Database( $db );

    $user = new User( $databaseWrapper );

    if ( !$user->validate() )
    {
        new Message( "U moet eerst inloggen", "error" );
        relocate("oplossing-CRUD-CMS-login-form.php");
    }
	
	//upload file
	$message	=	false;
	try
	{
		if (isset($_POST['submit'])) 
		{
			var_dump($_FILES);

			if ((($_FILES["profile_picture"]["type"] == "image/gif")
			|| ($_FILES["profile_picture"]["type"] == "image/jpeg")
			|| ($_FILES["profile_picture"]["type"] == "image/png"))
			&& ($_FILES["profile_picture"]["size"] < 2000000))
			
			{
				if ($_FILES["profile_picture"]["error"] > 0) 
				{
					throw new Exception( "Return Code: " . $_FILES["file"]["error"] );
				} 
				else 
				{
					define('ROOT', dirname(__FILE__));
					if (file_exists(ROOT . "/img/" . $_FILES["profile_picture"]["name"])) {
						throw new Exception( $_FILES["profile_picture"]["name"] . " bestaat al. " );
					} 
					else 
					{
						move_uploaded_file($_FILES["profile_picture"]["tmp_name"], (ROOT . "/img/" . $_FILES["profile_picture"]["name"]));
						
						$message[ 'type' ]	=	'success';
						$message[ 'text' ]	=	'<p>Upload: ' . $_FILES["profile_picture"]["name"] .'</p>';
						$message[ 'text' ]	=	'<p>Type: ' . $_FILES["profile_picture"]["type"] .'</p>';
						$message[ 'text' ]	=	'<p>Size: ' . $_FILES["profile_picture"]["size"] / 1024 .'</p>';
						$message[ 'text' ]	=	'<p>Temp file: ' . $_FILES["profile_picture"]["tmp_name"] .'</p>';
						$message[ 'text' ]	=	'<p>Opgeslagen in: : ' . ROOT . "/img/" . $_FILES["profile_picture"]["name"] .'</p>';
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
	
	//add profile_picture to db/user
	try
	{
		/*connect*/
		$db = new PDO('mysql:host=localhost;dbname=oplossing_crud_cms', 'root', ''); 
		
		$profile_pictureQueryString	=	'INSERT INTO users (profile_picture) VALUES (:profile_picture) WHERE email = :email';
								
		$profile_pictureStatement = $db->prepare( $profile_pictureQueryString );

		$profile_pictureStatement->bindValue( ':email', $user->getEmail() );
		$profile_pictureStatement->bindValue( ':profile_picture', $_FILES["profile_picture"]["name"] );

		$profile_picture = $profile_pictureStatement->execute();
		
		var_dump($profile_pictureStatement);
	}
	catch ( PDOException $e )
	{
		$message['type']	=	'error';
		$message['text']	=	'De connectie is niet gelukt.';
		//relocate('gegevens-wijzigen-form.php');
	}
	
?>
<body>
	<?php if ( $message ): ?>
        <div class="modal <?= $message['type'] ?>">
            <?= $message['text'] ?>
        </div>
    <?php endif ?>
</body>