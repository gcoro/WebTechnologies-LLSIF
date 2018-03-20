var llogin = true;
var ppassword = true;

function controlla(){
  nomeUtente();
  passUtente();
  checkFlag();
  return false;
}

function nomeUtente(){
  var name= document.getElementById("username");
  if (name.value.length == "")
    {
      llogin = false;
      
    }
    else
    {
      llogin = true;
    }
    checkFlag();
}


function passUtente(){
  var Permesso= document.getElementById("password");

  if (Permesso.value.length == "")
  {
    ppassword = false;
   }
   else
   {
    ppassword = true;
   }
		console.log(ppassword);
		checkFlag();
}

function checkFlag(){
  if (!llogin || !ppassword)
    {
			document.getElementById("submit").setAttribute("disabled", "true");
		}
		else
		{
			document.getElementById("submit").removeAttribute("disabled");
		}


}