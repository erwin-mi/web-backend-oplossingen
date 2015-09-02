<?php
	session_start();
	
	/*generate password*/
	function generatePassword($length = 8) 
	{
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
		$password = substr( str_shuffle($chars), 0, $length );
		return $password;
	}
	
	function redirect( $page )
	{
		header('location: ' . $page);
	}
	
	if ( isset( $_POST['generatePassword'] ) )
    {
		$_SESSION['registrationData'][ 'deel1' ]['password'] = generatePassword(8);							
		redirect('registratie-form.php');
	}
	
    var_dump( $_POST );
	var_dump( $_SESSION );

	/*database*/
	$message	=	FALSE;
	if ( isset( $_POST[ 'submit' ] ) )
	{ 
		$_SESSION['registrationData'][ 'deel1' ]['email']       =   $_POST[ 'email' ];
        $_SESSION['registrationData'][ 'deel1' ]['password']    =   $_POST[ 'password' ];
		try
		{
			/*connect*/
			$db = new PDO('mysql:host=localhost;dbname=opdracht-security-login', 'root', '' ); 
			
			if (filter_var($_POST[ 'email' ], FILTER_VALIDATE_EMAIL))
			{	
				$existingUserQueryString	=	'SELECT * FROM users WHERE email =  (:email)';
										
				$existingUserStatement = $db->prepare( $existingUserQueryString );

				$existingUserStatement->bindValue( ':email', $_POST[ 'email' ] );
	
				$existingUserStatement->execute();
				
				if ($existingUserStatement->rowCount() === 0)  
				{
					/*salt*/
					$salt = uniqid(mt_rand(), true);
					$saltedPassword = $_POST[ 'password' ] . $salt;
					$hashed_password = hash('SHA512', $saltedPassword);
				
					/*add email, salt, hashed password, last login time to database*/
					$dataQueryString	=	'INSERT INTO users (email, salt, hashed_password, last_login_time)
											VALUES (:email, :salt, :hashed_password, NOW())';
															
					$dataStatement = $db->prepare( $dataQueryString );
				
					$dataStatement->bindValue( ':email', $_POST[ 'email' ] );
					$dataStatement->bindValue( ':salt', $salt );
					$dataStatement->bindValue( ':hashed_password', $hashed_password );
				
					$isAdded = $dataStatement->execute();	
		
					if ( $isAdded )
					{
						$insertId			=	$db->lastInsertId();
						$message['type']	=	'success';
						$message['text']	=	'Je bent succesvol geregistreerd met het unieke nummer ' . $insertId . '.';
						$cookieValue = $_POST[ 'email' ] . ',' . hash('SHA512', $_POST[ 'email' ] . $salt);
						setcookie('login', $cookieValue, time() + 60*60*24*30);
						redirect('dashboard.php');
					}
					else
					{
						$message['type']	=	'error';
						$message['text']	=	'Er ging iets mis met het registreren, probeer opnieuw.';
						redirect('registratie-form.php');
					}
				}
				else
				{
					$message['type']	=	'error';
					$message['text']	=	'Dit e-mailadres bestaat reeds, vul een ander e-mailadres in.';
					redirect('registratie-form.php');
				}
			}
			else
			{
				$message['type']	=	'error';
				$message['text']	=	'Dit e-mailadres is niet geldig, vul een geldig e-mailadres in.';
				redirect('registratie-form.php');	
			}
		}
		catch ( PDOException $e )
		{
			$message['type']	=	'error';
			$message['text']	=	'De connectie is niet gelukt.';
			redirect('registratie-form.php');
		}
	}
	$_SESSION['message']    =   $message;
		
?>