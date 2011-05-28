<?php
set_time_limit(86400);
require("../PHPMailer_v2.0.0/class.phpmailer.php");


$correo = trim($_GET["email"]);
$nombre = trim($_GET["name"]);
#$correo = "quqamayor@gmail.com";

$mail = new PHPMailer();
$mail->Host = "localhost";

$mail->From = "contacto@latinmodel.com.mx";
$mail->FromName = "latinmodel.com.mx";
$mail->Subject = "- LatinModel - Edecanes Y Modelos";
$mail->AddAddress($correo);

$body = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Bienvenido</title>
</head>
<body style="background-color:#242424">
<table width="770" height="493" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="294" valign="top"><table width="739" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="772" height="29"><img src="http://www.latinmodel.com.mx/imagenes/linea.jpg" width="770" height="29" /></td>
        </tr>
    </table>
      <table width="770" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="73"><img src="http://www.latinmodel.com.mx/imagenes/left.jpg" width="73" height="427" /></td>
          <td width="652" align="left" valign="top">
		  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="height:427px;">
            <tr>
              <td align="left" valign="top" style="background-color:#FFFFFF; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#242424;">
			  <span style="color:#FF0000; font-weight:bold;">LatinModel M&eacute;xico</span><br>
			    <p>'.htmlentities($nombre).'</p>
			    <p>Recibimos tu registro en nuestro portal , ahora te agradecer&iacute;amos nos hagas llegar tu book con un m&iacute;nimo de 7 fotograf&iacute;as. </p>
			    <p>Es importante que las fotograf&iacute;as sean de estudio o por lo menos semi profesionales o en su defecto hayan sido tomadas en alg&uacute;n evento donde hayas participado. Por ningun motivo aceptamos fotograf&iacute;as tomandas con el celular o webcam y que no sean tomadas exprofesas para la ocasi&oacute;n.</p>
			    <p>Sin m&aacute;s, esperamos recibir tu correo pronto en nuesta direcci&oacute;n scouting@latinmodel.com.mx </p>
			    <p>No olvides visitar nuestro perfil <font color="#666666" size="2"><a href="http://latinmodel-mexico.hi5.com" title="LatinModel en Hi5" target="_blank" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px; font-weight:bold; color:242424;">perfil Hi5</a></font>.</p>
			    <p>&nbsp;</p>
				<p>&nbsp;</p>
			    <p>&nbsp;</p>
			    <p>&nbsp;</p>
				<p>&nbsp;</p>
			    <p>&nbsp;</p>
				<p>&nbsp;</p>
			    </td>
              <td align="center" valign="top" style="width:200px;"><br />
                <img src="http://www.latinmodel.com.mx/imagenes/chica.jpg" width="179" height="279" /><br />
                <br /></td>
            </tr>
          </table></td>
          <td width="45"><img src="http://www.latinmodel.com.mx/imagenes/right.jpg" width="45" height="427" /></td>
        </tr>
      </table>
      <table width="100" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><img src="http://www.latinmodel.com.mx/imagenes/footCorreo.jpg" width="770" height="37" border="0" /></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>';

$abody = "LatinModel México\n\n 

$nombre\n\n

Recibimos tu registro en nuestro portal , ahora te agradeceríamos nos hagas llegar tu book con un mínimo de 7 fotografías.n\n 

Es importante que las fotografías sean de estudio o por lo menos semi profesionales o en su defecto hayan sido tomadas en algún evento donde hayas participado. Por ningun motivo aceptamos fotografías tomandas con el celular o webcam y que no sean tomadas exprofesas para la ocasión.\n\n

Sin más, esperamos recibir tu correo pronto en nuesta dirección scouting@latinmodel.com.mx\n\n 

No olvides visitar nuestro perfil perfil Hi5.\n\n

LatinModel. http://www.latinmodel.com.mx\n
perfil Hi5.  http://latinmodel-mexico.hi5.com ";


$mail->Body = $body;
$mail->AltBody = $abody;

	if($mail->Send())
		$resultado = 'Enviado';
	else
		$resultado = 'Fallido';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>::: LatinModel ::: Modelos AA, Modelos AAA, Edecanes AA, Edecanes AAA, G'Os ::: </title>
<link href="../estilos.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../js/ajax.js"></script>
<script language="javascript" type="text/javascript" src="../js/mootools-release-1.11.js"></script>
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
		
/* AJAX Objects */
function espera()
{
/* Esta función solo nos sirve para retardar la carga de los datos */
	contenedor.innerHTML = ajax.responseText
}

function chgFoto()
{
	contenedor = document.getElementById('ajaxFoto');
	chica = document.getElementById('lScouteo').value;

	ajax=nuevoAjax();
	ajax.open("GET", "ajax/xaltamodelo.php?cambiarFoto="+chica,true);
	ajax.onreadystatechange=function() {
		if (ajax.readyState != 4) {
			contenedor.innerHTML = '<span class="txtgris12"><img src="imagenes/ajax-loader.gif" width="25" height="25">Cargando foto...</span>';
		}else{
			window.setTimeout('espera();',500); //pretendemos demorar la respuesta unos segundos
		}
	}
	ajax.send(null)		
}
		
		
	</script>
</head>
<body>
<table width="770" height="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="294" valign="top"><table width="739" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="238" height="102">
		<img src="../imagenes/titulo.jpg" width="241" height="102" border="0" usemap="#logo" /></td>
        <td width="77">	
        <a href="../teens.php" title="Chicas y Chicos::T e e n s" class="Tips2">
		<img src="../imagenes/menu1.jpg" width="77" height="102" border="0" /></a>
		</td>
        <td width="87">
		<a href="../edecanes.php" title="C h i c a s::E d e c a n e s" class="Tips2">
		<img src="../imagenes/menu2.jpg" width="87" height="102" /></a>
		</td>
        <td width="87">
		<a href="../modelos.php" title="C h i c a s::M o d e l o s" class="Tips2">
		<img src="../imagenes/menu3.jpg" width="87" height="102" /></a>
		</td>
        <td width="87">
		<a href="../hombres.php" title="C h i c o s::M o d e l o s , G ' O S" class="Tips2">
		<img src="../imagenes/menu4.jpg" width="87" height="102" /></a>
		</td>
        <td width="100">
		<a href="../scouting.php" title="LatinModel::S c o u t i n g" class="Tips2">
		<img src="../imagenes/menu5.jpg" width="100" height="102" border="0" /></a>		</td>
        <td width="96">
		<a href="../cotizacion.php" title="LatinModel::C o t i z a c i o n e s" class="Tips2">
		<img src="../imagenes/menu6.jpg" width="91" height="102" border="0" /></a>		</td>
      </tr>
      <tr>
        <td height="29" colspan="7"><img src="../imagenes/linea.jpg" width="770" height="29" /></td>
        </tr>
    </table>
      <table width="770" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="73"><img src="../imagenes/left.jpg" width="73" height="427" /><br /></td>
          <td width="652" align="left" valign="top">
		  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="height:427px;">
            <tr>
              <td align="center" valign="top" style="background-color:#FFFFFF;">
			  <div align="left" class="txtRojo14">Env&iacute;o de Correo </div>
			  <p><br />
			      <br />
			    <br />
			  </p>
			  <p><?=$resultado?></p>
			  <p>&nbsp;</p>
			  <div align="center" class="txtRojo14"> <a href="altamodelo.php" title="Dar de alta en cartera" class="txtRojo14">Volver al Alta de Modelo </a> </div>			  <p>&nbsp;</p></td>
              </tr>
          </table>		  </td>
          <td width="45"><img src="../imagenes/right.jpg" width="45" height="427" /></td>
        </tr>
      </table>
      <table width="100" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><img src="../imagenes/foot.jpg" width="770" height="164" border="0" usemap="#foot_menu" /></td>
        </tr>
      </table></td>
  </tr>
</table>
<map name="logo" id="logo">
<area shape="rect" coords="9,27,187,59" href="../index.php" />
</map>
<map name="foot_menu" id="foot_menu">
<area shape="rect" coords="338,112,386,160" href="../teens.php" title="Chicas y Chicos::T e e n s" class="Tips2" />
<area shape="rect" coords="398,113,463,160" href="../edecanes.php" title="C h i c a s::E d e c a n e s" class="Tips2" />
<area shape="rect" coords="477,115,534,157" href="../modelos.php" title="C h i c a s::M o d e l o s" class="Tips2" />
<area shape="rect" coords="542,116,594,157" href="../hombres.php" title="C h i c o s::M o d e l o s , G ' O S" class="Tips2" /><area shape="rect" coords="602,119,670,157" href="../scouting.php" title="LatinModel::S c o u t i n g" class="Tips2" />
<area shape="rect" coords="677,119,745,156" href="../cotizacion.php" title="LatinModel::C o t i z a c i o n e s" class="Tips2" />
</map>
</body>
</html>