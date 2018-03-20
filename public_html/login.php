<?php
function checkAdmin($user,$pass,$connessione)
{
	$sql = "SELECT * FROM amministratori WHERE username = \"".$user."\" AND password = \"".$pass."\";";
	$risultato = $connessione->query($sql);
	
	if($risultato->num_rows == 0)
		return "Nome utente e password inserite non corrispondono ad un amministratore";
	
	return;
}
try
{
	if(file_exists("connessione.php"))
		require_once("connessione.php");
	else 
		throw new Exception("ERROR CONNECTION. File per l'esecuzione mancante.");


//-----------------------------------------------------------------------------------------
	if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
	{
		$user = strtolower(htmlentities($_POST["username"]));
		$user = str_replace("'","&apos;", $user);
		$pass = strtolower(htmlentities($_POST["password"]));
		$pass = str_replace("'","&apos;", $pass);

		if(!empty($user) && !empty($pass))
		{
			$connessione = connessione();
			$error = checkAdmin($user,$pass,$connessione);
			$connessione->close();
			
			if(!empty($error))
			{
				echo file_get_contents("txt/inizioLogin.txt");
				echo "<p>".$error."</p>";
				echo file_get_contents("txt/FineNews.txt");
			}
			else
			{
				session_start();
				$_SESSION['username'] = $user;
				$_SESSION['password'] = $pass;
				header("Location: adminNews.php");
			}
			
			
		}
		else
		{
				echo file_get_contents("txt/inizioLogin.txt");
				echo "<p>Username e Password non possono esser vuoti!</p>";
				echo file_get_contents("txt/FineNews.txt");
		}
	}
	else
	{
			echo file_get_contents("txt/inizioLogin.txt");
			echo "<p class= \"errore\">Non hai compilato i campi</p>";
			echo file_get_contents("txt/FineNews.txt");
	}
	
}
catch(Exception $err)
{
	echo "Qualcosa è andato storto:" . $err->getMessage()." .";
}










?>
