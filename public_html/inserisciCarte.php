<?php
function resize($str)
{
	return ucfirst((strtolower($str)));
}
function checkID($id)
{	
	if(strlen($id) > 0)
	{
		if(strlen($id) == 5)
		{
			if(preg_match("/^[0-9][0-9][0-9][0-9](i|b)$/",$id))
				return true;
			else
				return false;
		}
		else
			return false;
	}
	return true;
}
function checkNotNumbers($stringa)
{
	if(strlen($stringa) > 0)
	{
		if(preg_match("#[0-9]#", $stringa))
			return false;
		else
			return true;
	}
	return true;
}

function IDagain($id, $connessione)
{
	$sql = "SELECT * FROM Carta WHERE ID = \"".$id."\"" ;
	
	if($risultato = $connessione->query($sql))
	{
		if($risultato->num_rows > 0)
			return 0;
		else
			return 1;
	}
	else
		return 2;
}
function checkLiv($livello)
{
	if($livello = 30 || $livello = 40 || $livello = 60 || $livello = 70 || $livello = 80 || $livello = 90 || $livello = 100)
		return false;
	else
		return true;
	
}
function staminaCheck($stamina)
{
	if($stamina > 0 && $stamina < 6)
		return true;
	else
		return false;
}
function sistemaID($id,$tipoCarta)
{
	$id = substr($id,0,4);
	
	if($tipoCarta == "b")
		$id = $id."b";
	else
		$id = $id."i";
	
	
	return $id;
}
function setAtt($cool,$smile,$pure)
{
	$max = max($cool,$smile,$pure);
	
	if($cool == $max)
		return "Cool";
		
	if($smile == $max)
		return "Smile";
		
	if($pure == $max)
		return "Pure";
}

function inserisciDatabase($nome,$cognome,$id,$livello,$cool,$smile,$pure,$stamina,$rarita,$set,$tipoCarta,$skill,$descrizioneSkill,$immagine,$connessione)
{
	if(!checkNotNumbers($nome))
		return $error = "Nome non puo contenere numeri";
	if(!checkNotNumbers($cognome))
		return $error = "Cognome non puo contenere numeri";
		
	$id = sistemaID($id,$tipoCarta);
	if(!checkID($id))
		return $error = "ID formato errato. Stringa di 5 caratteri: 4 numeri + 1 lettera (idolizzata = i, base = b).";
	if(IDagain($id, $connessione) == 0)
		return $error = "L' ID inserito corrisponde ad una carta gia inserita nel database";
	if(IDagain($id, $connessione) == 2)
		return $error = "DB INTERNAL ERROR44! Riprovare piu tardi!";
	
	if(!is_int($livello))
		return $error = "Livello solo numerico.";
	if(checkLiv($livello))
		return $error = "Livello massimo 30, 40, 60, 70, 80, 90 o 100";
		
	if(!is_int($cool))
		return $error = "Attributo Cool solo numerico.";
	if(!is_int($smile))
		return $error = "Attributo Smile solo numerico.";
	if(!is_int($pure))
		return $error = "Attributo Pure solo numerico.";
		
	if(!is_int($stamina) || !staminaCheck($stamina))
		return $error = "Stamina solo numerica e compresa da 1 a 5";
		
	if($tipoCarta =="b")
		$tipoCarta = 0;
	else
		$tipoCarta = 1;
			
	if(empty($immagine))	
		$immagine = " ";
	
	if(empty($set))
		$set = " ";

	if(empty($skill))
		$skill = " ";
	if(empty($descrizioneSkill))
		$descrizioneSkill = " ";
		

	$attributo = setAtt($cool,$smile,$pure);
	
	$sql = "INSERT INTO Carta(ID, Idolizzata, Liv_max, Skill, 
			Attributo, Rarita, Center_skill, Stamina, Smile, Pure, Cool, Set_appartenenza, Nome_idol, Cognome_idol, Rappresentazione) 
			VALUES('". $id . "', '" . $tipoCarta . "', '" . $livello . "','" . $descrizioneSkill . "','" . $attributo . "','" . $rarita . "','" . $skill . "','" . $stamina ."','"
			. $smile . "','" . $pure . "','" . $cool . "','" . $set . "','" . $nome . "','" . $cognome . "','" . $immagine ."');";
			
	if(!$connessione->query($sql))
	{
		$error = "Inserimento Fallito: ". $connessione->error . ".";
		return $error;
	}			
	
	
}
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

	//-----------------------------------------------------------------------------------------
		
		
		//"MAIN"
if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
		$nome = resize(htmlentities($_POST["nome"]));
		$nome = str_replace("'","&apos;", $nome);
		
		$cognome = resize(htmlentities($_POST["cognome"]));
		$cognome = str_replace("'","&apos;", $cognome);
		
		$id = strtolower(htmlentities($_POST["idCarta"]));
		
		$livello = abs(htmlentities($_POST["livMax"]));
		
		$cool = abs(htmlentities($_POST["attCool"]));
		
		$smile = abs(htmlentities($_POST["attSmile"]));
		
		$pure = abs(htmlentities($_POST["attPure"]));
		
		$stamina = abs(htmlentities($_POST["attStamina"]));
		
		$rarita = htmlentities($_POST["rarita"]);
		
		$set = resize(htmlentities($_POST["set"]));
		$set = str_replace("'","&apos;", $set);
		
		$tipoCarta = htmlentities($_POST["tipoCarta"]);
		
		$skill = resize(htmlentities($_POST["skill"]));
		$skill = str_replace("'","&apos;", $skill);
		
		$descrizioneSkill = resize(htmlentities($_POST["descrizioneSkill"]));
		$descrizioneSkill = str_replace("'","&apos;", $descrizioneSkill);
		
		$immagine = htmlentities($_POST["immagineCarta"]);
		$immagine = str_replace("'","&apos;", $immagine);
		
		$errore = "";
		
		 
		if(empty($nome) ||empty($cognome) ||empty($id) ||empty($livello) ||empty($cool) ||empty($smile) ||empty($pure) ||empty($stamina)||
			empty($rarita) || empty($tipoCarta))
			$errore = "Compilare i campi obbligatori.";
		else
		{
			$connessione = connessione();
			$errore = inserisciDatabase($nome,$cognome,$id,$livello,$cool,$smile,$pure,$stamina,$rarita,$set,$tipoCarta,$skill,$descrizioneSkill,$immagine, $connessione);
			$connessione->close();
		}
		
		if(empty($errore))
		{
			echo file_get_contents("txt/inserimentoInizio.txt");
			echo "<p class= \"successo\"> Inserimento avvenuto correttamente</p>";
			echo file_get_contents("txt/inserimentoFine.txt");
		}
		
		else
		{
				echo file_get_contents("txt/inserimentoInizio.txt");
				echo "<p class= \"errore\">$errore</p>";
				echo file_get_contents("txt/inserimentoFine.txt");
		}
	}
	else
	{
			echo file_get_contents("txt/inserimentoInizio.txt");
			echo "<tr><td class= \"errore\" colspan=\"3\">Non hai compilato i parametri</td></tr>";
			echo file_get_contents("txt/inserimentoFine.txt");
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
