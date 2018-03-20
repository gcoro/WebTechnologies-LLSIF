<?php

require_once "connessione.php";

function reverseDate($data)
{
	$aaaa = substr($data,0,4);
	$mm = substr($data,5,2); 
	$gg = substr($data,8,2);
	
	return $gg."/".$mm."/".$aaaa;
}

function stampaNews($connessione) // connessione al database. Se invocato da inserisciNews il DB selezionato sarà "news" se è invocato da inserisciCarte sarà "Carte"
{
	echo file_get_contents("txt/InizioNews.txt");

	$sql = "SELECT * FROM news ORDER BY data DESC";
	
	if($risultato = $connessione->query($sql))
	{
		if($risultato->num_rows > 0)
		{
			while($rows = $risultato->fetch_array(MYSQLI_ASSOC))
			{
				echo"<div class=\"article\">";
				echo"<p class=\"dataNews\">".reverseDate($rows['data'])."</p>";
				echo"<h2 class=\"titleNews\">".$rows['titolo']."</h2>";
				echo"<div>".$rows['testo']."</div>";
				echo"<p> <a class =\"tornasu\" href=\"#iniziopagina\"> Torna su </a></p>";
				echo"</div>";
			}
		}
		else
			echo"<p>Nessuna news da visualizzare</p>";
	}
	else
		echo "<p class= \"errore\">DB INTERNAL ERROR! Riprovare piu tardi!</p>";
	
	
	echo file_get_contents("txt/FineNews.txt");
}

if (isset($_GET['pagina'])) 
{
    $connessione = connessione();
    stampaNews($connessione);
    $connessione->close();
}
?>
