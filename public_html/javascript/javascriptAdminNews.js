//inserimento news

// AdminInserisciNews
var checkTesto = true;
var checkTitolo = true;
var checkData = true;



function checkAll(){
	inserireData();
	inserireTitolo();
	inserireTesto();
	checkSubmit();
	return false;
}
	


function inserireData(){
	var e = document.getElementById("dataNotizia");
	var p = e.parentNode;
	if (p.children.length == 2) {
	p.removeChild(p.children[1]);
	}
	var x = document.createElement("strong");
	x.style.color = "#FF69B4";
	
	if ((e.value.search(/^([1-2][0-9]|[3][0-1]|[0][1-9]|[1-9])\/([1][0-2]|[0][1-9]|[1-9])\/[0-2][0-9]{3}$/) !== 0)){
		if (p.children.length == 2) {
			p.removeChild(p.children[1]);
		}	
		if (e.value.length == ""){
			checkData = false;
		}
		else {
			x.appendChild(document.createTextNode("Inserire data in formato GG/MM/AAAA"));
			p.appendChild(x);
			checkData = false;
		}
	}else{
		if (p.children.length == 2) {
			p.removeChild(p.children[1]);
		}
		checkData = true;
	}
	checkSubmit();
}

function inserireTitolo(){
	var e = document.getElementById("titolo");
	var p = e.parentNode;
	var x = document.createElement("strong");
	x.style.color = "#FF69B4";
	if (e.value.length > 100 || e.value.length < 5 ){
		if (p.children.length == 2) 
		{
			p.removeChild(p.children[1]);
		}
		if (e.value.length == "")
		{
			checkTitolo = false;
		}
		else{
			x.appendChild(document.createTextNode("Lunghezza minima 5, massima 100"));
			p.appendChild(x);
			checkTitolo = false;
		}
	}
	else{
		checkTitolo = true;
		if (p.children.length == 2) {
		p.removeChild(p.children[1]);
		}
	}
	checkSubmit();
}

function inserireTesto(){
	var e = document.getElementById("testoNotizia");
	var p = e.parentNode;
	var x = document.createElement("strong");
	x.style.color = "#FF69B4";
	
	if(e.value.length >9 ){
		if (p.children.length == 2) {
		p.removeChild(p.children[1]);
		}
		checkTesto = true;
	}else {
		if (e.value.length == "")
		{
			checkTesto = false;
			if (p.children.length == 2) 
			{
				p.removeChild(p.children[1]);
			}
		}
		else {
			if (p.children.length == 2) 
			{
				p.removeChild(p.children[1]);
			}
			x.appendChild(document.createTextNode("Lunghezza minima 10"));
			p.appendChild(x);	
			checkTesto = false;
			
		}
	}
	checkSubmit();
}

function checkSubmit(){
	if (!checkTitolo || !checkTesto || !checkData)
		{
			document.getElementById("buttonInserisci").setAttribute("disabled", "true");
		}
		else
		{
			document.getElementById("buttonInserisci").removeAttribute("disabled");
		}
		
}
