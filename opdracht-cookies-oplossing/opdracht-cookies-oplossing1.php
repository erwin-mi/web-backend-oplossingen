<?php
	$userpass = explode (',', file_get_contents ('tekst.txt'));
	$username = $userpass[0];
	$paswoord = $userpass[1];
	$isAuthenticated = FALSE;
	$message = '';
	
	//LOGOUT
	if (isset($_GET['cookie'])) {
		if ($_GET['cookie'] == 'delete') {
			setcookie('authenticated','', time() - 3600 );
			header('location: opdracht-cookies-oplossing1.php');
		}
	}
	
	//ON PASSWORD SUBMIT
	if (isset($_POST['username']) && isset($_POST['password'])) 
	{
		if (($_POST['username'] == $userpass[0]) && ($_POST['password'] == $userpass[1]))
		{
			setcookie( 'authenticated', TRUE, time() + 3600 );
			header( 'location: opdracht-cookies-oplossing1.php' );
		} 
		else 
		{
			$message = 'Gebruikersnaam en/of paswoord niet correct. Probeer opnieuw.';
		}
	}

	//IF AUTHENTICATED
	if ( isset( $_COOKIE['authenticated'] ) ) 
	{
		$isAuthenticated	=	true;
	}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht cookies</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
    </head>
    <body class="web-backend-opdracht">
    
    <section class="body">
        <h1>Opdracht cookies: oplossing deel 1</h1>
            <?php if ( $isAuthenticated ):	?>
                <h1>Dashboard</h1>
                <p>U bent ingelogd.</p>
                <p><a href="?cookie=delete">Uitloggen</a></p>
            <?php else: ?>
            <?php if ( $message ): ?>
                <p><?php echo $message ?></p>
            <?php endif ?>
            	<h1>Inloggen</h1>
                <form action="opdracht-cookies-oplossing1.php" method="post">
                    <ul>
                        <li>
                            <label for="gebruikersnaam">gebruikersnaam</label>
                            <input type="text" id="gebruikersnaam" name="username">
                        </li>
                        <li>
                            <label for="paswoord">paswoord</label>
                            <input type="text" id="paswoord" name="password">
                        </li>
                    </ul>
                    <input type="submit" name="submit">
                </form>
            <?php endif ?>
    </section>
    </body>
</html>