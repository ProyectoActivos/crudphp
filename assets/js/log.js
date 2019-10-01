function validar(){
	var usuario = document.getElementById("username").value;
	var contraseña = document.getElementById("pass").value;

	if (usuario=="carlos" && contraseña=="carlos123"){
		location.href='activos.php';
	}
	else if (usuario=="nayelly" && contraseña=="nayelly123"){
		location.href='activos.php';
	}
	else if (usuario=="edith" && contraseña=="edith123"){
		location.href='activos.php';
	}
	else if (usuario=="jimmy" && contraseña=="jimmy123"){
		location.href='activos.php';
	}
	else if (usuario=="jack" && contraseña=="jack123"){
		location.href='activos.php';
	}else{
		alert("Crendenciales incorrectas");
		document.getElementById("username").value = "";
		document.getElementById("pass").value = "";
	}	
}