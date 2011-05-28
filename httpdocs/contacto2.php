
<?php
if (isset($_POST) && $_POST['nombre'] !="" && $_POST['email'] !="" ) {
	$errores = '';
	$toReplace = array( "\r", "\n", "%0a", "%0d", "Content-Type:", "bcc:","to:","cc:","\R", "\N", "%0A", "%0D", "CONTENT-TYPE:", "BCC:","TO:","CC:", "content-type:" );
	
	foreach ($_POST as $key=>$value) {
		$_POST[$key] = str_replace( $toReplace, "", $value);
	}
	if(!ereg("([A-Za-z0-9._-])@([A-Za-z0-9_-]).([A-Za-z0-9_-]{2,3}).([A-Za-z0-9_-]{2})",$_POST['email']) && !ereg("([A-Za-z0-9._-])@([A-Za-z0-9_-]).([A-Za-z0-9_-]{2,3})",$_POST['email']))
		$errores .= 'El campo del correo electronico tiene un formato invalido.<br>';
	
	if ($errores == '') {
		//creamos un array que estar&aacute; formado por las direcciones de destino
		require "PHPMailer_v2.0.0/class.phpmailer.php";
		$direcciones["direccion1"]="brenda.bocanegra@biosnettcs.com";
		$direcciones["direccion2"]="vero_mldz@hotmail.com";
		$mail = new phpmailer();
		
		//Le decimos cual es nuestro nombre de usuario y password
		$mail->Username = "spam@biosnettcs.com";
		$mail->Password = "biosnet1";
		
		$mail->From = $_POST['email'];
		$mail->FromName = $_POST['nombre'];
		$mail->Subject = "FORMULARIO DE CONTACTO BIOSNET";
		
		
		$msg = '';		
		foreach ($_POST as $key=>$value) {
			$msg .= $key.": ".$value." <br>\n ";
		}
		$msg .= "\n Fecha: ".date("d/m/Y")."\n Hora: ".date("h:i:s A");
		
		$mail->Body = $msg;
		$mail->AltBody = $msg;
		
		//Indicamos cuales son las direcciones de destino del correo y enviamos 
		//los mensajes
		reset($direcciones);
		while (list($clave, $valor)=each($direcciones)) {
			$mail->AddAddress($valor);
		
			//se envia el mensaje, si no ha habido problemas la variable $success 
			//tendra el valor true
			$exito = $mail->Send();
			
			//Si el mensaje no ha podido ser enviado se realizaran 4 intentos mas 
			//como mucho para intentar enviar el mensaje, cada intento se hara 5 s
			//segundos despues del anterior, para ello se usa la funcion sleep
			$intentos=1; 
			while((!$exito)&&($intentos<5)&&($mail->ErrorInfo!="SMTP Error: Data not accepted")){
				sleep(5);
				//echo $mail->ErrorInfo;
				$exito = $mail->Send();
				$intentos=$intentos+1;				
			}
		
			//La clase phpmailer tiene un peque&ntilde;o bug y es que cuando envia un mail con
			//attachment la variable ErrorInfo adquiere el valor Data not accepted, dicho 
			//valor no debe confundirnos ya que el mensaje ha sido enviado correctamente
			if ($mail->ErrorInfo=="SMTP Error: Data not accepted") {
				$exito=true;
			}
			
			if(!$exito) {
				echo "Problemas enviando correo electr&oacute;nico a ".$valor;
				echo "<br>".$mail->ErrorInfo;	
			}
			// Borro las direcciones de destino establecidas anteriormente
			$mail->ClearAddresses();
		}
	}
	if (!$exito || $errores!="") {
		echo '<h2 align="center">'.$errores.'</h2>';
	} else {
		$resultMenuUrlName = "gracias.html";
		echo "<META HTTP-EQUIV=Refresh CONTENT=0;URL=$resultMenuUrlName>";
	}
}
else {
echo "Favor de especificar su Nombre y Correo Electrico";
echo '<script type="text/javascript"> history.back(); </script>'; 
echo '<a href="" onclick="history.back(); return false;">Regresar</a>';
}
?>

<html>
<head>
<title>:::BIOSNET:::</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="estilos.css" rel="stylesheet" type="text/css">
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>

<style type="text/css">
<!--
.style1 {color: #1EB6B7}
.style2 {color: #4CC1C7}
.style3 {color: #30BABD}
.style4 {color: #55C4CA}
-->
</style>
</head>

<body>
<table width="1000"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <th width="100%" scope="row"><div align="left">
      <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','1000','height','115','src','4_esp','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','4_esp' ); //end AC code
      </script>
      <noscript>
        </noscript>
    </div></th>
  </tr>
  <tr> 
    <th background="images/back.jpg" scope="row"><table width="100%" border="0">
        <tr> 
          <td width="54%">&nbsp;</td>
          <td width="46%">&nbsp;</td>
        </tr>
        <tr> 
          <td><form action="contacto.php" method="post" name="form" id="form" />
              <table width="100%" cellspacing="0" cellpadding="0">
                <tr> 
                  <td width="51"><img src="images/spacer.gif" width="1" height="400"></td>
                  <td width="367" valign="top"><table width="328" border="0" align="center" cellpadding="2" cellspacing="2">
                      <tr> 
                        <td align="right" valign="top" class="gris_bold" >&nbsp;</td>
                        <td align="left" valign="top" class="gris_general">&nbsp;</td>
                      </tr>
                      <tr> 
                        <td width="115" align="right" valign="top" class="gris_bold" ><span class="forma">Nombre:</span></td>
                        <td width="199" align="left" valign="top" class="gris_general"><input name="nombre" type="text" id="nombre"  size="20" maxlength="200" />                        </td>
                      </tr>
                      <tr> 
                        <td align="right" valign="top" class="gris_bold" >Dirección:</td>
                        <td width="199" align="left" valign="top" class="gris_general"><input name="telefono" type="text" id="telefono" size="20" maxlength="200" /></td>
                      </tr>
                      <tr> 
                        <td align="right" valign="top" class="gris_bold" >E-mail:</td>
                        <td width="199" align="left" valign="top" class="gris_general"><input name="email" type="text" id="email"  size="20" maxlength="200" /></td>
                      </tr>
                      <tr> 
                        <td align="right" valign="top" class="gris_bold" >País:</td>
                        <td align="left" valign="top" class="gris_general"><select name="pais" id="pais" > 
<option value="Afganistán">Afganistán
<option value="Albania">Albania
<option value="Alemania">Alemania
<option value="Andorra">Andorra
<option value="Angola">Angola
<option value="Anguilla">Anguilla
<option value="Antártida">Antártida
<option value="Antigua y Barbuda">Antigua y Barbuda
<option value="Antillas Holandesas">Antillas Holandesas
<option value="Arabia Saudí">Arabia Saudí
<option value="Argelia">Argelia
<option value="Argentina">Argentina
<option value="Armenia">Armenia
<option value="Aruba">Aruba
<option value="Australia">Australia
<option value="Austria">Austria
<option value="Azerbaiyán">Azerbaiyán
<option value="Bahamas">Bahamas
<option value="Bahrein">Bahrein
<option value="Bangladesh">Bangladesh
<option value="Barbados">Barbados
<option value="Bélgica">Bélgica
<option value="Belice">Belice
<option value="Benin">Benin
<option value="Bermudas">Bermudas
<option value="Bielorrusia">Bielorrusia
<option value="Birmania">Birmania
<option value="Bolivia">Bolivia
<option value="Bosnia y Herzegovina">Bosnia y Herzegovina
<option value="Botswana">Botswana
<option value="Brasil">Brasil
<option value="Brunei">Brunei
<option value="Bulgaria">Bulgaria
<option value="Burkina Faso">Burkina Faso
<option value="Burundi">Burundi
<option value="Bután">Bután
<option value="Cabo Verde">Cabo Verde
<option value="Camboya">Camboya
<option value="Camerún">Camerún
<option value="Canadá">Canadá
<option value="Chad">Chad
<option value="Chile">Chile
<option value="China">China
<option value="Chipre">Chipre
<option value="Ciudad del Vaticano">Ciudad del Vaticano
<option value="Colombia">Colombia
<option value="Comoras">Comoras
<option value="Congo">Congo
<option value="Congo, República Democrática del">Congo, Rep. Dem
<option value="Corea">Corea
<option value="Corea del Norte">Corea del Norte
<option value="Costa de Marfíl">Costa de Marfíl
<option value="Costa Rica">Costa Rica
<option value="Croacia">Croacia
<option value="Cuba">Cuba
<option value="Dinamarca">Dinamarca
<option value="Djibouti">Djibouti
<option value="Dominica">Dominica
<option value="Ecuador">Ecuador
<option value="Egipto">Egipto
<option value="El Salvador">El Salvador
<option value="Emiratos Árabes Unidos">Emiratos Árabes Unidos
<option value="Eritrea">Eritrea
<option value="Eslovenia">Eslovenia
<option value="España">España
<option value="Estados Unidos">Estados Unidos
<option value="Estonia">Estonia
<option value="Etiopía">Etiopía
<option value="Fiji">Fiji
<option value="Filipinas">Filipinas
<option value="Finlandia">Finlandia
<option value="Francia">Francia
<option value="Gabón">Gabón
<option value="Gambia">Gambia
<option value="Georgia">Georgia
<option value="mundo">Ghana
<option value="Gibraltar">Gibraltar
<option value="Granada">Granada
<option value="Grecia">Grecia
<option value="Groenlandia">Groenlandia
<option value="Guadalupe">Guadalupe
<option value="Guatemala">Guatemala
<option value="Guayana">Guayana
<option value="Guayana Francesa">Guayana Francesa
<option value="Guinea">Guinea
<option value="Guinea Ecuatorial">Guinea Ecuatorial
<option value="Guinea-Bissau">Guinea-Bissau
<option value="Haití">Haití
<option value="Honduras">Honduras
<option value="Hong Kong, ZAE de la RPC">Hong Kong
<option value="Hungría">Hungría
<option value="India">India
<option value="Indonesia">Indonesia
<option value="Irak">Irak
<option value="Irán">Irán
<option value="Irlanda">Irlanda
<option value="Isla Bouvet">Isla Bouvet
<option value="Islandia">Islandia
<option value="Islas Caimán">Islas Caimán
<option value="Islas Malvinas">Islas Malvinas
<option value="Israel">Israel
<option value="Italia">Italia
<option value="Jamaica">Jamaica
<option value="Japón">Japón
<option value="Jordania">Jordania
<option value="Kazajistán">Kazajistán
<option value="Kenia">Kenia
<option value="Kirguizistán">Kirguizistán
<option value="Kiribati">Kiribati
<option value="Kuwait">Kuwait
<option value="Laos">Laos
<option value="Lesotho">Lesotho
<option value="Letonia">Letonia
<option value="Líbano">Líbano
<option value="Liberia">Liberia
<option value="Libia">Libia
<option value="Liechtenstein">Liechtenstein
<option value="Lituania">Lituania
<option value="Luxemburgo">Luxemburgo
<option value="Macao">Macao
<option value="Macedonia, Ex-República Yugoslava de">Macedonia
<option value="Madagascar">Madagascar
<option value="Malasia">Malasia
<option value="Malawi">Malawi
<option value="Maldivas">Maldivas
<option value="Malí">Malí
<option value="Malta">Malta
<option value="Marruecos">Marruecos
<option value="Martinica">Martinica
<option value="Mauricio">Mauricio
<option value="Mauritania">Mauritania
<option value="México">México
<option value="Micronesia">Micronesia
<option value="Moldavia">Moldavia
<option value="Mónaco">Mónaco
<option value="Mongolia">Mongolia
<option value="Montserrat">Montserrat
<option value="Mozambique">Mozambique
<option value="Namibia">Namibia
<option value="Nauru">Nauru
<option value="Nepal">Nepal
<option value="Nicaragua">Nicaragua
<option value="Níger">Níger
<option value="Nigeria">Nigeria
<option value="Niue">Niue
<option value="Norfolk">Norfolk
<option value="Noruega">Noruega
<option value="Nueva Caledonia">Nueva Caledonia
<option value="Nueva Zelanda">Nueva Zelanda
<option value="Omán">Omán
<option value="Países Bajos">Países Bajos
<option value="Panamá">Panamá
<option value="Papúa Nueva Guinea">Papúa Nueva Guinea
<option value="Paquistán">Paquistán
<option value="Paraguay">Paraguay
<option value="Perú" selected>Perú
<option value="Pitcairn">Pitcairn
<option value="Polonia">Polonia
<option value="Portugal">Portugal
<option value="Puerto Rico">Puerto Rico
<option value="Qatar">Qatar
<option value="Reino Unido">Reino Unido
<option value="República Centroafricana">República Centroafricana
<option value="República Checa">República Checa
<option value="República de Sudáfrica">República de Sudáfrica
<option value="República Dominicana">República Dominicana
<option value="República Eslovaca">República Eslovaca
<option value="Ruanda">Ruanda
<option value="Rumania">Rumania
<option value="Rusia">Rusia
<option value="Samoa">Samoa
<option value="Samoa Americana">Samoa Americana
<option value="San Marino">San Marino
<option value="Santa Lucía">Santa Lucía
<option value="Santo Tomé y Príncipe">Santo Tomé y Príncipe
<option value="Senegal">Senegal
<option value="Seychelles">Seychelles
<option value="Sierra Leona">Sierra Leona
<option value="Singapur">Singapur
<option value="Siria">Siria
<option value="Somalia">Somalia
<option value="Sri Lanka">Sri Lanka
<option value="St. Pierre y Miquelon">St. Pierre y Miquelon
<option value="Sudán">Sudán
<option value="Suecia">Suecia
<option value="Suiza">Suiza
<option value="Surinam">Surinam
<option value="Tailandia">Tailandia
<option value="Taiwán">Taiwán
<option value="Tanzania">Tanzania
<option value="Tayikistán">Tayikistán
<option value="Togo">Togo
<option value="Tonga">Tonga
<option value="Trinidad y Tobago">Trinidad y Tobago
<option value="Túnez">Túnez
<option value="Turkmenistán">Turkmenistán
<option value="Turquía">Turquía
<option value="Tuvalu">Tuvalu
<option value="Ucrania">Ucrania
<option value="Uganda">Uganda
<option value="Uruguay">Uruguay
<option value="Uzbekistán">Uzbekistán
<option value="Venezuela">Venezuela
<option value="Vietnam">Vietnam
<option value="Yemen">Yemen
<option value="Yugoslavia">Yugoslavia
<option value="Zambia">Zambia
<option value="Zimbabue">Zimbabue</option>
</select></td>
                      </tr>
                      <tr> 
                        <td width="115" align="right" valign="top" class="gris_bold" >Asunto:</td>
                        <td align="left" valign="top" class="gris_general">
						
<select name="asunto" id="asunto" > 
<option value="Informacion">Información General
<option value="Financiamiento">Financiamiento
<option value="Ventas">Ventas
<option value="Capacitación">Capacitación
<option value="Asistencia">Asistencia Técnica
<option value="Sugerencias">Sugerencias o Comentarios
<option value="Otros">otros</option>
</select></td>
                      </tr>
                      <tr> 
                        <td width="115" align="right" valign="top" class="gris_bold" >Comentarios:</td>
                        <td width="199" align="left" valign="top" class="gris_general"><textarea name="msg" cols="20" rows="4" class="casilla-seleccion"  ></textarea>                        </td>
                      </tr>
                      <tr> 
                        <td width="115" valign="top">&nbsp;</td>
                        <td width="199" valign="top" align="left"><div align="right"> 
                            <input type="submit" name="Submit" value="Enviar" />
                          </div></td>
                      </tr>
                      <tr>
                        <td valign="top">&nbsp;</td>
                        <td valign="top" align="left">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="2" valign="top"><?= $_SESSION['error'] ?></td>
                      </tr>
                    </table></td>
                </tr>
              </table>
            </form></td>
          <td valign="top"><div align="center"><img src="images/direccion.gif" width="250" height="201"></div></td>
        </tr>
        
      </table></th>
  </tr>
</table>

</body>
</html>
