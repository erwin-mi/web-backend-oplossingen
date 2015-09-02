<?php
	session_start();
	
	function redirect( $page )
	{
		header('location: ' . $page);
	}

	var_dump( $_SESSION );
	
	$message = ( isset( $_SESSION[ 'message' ] ) ) ? $_SESSION[ 'message' ] : FALSE;	
	$email = ( isset( $_SESSION[ 'registrationData' ][ 'deel1' ][ 'email'] ) ) ? $_SESSION[ 'registrationData' ][ 'deel1' ][ 'email'] : FALSE;
	$password =	( isset( $_SESSION[ 'registrationData' ][ 'deel1' ][ 'password'] ) ) ? $_SESSION[ 'registrationData' ][ 'deel1' ][ 'password'] : FALSE;
	
	/*check if cookie is set*/
	if ( !isset( $_COOKIE['login'] ) )
	{
		redirect('login-form.php');
	}
	
	/*get salt from db*/
	$db = new PDO('mysql:host=localhost;dbname=opdracht-security-login', 'root', '' ); 
			
	$saltQueryString	=	'SELECT salt FROM users WHERE email = (:email)';
							
	$saltStatement = $db->prepare( $saltQueryString );

	$saltStatement->bindValue( ':email', $email );

	$saltStatement->execute();
	
	$saltDb	=	array();

		while ( $row = $saltStatement->fetch( PDO::FETCH_ASSOC ) )
		{
			$saltDb[] 	=	$row;
		}
	
	/*get hash from cookie*/
	$hashCookie = explode(',', $_COOKIE['login']);
	
	var_dump($hashCookie[1]);
	
	/*check hashsaltdb and hashcookie*/
	$hashSaltDb = hash('SHA512', $email . $saltDb[0]['salt']);
	
	var_dump($hashSaltDb);
	
	if ( $hashSaltDb !=  $hashCookie[1])
	{
		setcookie('login', '', time() - 1000 );
		redirect('login-form.php');
		echo('NO MATCH');
	}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht security: login oplossing</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
        <style>
			.modal
			{
				padding			:	6px;
				border-radius	:	3px;
			}

			.success
			{
				background-color:lightgreen;
			}

			.error
			{
				background-color:red;
				color:white;
			}

			.even
			{
				background-color:lightgrey;
			}
		</style>
    </head>
    <body>
        <section class="body">
            <div>
              	<h1>Dashboard</h1>
                <a href="">uitloggen</a>
                <?php if( $message ): ?>
                    <div class="modal <?= $message['type'] ?>">
                        <?= $message['text'] ?>
                    </div>
                <?php endif ?>
            </div>
        </section>
    </body>
</html>