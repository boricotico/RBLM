<?php
include("includes/ConnLatin.php");
require("PHPMailer_v2.0.0/class.phpmailer.php");

if($_POST["envia"] == "Enviar"){
#print_r($_POST);
$nom = $_POST["nombre"];
$emp = $_POST["empresa"];
$tel = $_POST["tel"];
$mail = $_POST["correo"];
$texto = $_POST["texto"];

$qry = "INSERT INTO cotizaciones VALUES('','$nom','$emp','$tel','$mail','$texto')";
$res = mysql_query($qry);
$filas = mysql_affected_rows();

if($filas > 0){	
    $destino = "roberto.barcenas@gmail.com";
	$cuerpo = "Nombre: $nom\n
			 Empresa: $emp\n
			 Telefono: $tel\n
			 Correo: $mail\n
			 Texto: $texto";
	mail($destino,'Cotizacion LatinModel',$cuerpo,'From:webmaster@latinmodel.com.mx');
}//fin if $filas

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>::: LatinModel ::: Modelos AA, Modelos AAA, Edecanes AA, Edecanes AAA, G'Os ::: </title>
<link href="estilos.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="niceforms.js"></script>
<script language="javascript" type="text/javascript" src="js/mootools-release-1.11.js"></script>
<script type="text/javascript">
		window.addEvent('domready', function(){
			/* Tips 1 */
			var Tips1 = new Tips($$('.Tips1'));
			
			/* Tips 2 */
			var Tips2 = new Tips($$('.Tips2'), {
				initialize:function(){
					this.fx = new Fx.Style(this.toolTip, 'opacity', {duration: 500, wait: false}).set(0);
				},
				onShow: function(toolTip) {
					this.fx.start(1);
				},
				onHide: function(toolTip) {
					this.fx.start(0);
				}
			});
			
			/* Tips 3 */
			var Tips3 = new Tips($$('.Tips3'), {
				showDelay: 400,
				hideDelay: 400,
				fixed: true
			});
			
			/* Tips 4 */
			var Tips4 = new Tips($$('.Tips4'), {
				className: 'custom'
			});
		}); 
		
function valida(){
		if(document.forma.nombre.value == ""){
			alert("Por favor, introduzca su nombre.");		
			document.forma.nombre.focus();	
			return false;			
		}
		
		if(document.forma.empresa.value == ""){
		   alert("Por favor, introduzca la empresa que solicita el servicio");
		   document.forma.empresa.focus();
		   return false;
		}
		
		if(document.forma.tel.value == ""){
		   alert("Por favor, introduzca un número telefónico donde podamos contactarlo(a)");
		   document.forma.tel.focus();
		   return false;
		}
		
		if(document.forma.correo.value == ""){
		   alert("Por favor, introduzca un correo electrónico");
		   document.forma.correo.focus();
		   return false;
		}
		
		if(document.forma.texto.value == ""){
			alert("Por favor, introduzca los datos para saber que servicio necesita");
			document.forma.texto.focus();
			return false;
		}
		document.forma.submit();
}//fin funcion
</script>
</head>
<body>
<table width="770" height="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="294" valign="top"><table width="739" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="238" height="102">
		<img src="imagenes/titulo.jpg" width="241" height="102" border="0" usemap="#logo" /></td>
        <td width="77">	
        <a href="teens.php" title="Chicas y Chicos::T e e n s" class="Tips2">
		<img src="imagenes/menu1.jpg" width="77" height="102" border="0" /></a>
		</td>
        <td width="87">
		<a href="edecanes.php" title="C h i c a s::E d e c a n e s" class="Tips2">
		<img src="imagenes/menu2.jpg" width="87" height="102" /></a>
		</td>
        <td width="87">
		<a href="modelos.php" title="C h i c a s::M o d e l o s" class="Tips2">
		<img src="imagenes/menu3.jpg" width="87" height="102" /></a>
		</td>
        <td width="87">
		<a href="models.gvamundial.com.mx" title="C h i c o s::M o d e l o s , G ' O S" class="Tips2">
		<img src="imagenes/menu4.jpg" width="87" height="102" /></a>
		</td>
        <td width="100">
		<a href="scouting.php" title="LatinModel::S c o u t i n g" class="Tips2">
		<img src="imagenes/menu5.jpg" width="100" height="102" border="0" /></a>		</td>
        <td width="96">
		<a href="cotizacion.php" title="LatinModel::C o t i z a c i o n e s" class="Tips2">
		<img src="imagenes/menu6.jpg" width="91" height="102" border="0" /></a>		</td>
      </tr>
      <tr>
        <td height="29" colspan="7"><img src="imagenes/linea.jpg" width="770" height="29" /></td>
        </tr>
    </table>
      <table width="770" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="73"><img src="imagenes/left.jpg" width="73" height="427" /></td>
          <td width="652" align="left" valign="top">
		  			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="height:427px;">
      				<tr>
        				<td align="left" valign="top" style="background-color:#FFFFFF;">
			  					<div align="left" class="txtRojo14">Cotizaciones</div>
			  					<br />
			  					<form name="forma" enctype="multipart/form-data" method="post" />
			  						<table width="400" border="0" cellspacing="2" cellpadding="2" style="overflow-y:auto;">
											<tr>
										  	<td colspan="2" class="texto">
										  		Por favor, complete todos los campos de manera correcta,todos los campos son obligatorios. <strong>NOTA: Si nos env&iacute;as el correo desde una direcci&oacute;n corporativa, ser&aacute; mas sencillo darle seguimiento a tu petici&oacute;n.</strong>
										  	</td>
											</tr>
											<tr>
										  	<td colspan="2" class="titulon">Nombre completo<br />
										    	<input name="nombre" type="text" class="texto" id="nombre" size="50" />
										    </td>
										  </tr>
											<tr>
										  	<td colspan="2" class="titulon">Empresa<br />
										    	<input name="empresa" type="text" class="texto" id="empresa" size="45" />
										   	</td>
										  </tr>
											<tr>
										  	<td colspan="2" class="titulon">Tel&eacute;fono<br />
										      <input name="tel" type="text" class="texto" id="tel" size="35" />
										    </td>
										  </tr>
											<tr>
										  	<td colspan="2" class="titulon">E-mail<br />
										      <input name="correo" type="text" class="texto" id="correo" size="45" />
										    </td>
										  </tr>
											<tr>
										  	<td colspan="2" class="titulon">Tipo de evento, personal que requiere, fecha, lugar y horario<br />
										    	<textarea name="texto" cols="50" rows="5" class="texto" id="texto"></textarea>
										    </td>
										  </tr>
											<tr>
										  	<td colspan="2"><div align="center">
										  		<input type="hidden" name="envia" value="Enviar" />
													<input type="button" name="envia" value="Enviar" class="texto" onClick="valida();" />
										  	</td>
										  </tr>
										</table>
			  					</form>
			  				</td>
			    		            
          			<td align="center" valign="top" style="width:200px;"><br />
          				<img src="imagenes/chica.jpg" width="179" height="279" /><br />
           				<br />
           			</td>
         			</tr>
        		</table>		  
        	</td>
          <td width="45"><img src="imagenes/right.jpg" width="45" height="427" /></td>
        </tr>
      </table>
      <table width="100" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><img src="imagenes/foot.jpg" width="770" height="164" border="0" usemap="#foot_menu" /></td>
        </tr>
      </table></td>
  </tr>
</table>

<table width=100% style="position:relative;top:-350px;left:900px;" cellpadding=0 cellspacing=0 border=0>
	<td align=left>
		<a href="http://www.facebook.com/people/LatinModel-Mexico/100001662199236" target="_blank" title="Siguenos en FB">
			<img src="/imagenes/facebook_button.gif" title="Siguenos en Facebook">
		</a>
	</td>
</table>

<map name="logo" id="logo">
<area shape="rect" coords="16,31,185,59" href="index.php" alt="Inicio" />
</map>
<map name="foot_menu" id="foot_menu">
<area shape="rect" coords="338,112,386,160" href="teens.php" title="Chicas y Chicos::T e e n s" class="Tips2" />
<area shape="rect" coords="398,113,463,160" href="edecanes.php" title="C h i c a s::E d e c a n e s" class="Tips2" />
<area shape="rect" coords="477,115,534,157" href="modelos.php" title="C h i c a s::M o d e l o s" class="Tips2" />
<area shape="rect" coords="542,116,594,157" href="hombres.php" title="C h i c o s::M o d e l o s , G ' O S" class="Tips2" /><area shape="rect" coords="602,119,670,157" href="scouting.php" title="LatinModel::S c o u t i n g" class="Tips2" />
<area shape="rect" coords="677,119,745,156" href="cotizacion.php" title="LatinModel::C o t i z a c i o n e s" class="Tips2" />
</map>
</body>
</html>
