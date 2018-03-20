<?php
//Funzioni
function reverse($data)
{	
	$gg = substr($data,0,2);
	$mm = substr($data,3,2); 
	$aaaa = substr($data,6,4);
	
	return $aaaa."/".$mm."/".$gg;
}

function checkTitle($titolo)
{
	if(strlen($titolo) < 5)
		return false;
	else
		return true;
	
}

function checkData($data)
{
	if ((strlen($data)==10) && (preg_match("/^[0-3][0-9]\/[0-1][0-9]\/[0-2][0-9]{3}$/",$data)))
	{
		$gg = substr($data,0,2);
		$mm = substr($data,3,2);
		$aaaa = substr($data,6,4);

		if(!(checkdate ($mm, $gg, $aaaa)))
			return false;
		else
			return true;

	}
	return false;

		

}

function checkText($text)
{
	if(strlen($text) < 10)
		return false;
	else
		return true;
}

function inserisciDatabase($titolo,$data,$testo, $connessione)
{
	if(!checkTitle($titolo))
	{
		$err = "Titolo troppo corto. Inserisci almeno 5 caratteri";
		return $err;
	}
	if(!checkData($data))
	{
		$err = "Data errata. Formato corretto GG/MM/AAAA oppure controlla i valori!";
		return $err;
	}
	if(!checkText($testo))
	{
		$err = "Testo troppo corto. Inserisci almeno 10 caratteri";
		return $err;
	}
	//Se arrivo qui, significa che data testo e titolo sono nel giusto formato. Devo inserirle nel database.
	$data = reverse($data);

	$sql = "INSERT INTO news(data, titolo, testo) VALUES('". $data . "', '" . $titolo . "', '". $testo ."')";
	if(!$connessione->query($sql))
	{
		$err = "Inserimento Fallito: ". $connessione->error . ".";
		return $err;
	}

}
//-----------------------------------------------------------------------------------------

session_start();
if(!empty($_SESSION['password']) && !empty($_SESSION['username']))
{
	//Inclusione e gestione dei file.
	try
	{
		if(file_exists("connessione.php"))
			require_once("connessione.php");
		else 
			throw new Exception("ERROR CONNECTION. File per l'esecuzione mancante.");

		if(file_exists("adminleggiNews.php"))
			require_once("adminleggiNews.php");
		else 
			throw new Exception("ERROR PRINT. File per l'esecuzione mancante.");

	//-----------------------------------------------------------------------------------------
		
		//"MAIN"
	if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
	{
		$titolo = htmlentities($_POST["titolo"]);
		$titolo = str_replace("'","&apos;", $titolo);
		
		$data = htmlentities($_POST["dataNotizia"]);
		$data = str_replace("'","&apos;", $data);
		
		$testo = htmlentities($_POST["testoNotizia"]);
		$testo = str_replace("'","&apos;", $testo);
		
		$errore = "";
		
		$connessione = connessione(); 

		// richiamo la funzione di connessione e ci passo la stringa news come parametro. Indica il DB che vado a selezionare nella lista dei DB sul server. 
		//Se la connessione è avvenuta proseguo, altrimenti ho la stampa dell'errore e l'invocazione dell' exit()
			
		$errore = inserisciDatabase($titolo,$data,$testo, $connessione);
		
		if(empty($errore))
			stampaNews($connessione); //Richiamo la funzione di stampa contenuta nel file stampaNews.php passando come parametro la connessione al DB
				
		else
		{
				echo file_get_contents("txt/InizioNewsAdmin.txt");
				echo "<p class= \"errore\">$errore</p>";
				echo file_get_contents("txt/FineNews.txt");
		}
		$connessione->close();
		
	}
	else
	{
			echo file_get_contents("txt/InizioNewsAdmin.txt");
			echo "<p class= \"errore\">Non hai compilato i campi</p>";
			echo file_get_contents("txt/FineNews.txt");
	}
}

	
	catch(Exception $err)
	{
		echo "Qualcosa è andato storto:" . $err->getMessage()." .";
	}
}
else
	header("Location: login.php");




	


?>
