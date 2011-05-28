// JavaScript Document
function validaEnvio()
{
	var forma   = window.document.fscouting;	
	var isemail = /^[A-Za-z0-9][\w-.]+@[A-Za-z0-9]([\w-.]+[A-Za-z0-9]\.)+([A-Za-z]){2,4}$/i;	

	if(forma.scNombre.value.length < 5)
	{
		alert("Debes ingresar tu nombre completo");
		forma.scNombre.focus();
		return false;
	}

	if(forma.scNacionalidad.value.length < 5)
	{
		alert("Debes ingresar tu nacionalidad");
		forma.scNacionalidad.focus();
		return false;
	}

	if(isNaN(forma.scDia.value))
	{
		alert("El campo de dia es numerico");
		forma.scDia.focus();
		return false;
	}

	if(isNaN(forma.scMes.value))
	{
		alert("El campo de mes es numerico");
		forma.scMes.focus();
		return false;
	}

	if(isNaN(forma.scYear.value))
	{
		alert("El campo de año es numerico");
		forma.scYear.focus();
		return false;
	}

	if(!isemail.test(forma.scCorreo.value))
	{
		alert("Atencion: La direccion de correo no es valida");
		forma.scCorreo.focus();
		return false;
	}
	
	//alert(forma.scSexo.value);
	
	if(forma.scSexo.value == "m")
	{
		forma.scMedidas.value    = "NO APLICA";
		forma.scMedidas.disabled = true;
	}

	if(forma.scMedidas.value == "")
	{
		alert("Debes ingresar tus medidas");
		forma.scMedidad.focus();
		return false;
	}

	if(isNaN(forma.scEstatura.value) || forma.scEstatura.value == "")
	{
		alert("El campo estatura es numerico");
		forma.scEstatura.focus();
		return false;
	}
	
	if(isNaN(forma.scPeso.value) || forma.scPeso.value == "")
	{
		alert("El campo de peso es numerico");
		forma.scPeso.focus();
		return false;
	}

	if(forma.scOjos.value == "")
	{
		alert("Debes ingresar tu color de ojos");
		forma.scOjos.focus();
		return false;
	}

	if(forma.scCabello.value == "")
	{
		alert("Debes ingresar tu estilo de cabello");
		forma.scCabello.focus();
		return false;
	}
forma.submit();	
}