//Carte

var Nome = true;
var Cognome = true;
var id = true;

//inserisci carte, punto di rottura

function controllaTutto(){
	checkNome();
	checkCognome();
	checkID();
	checkValori();
	return false;
}

function checkNome(){    
	var e = document.getElementById("nome");
	var p = e.parentNode;
  var re = /^[A-Za-z]+$/;
	var x = document.createElement("strong");
	x.style.color = "#FF69B4";
    if(re.test(e.value) || e.value == "")
	{
		if (p.children.length == 2) {
		p.removeChild(p.children[1]);
		}
		Nome = true;
	}
	else
	{	
		if (p.children.length == 2) {
			p.removeChild(p.children[1]);
		}
		x.appendChild(document.createTextNode("Non inserire numeri o caratteri speciali"));
		p.appendChild(x);	
		Nome = false;
	}
	checkValori();
	
}



//devo controllare che il campo non abbia numeri
function checkCognome()
{
	var e = document.getElementById("cognome");
	var p = e.parentNode;
    var re = /^[A-Za-z]+$/;
	var x = document.createElement("strong");
	x.style.color = "#FF69B4";
    if(re.test(e.value) || e.value == "")
	{
		if (p.children.length == 2) {
		p.removeChild(p.children[1]);
		}
		Cognome = true;
	}
	else
	{	
		if (p.children.length == 2) {
			p.removeChild(p.children[1]);
		}
		x.appendChild(document.createTextNode("Non inserire numeri o caratteri speciali"));
		p.appendChild(x);	
		Cognome = false;
	}
	checkValori();
}

function checkID()
{
	var e = document.getElementById("idCarta");
	var p = e.parentNode;
	var x = document.createElement("strong");
	var re = /^[0-9]{4}([i]|[b]|[I]|[B])$/;
	x.style.color = "#FF69B4";
	if(re.test(e.value))
		{	
	
		if (p.children.length == 2) {
			p.removeChild(p.children[1]);
		}
		id = true;
	}

	else
	{
		if (p.children.length == 2) {
			p.removeChild(p.children[1]);
		}
		if (e.value == "")
		{
			id= true;
		}
		else{
		x.appendChild(document.createTextNode("ID ha 5 caratteri (4 numeri seguiti da 'i' o 'b')"));
		p.appendChild(x);	
		id = false;
		}
	}
	checkValori();
}


function checkValori(){
	if (!Nome || !Cognome || !id)
		{
			document.getElementById("submit").setAttribute("disabled", "true");
		}
		else
		{
			document.getElementById("submit").removeAttribute("disabled");
		}
}




