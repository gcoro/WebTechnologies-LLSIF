<?php

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
}
catch(Exception $err)
{
	echo "Qualcosa è andato storto:" . $err->getMessage()." .";
	exit();
}
//-----------------------------------------------------------------------------------------

//Funzioni


function cancellaDatabase($id, $connessione)
{

	//Se arrivo qui, significa che data testo e titolo sono nel giusto formato. Devo inserirle nel database.

	$sql = "DELETE FROM news WHERE id =".$id;

	if($connessione->query($sql) != TRUE)
	{
		echo "Eliminazione notizia fallita: ". $connessione->error . ".";
		exit();
	}
}
//-----------------------------------------------------------------------------------------
//MAIN
$id = $_GET["newsID"];
$connessione = connessione(); 
// richiamo la funzione di connessione e ci passo la stringa news come parametro. Indica il DB che vado a selezionare nella lista dei DB sul server. 
//Se la connessione è avvenuta proseguo, altrimenti ho la stampa dell'errore e l'invocazione dell' exit()

cancellaDatabase($id, $connessione);

stampaNews($connessione); //Richiamo la funzione di stampa contenuta nel file stampaNews.php passando come parametro la connessione al DB




	


?>
