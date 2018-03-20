 <?php
function connessione()
{
	/*
	  Connessione al DBMS e selezione del database.
	*/
	# blocco dei parametri di connessione
	// nome di host
	$host = "localhost";
	// username dell'utente in connessione
	$user = "mapozza"; // uguale a db
	// password dell'utente
	$password = "pheeY2ahdae0Iiwi";

	# stringa di connessione al DBMS
	// istanza dell'oggetto della classe MySQLi
	$connessione = new mysqli($host, $user, $password, $user);

	// verifica su eventuali errori di connessione
	if ($connessione->connect_errno) {
		echo "Connessione fallita: ". $connessione->connect_error . ".";
		exit();
	}

	return $connessione ;
}

?>
