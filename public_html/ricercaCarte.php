<?php
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
function checkError($nome,$cognome,$id)
{
	if(!checkNotNumbers($nome) || !checkNotNumbers($cognome))
		return "Nome, cognome, set non possono contenere numeri";
		
	if(!checkID($id))
		return "ID carta non corretto. Stringa di 5 caratteri: 4 numeri + 1 lettera (idolizzata = i, base = b).";
}

function stringaSql($nome,$cognome,$id,$attributo,$rarita,$set,$tipo)
{
	$sql = "SELECT Rappresentazione, Liv_max, Smile, Pure, Cool, Stamina, Idolizzata, Skill, Center_skill FROM Carta WHERE ";
	$tmp = false;
	
	if(!empty($nome))
	{
		$sql = $sql."Nome_idol = \"".$nome."\" AND ";
		$tmp = true;	
	}
	if(!empty($cognome))
	{
		$sql = $sql."Cognome_idol = \"".$cognome."\" AND ";
		$tmp = true;
	}
	if(!empty($id))
	{
		$sql = $sql."ID = \"".$id."\" AND ";
		$tmp = true;
	}
	if($attributo != "tutti")
	{
		$sql = $sql."Attributo = \"".$attributo."\" AND ";
		$tmp = true;
	}
	if(($rarita != "tutte"))
	{
		$sql = $sql."Rarita = \"".$rarita."\" AND ";
		$tmp = true;
	}
	if(!empty($set))
	{
		$sql = $sql."Set_appartenenza = \"".$set."\" AND ";
		$tmp = true;
	}
	if($tipo != "bi")
	{
		$sql = $sql."Idolizzata = \"".$tipo."\" AND ";
		$tmp = true;
	}
	
	if(!$tmp)
		$sql = rtrim($sql," WHERE ");
	else
		$sql = substr($sql, 0, strlen($sql)-5);	

	return $sql.";";
}
function stampaCarte($connessione, $stringa) // connessione al database. Se invocato da inserisciNews il DB selezionato sarà "news" se è invocato da inserisciCarte sarà "Carte"
{
	echo file_get_contents("txt/inizioCarte.txt");

	
	if($risultato = $connessione->query($stringa))
	{
		if($risultato->num_rows > 0)
		{
			while($rows = $risultato->fetch_array(MYSQLI_ASSOC))
			{

			 echo"<tr>";
				 echo"<td><img alt= \"immagine della carta\" src=\"database/immaginiDatabase/".$rows['Rappresentazione']."\" /></td>";
				 
				 echo"<td>";
				 echo"<dl>";
				 echo"<dt> Livello Max:</dt>";
				 echo"<dd> ".$rows['Liv_max']."</dd>";
				 echo"<dt> Punti Smile:</dt>";
				 echo"<dd> ".$rows['Smile']."</dd>";
				 echo"<dt> Punti Cool:</dt>";
				 echo"<dd> ".$rows['Cool']."</dd>";
				 echo"<dt> Punti Pure:</dt> ";
				 echo"<dd> ".$rows['Pure']."</dd>";
				 echo"<dt> Stamina:</dt>";
				 echo"<dd> ".$rows['Stamina']."</dd>";
				 echo"<dt> Idolizzata: </dt>";
				 
				 if($rows['Idolizzata'] == 1)
					echo"<dd> Si </dd>";
				else
					echo"<dd> No</dd>";
					
				echo"</dl>";
				echo"</td>";
				
				echo"<td>";
				echo"<dl>";
				echo"<dt>Skill: </dt>";
				echo"<dd> ".$rows['Center_skill']."</dd>";
				echo"<dt>Effetto Skill: </dt>";
				echo"<dd> ".$rows['Skill']."</dd>";
				
				
				echo"</dl>";
				echo"</td>";
			echo"</tr>";
			echo"<tr>";
			echo"<td colspan = \"3\"> <a class=\"tornasu\" href=\"#iniziopagina\">Torna su</a></td>";
			echo"</tr>";			

;
			}
		}
		else
			echo "<tr><td class=\"rigaMessaggio\" colspan=\"3\">Nessuna carta da visualizzare</td></tr>";
	}
	else
		echo "<tr><td class= \"errore\" colspan=\"3\">Il database non risponde al momento. Riprovare piu' tardi.</td></tr>";
	
	
	echo file_get_contents("txt/fineCarte.txt");
}

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
		$nome = htmlentities($_POST["nome"]);
		$nome = ucfirst(strtolower($nome));
		$nome = str_replace("'","&apos;", $nome);
		
		$cognome = htmlentities($_POST["cognome"]);
		$cognome = ucfirst(strtolower($cognome));
		$cognome = str_replace("'","&apos;", $cognome);
		
		$id = htmlentities($_POST["idCarta"]);
		$id = strtolower($id);
		$id = str_replace("'","&apos;", $id);
		
		$attributo = htmlentities($_POST["attributo"]);
		$rarita = htmlentities($_POST["rarita"]);
		
		$set = htmlentities($_POST["set"]);
		$set = ucfirst(strtolower($set));
		$set = str_replace("'","&apos;", $set);
		
		$tipo = htmlentities($_POST["tipoCarte"]);
		
		
		$errore = checkError($nome,$cognome,$id);
		
		if(empty($errore))
		{
			$connessione = connessione();
			$sqlString = stringaSql($nome,$cognome,$id,$attributo,$rarita,$set,$tipo); 
			$errConnection = stampaCarte($connessione, $sqlString);
			
			if(!empty($errConnection))
			{
				echo file_get_contents("txt/inizioCarte.txt");
				echo "<tr><td class= \"errore\" colspan=\"3\">$errConnection</td></tr>";
				echo file_get_contents("txt/fineCarte.txt");
			}
			
			
		}
		
		else
		{
			echo file_get_contents("txt/inizioCarte.txt");
			echo "<tr><td class= \"errore\" colspan=\"3\">$errore</td></tr>";
			echo file_get_contents("txt/fineCarte.txt");
		}
		
		$connessione->close();
		
	}

	else
	{
			echo file_get_contents("txt/inizioCarte.txt");
			echo "<tr><td class= \"errore\" colspan=\"3\">Non hai compilato i parametri</td></tr>";
			echo file_get_contents("txt/fineCarte.txt");
	}

}
catch(Exception $err)
{
	echo "Qualcosa è andato storto:" . $err->getMessage()." .";
}
?>
