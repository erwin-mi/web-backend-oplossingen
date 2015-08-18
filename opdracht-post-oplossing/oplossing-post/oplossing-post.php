<?php
	
	// Werk altijd met een var_dump van $_GET of $_POST om te debuggen/developen
	// Zo zie je altijd wat er in de $_GET of $_POST array zit en hoef je er niet naar te raden
	//var_dump( $_POST);

	$username	=	'info@test.be';
	$password 	=	'azerty';
	$message	=	'Gelieve in te loggen';

	if ( isset( $_POST ['submit'] ) )
	{
		if ( $_POST['username'] == $username && $_POST['password'] == $password )
		{
			$message	=	'Welkom';
		}
		else
		{
			$message	=	'Er ging iets mis tijdens het inloggen. Probeer opnieuw.';
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Oplossing post: deel1</title>
</head>
<body class="php-inleiding">

	<h1>Oplossing post: deel1</h1>

	<h2>Log in</h2>

	<p><?php echo $message ?></p>

	<form action="oplossing-post.php" method="POST">
		
		<ul>
			<li>
				<label for="username">Username:</label>
				<input type="text" name="username" id="username" value="info@test.be">
			</li>
			<li>
				<label for="password">Paswoord:</label>
				<input type="password" name="password" id="password" value="azerty">
			</li>
		</ul>

		<input type="submit" name="submit" value="Verzend">

	</form>
</body>
</html>