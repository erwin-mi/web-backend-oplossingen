<?php
	$userpass = explode (',', file_get_contents ('tekst.txt'));
	$username = $userpass[0];
	$password = $userpass[1];
	$isAuthenticated = FALSE;
	$message = '';
	$expiration = 0;
	
	if (isset($_POST['remember'])) 
	{
		if ($_POST['remember'] === 'yes')
		{
			$expiration = time() + (24*60*60*30);
		} 
	}
	
	//LOGOUT
	if (isset($_GET['cookie'])) {
		if ($_GET['cookie'] == 'delete') {
			setcookie('authenticated','', time() - 3600 );
			header('location: opdracht-cookies-oplossing3.php');
		}
	}
	
	//ON PASSWORD SUBMIT
	if (isset($_POST['username']) && isset($_POST['password'])) 
	{
		if (($_POST['username'] == $username) && ($_POST['password'] == $password))
		{
			setcookie( 'authenticated', TRUE, $expiration );
			header( 'location: opdracht-cookies-oplossing3.php' );
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
         <h1 class="extra">Opdracht cookies: oplossing deel 3</h1>
        <?php if ( $isAuthenticated ):	?>
                <h1>Dashboard</h1>
                <p>Hallo <?= $username ?>, fijn dat je er weer bij bent!</p>
                <p><a href="?cookie=delete">Uitloggen</a></p>
		<?php else: ?>
        <?php if ( $message ): ?>
            <p><?php echo $message ?></p>
        <?php endif ?>
            <h1>Inloggen</h1>
            <form action="opdracht-cookies-oplossing3.php" method="post">
                <ul>
                    <li>
                        <label for="gebruikersnaam">gebruikersnaam</label>
                        <input type="text" id="gebruikersnaam" name="username">
                    </li>
                    <li>
                        <label for="paswoord">paswoord</label>
                        <input type="text" id="paswoord" name="password">
                    </li>
                    <li>
                        <input type="checkbox" id="remember" name="remember" value="yes">
                        <label for="remember">Mij onthouden</label>
                    </li>
                </ul>
                <input type="submit" name="submit">
            </form>
        <?php endif ?>
    </section>
    </body>
</html>