function validar(){
	var titulo = document.getElementById("titulo");
	var autor = document.getElementById("autor");
	var editorial = document.getElementById("editorial");
	var isbn = document.getElementById("isbn");

	if(titulo.value.length == 0){
		alert("Por favor rellene el campo Titulo");
		return false;
	}

	if(autor.value.length == 0){
		alert("Por favor rellene el campo autor");
		return false;
	}

	if(editorial.value.length == 0){
		alert("Por favor rellene el campo editorial");
		return false;
	}

	if(isbn.value.length == 0){
		alert("Por favor rellene el campo isbn");
		return false;
	}


return true;	
}