
//funzioni per l'inserimento carte admin. le funzioni differiscono solo per l'impossibilità di lasciare
//vuoto uno qualsiasi dei campi


//AdminInserisciCarte
var NomeAdmin = true;
var CognomeAdmin = true;
var idAdmin = true;
var ImmagineAdmin = true;
var LivelloMassimoAdmin = true;
var AttributiCoolAdmin = true;
var AttributiSmileAdmin = true;
var AttributiPureAdmin = true;
var StaminaAdmin = true;
	



function ControllaTuttoAdmin(){
	checkNomeAdmin();
	checkCognomeAdmin();
	checkIDAdmin();
	checkLivelloMassimoAdmin();
  checkStaminaAdmin();
  checkAttributiCoolAdmin();
  checkAttributiSmileAdmin();
  checkAttributiPureAdmin();
	checkValoriAdmin();
}



function checkNomeAdmin(){    
	var NomeCarta = document.getElementById("nome");
	var p = NomeCarta.parentNode;
  var re = /^[A-Za-z]+$/;
	var x = document.createElement("strong");
	x.style.color = "#FF69B4";
    if(re.test(NomeCarta.value))
	{
		if (p.children.length == 2) {
		  p.removeChild(p.children[1]);
		}
		NomeAdmin = true;
		
	}
	else
	{	
		if (p.children.length == 2) {
			p.removeChild(p.children[1]);
		}
		if (NomeCarta.value == ""){
		x.appendChild(document.createTextNode("Non lasciare il campo vuoto"));
		p.appendChild(x);
			NomeAdmin = false;
		}
		else{
		x.appendChild(document.createTextNode("Non inserire numeri o caratteri speciali"));
		p.appendChild(x);	
		NomeAdmin = false;
		}
	}
  checkValoriAdmin();
}

function checkCognomeAdmin(){    
	var CognomeCarta = document.getElementById("cognome");
	var p = CognomeCarta.parentNode;
  	var re = /^[A-Za-z]+$/;
	var x = document.createElement("strong");
	x.style.color = "#FF69B4";
    	if(re.test(CognomeCarta.value))
	{
		if (p.children.length == 2) {
		p.removeChild(p.children[1]);
		}
		CognomeAdmin = true;
		
	}
	else
	{	
		if (p.children.length == 2) {
			p.removeChild(p.children[1]);
		}
		if (CognomeCarta.value == ""){
		  x.appendChild(document.createTextNode("Non lasciare il campo vuoto"));
		  p.appendChild(x);
		CognomeAdmin = false;
		}
		else{
		x.appendChild(document.createTextNode("Non inserire numeri o caratteri speciali"));
		p.appendChild(x);	
		CognomeAdmin = false;
		}
	}
  checkValoriAdmin();
}

function checkIDAdmin()
{
	var Identificatore = document.getElementById("idCarta");
	var p = Identificatore.parentNode;
	var x = document.createElement("strong");
	var re = /^[0-9]{4}([i]|[b]|[I]|[B])$/;
	x.style.color = "#FF69B4";
	if(re.test(Identificatore.value))
		{	
	
		if (p.children.length == 2) {
			p.removeChild(p.children[1]);
		}
		idAdmin = true;
	}

	else
	{
		if (p.children.length == 2) {
			p.removeChild(p.children[1]);
		}
		x.appendChild(document.createTextNode("ID ha 5 caratteri (4 numeri seguiti da 'i' o 'b')"));
		p.appendChild(x);	
		idAdmin = false;

	}	
  checkValoriAdmin();
}

//livello massimo

function checkLivelloMassimoAdmin(){
	var livello = document.getElementById("livMax");
	var p = livello.parentNode;
	var x = document.createElement("strong");
	x.style.color = "#FF69B4";
  if (livello.value == 30 || livello.value == 40 || livello.value == 60 ||livello.value == 70 || livello.value == 80 ||livello.value == 90 || livello.value == 100)
	{
		if (p.children.length == 2) {
			p.removeChild(p.children[1]);
		}
		LivelloMassimoAdmin = true;
	}
	else
	{	
		if (p.children.length == 2) {
			p.removeChild(p.children[1]);
		}
			x.appendChild(document.createTextNode("Livello Massimo = 30, 40, 60, 70, 80, 90 o 100"));
			p.appendChild(x);	
			LivelloMassimoAdmin = false;
	}
	checkValoriAdmin();
}



function checkStaminaAdmin(){ 
  var resistenza = document.getElementById("attStamina");
	var p = resistenza.parentNode;
	var x = document.createElement("strong");
	x.style.color = "#FF69B4";
  if (resistenza.value <=5 && resistenza.value > 0)
  {
    if (p.children.length == 2) {
			p.removeChild(p.children[1]);
		}
		StaminaAdmin = true;
  }else{
    if (p.children.length == 2) {
			p.removeChild(p.children[1]);
		}
		x.appendChild(document.createTextNode("Stamina da 1 a 5"));
		p.appendChild(x);	
		StaminaAdmin = false;
  }
  checkValoriAdmin();
}

function checkAttributiCoolAdmin()
{
  var Cool = document.getElementById("attCool");
	var p = Cool.parentNode;
	var x = document.createElement("strong");
  x.style.color = "#FF69B4";
  
  //per l'attributo Cool
  
  if ((Cool.value > 0 || Cool.value<= 10000))
  {
    if (p.children.length == 2) {
			p.removeChild(p.children[1]);
	  }
	  if(Cool.value.length == ""){
  		x.appendChild(document.createTextNode("Non lasciare il campo vuoto"));
  		p.appendChild(x);
  		AttributiCoolAdmin = false;
		}
		else{
    AttributiCoolAdmin = true;
		}
  }
  else
  {
    if (p.children.length == 2) {
			p.removeChild(p.children[1]);
		}

		  x.appendChild(document.createTextNode("Solo numeri positivi"));
		  p.appendChild(x);
      AttributiCoolAdmin = false;
  }
  if (Cool.value > 10000){
    x.appendChild(document.createTextNode("Numero troppo alto"));
		p.appendChild(x);
		AttributiCoolAdmin = false;
  }
  
  checkValoriAdmin();
}


function checkAttributiSmileAdmin  (){
  var Smile = document.getElementById("attSmile");
  var s = Smile.parentNode;
  var xs = document.createElement("strong");
  xs.style.color = "#FF69B4";
  if (Smile.value > 0 || Smile.value<= 10000)
  {
    if (s.children.length == 2) {
			s.removeChild(s.children[1]);
	  }
	  if(Smile.value.length == ""){
  		xs.appendChild(document.createTextNode("Non lasciare il campo vuoto"));
  		s.appendChild(xs);
  		AttributiSmileAdmin = false;
		}
		else{
    AttributiSmileAdmin = true;
		}
  }
  else
  {
    if (s.children.length == 2) {
			s.removeChild(s.children[1]);
		}
		  xs.appendChild(document.createTextNode("Solo numeri positivi"));
		  s.appendChild(xs);
      AttributiSmileAdmin = false;
  }
  if (Smile.value > 10000){
    xs.appendChild(document.createTextNode("Numero troppo alto"));
		s.appendChild(xs);
		AttributiSmileAdmin = false;
  }
   checkValoriAdmin();
}



function checkAttributiPureAdmin(){  
  var Pure = document.getElementById("attPure");
  var f = Pure.parentNode;
  var xf = document.createElement("strong");
  xf.style.color = "#FF69B4";
  if (Pure.value > 0 || Pure.value<= 10000)
  {
    if (f.children.length == 2) {
			f.removeChild(f.children[1]);
	  }
	  if(Pure.value.length == ""){
  		xf.appendChild(document.createTextNode("Non lasciare il campo vuoto"));
  		f.appendChild(xf);
  		AttributiPureAdmin = false;
		}
		else{
    AttributiPureAdmin = true;
		}
  }
  else
  {
    if (f.children.length == 2) {
			f.removeChild(f.children[1]);
		}
		xf.appendChild(document.createTextNode("Solo numeri positivi"));
		f.appendChild(xf);
    AttributiPureAdmin = false;
  }
  if (Pure.value > 10000){
    xf.appendChild(document.createTextNode("Numero troppo alto"));
		f.appendChild(xf);
		AttributiPureAdmin = false;
  }
  checkValoriAdmin();
}


function checkValoriAdmin(){
	if (!NomeAdmin || !CognomeAdmin || !idAdmin || !LivelloMassimoAdmin || !StaminaAdmin || !AttributiCoolAdmin || !AttributiPureAdmin || !AttributiSmileAdmin)
		{
			document.getElementById("submit").setAttribute("disabled", "true");
		}
		else
		{
			document.getElementById("submit").removeAttribute("disabled");
		}

}
