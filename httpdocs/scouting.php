<?php
	require_once("includes/funciones.php");
	require_once("includes/ConnLatin.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php	include("templates/tags.html");	?>
<link href="estilos.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="js/validascouting.js"></script>
<script language="javascript" type="text/javascript" src="js/niceforms.js"></script>
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
		<a href="hombres.php" title="C h i c o s::M o d e l o s , G ' O S" class="Tips2">
		<img src="imagenes/menu4.jpg" width="87" height="102" border="0" /></a>		</td>
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
          <td width="73"><img src="imagenes/left.jpg" width="73" height="427" /><br /></td>
          <td width="652" align="left" valign="top">
		  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="height:427px;">
            <tr>
              <td align="left" valign="top" style="background-color:#FFFFFF;">
			  <div align="left" class="txtRojo14">Scouting</div>
			  <br />
			  <form action="xscouting.php" method="post" enctype="multipart/form-data" name="fscouting" class="niceform" id="fscouting">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="bottom" style="width:225px;"><label for="textinput">Nombre Completo </label>
                        <br />
                        <input type="text" id="scNombre" name="scNombre" size="20" /></td>
                    <td align="left" valign="bottom" style="width:225px;"><label for="textfield">Nacionalidad</label>
                        <br />
                        <input name="scNacionalidad" type="text" id="scNacionalidad" accesskey="p" size="20" /></td>
                  </tr>
                  <tr>
                    <td align="left" valign="bottom"><label for="select">Fecha de Nacimiento</label>
                        <br />
                        <input name="scDia" type="text" id="scDia" size="2" maxlength="2" />
                        <label>de</label>
                        <input name="scMes" type="text" id="scMes" size="2" maxlength="2" />
                        <label>de 19</label>
                        <input name="scYear" type="text" id="scYear" size="2" maxlength="2" /></td>
                    <td align="left" valign="bottom"><label for="select">Residencia</label>
                        <br />
                        <?php
						$nombre   = 'lresidencia';
						$queryObj = "SELECT id_estado, CONCAT( UPPER( SUBSTRING(estado, 1, 1 ) ) , 
						LOWER( SUBSTRING( estado, 2 ) ) ) FROM estado WHERE id_estado IN ( 9, 11 ) 
						ORDER BY estado";
						$inicial  = 'Por favor, selecciona';			
						impSelect($nombre,$queryObj,9,'',$inicial,0)
						?>
						</td>
                  </tr>
                  <tr>
                    <td align="left" valign="bottom"><label for="textfield">Tel&eacute;fono</label>
                        <br />
                        <input name="scTelefono" type="text" id="scTelefono" size="20" /></td>
                    <td align="left" valign="bottom"><label for="textfield">Correo electr&oacute;nico</label>
                        <br />
                        <input name="scCorreo" type="text" id="scCorreo" size="20" /></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top"><label for="textarea">Experiencia</label>
                        <br />
                        <textarea name="scExperiencia" cols="20" rows="3" id="scExperiencia"></textarea>
                        <label for="textfield"></label></td>
                    <td align="left" valign="top"><label>Sexo</label>
                      <br />
                      <input type="radio" name="scSexo" id="option1" value="f" checked="checked" />
                      <label for="option1">Chica</label>
                      <br />
                      <input type="radio" name="scSexo" id="option2" value="m" />
                      <label for="option2">Chico</label></td>
                  </tr>
                  <tr>
                    <td align="left" valign="bottom"><label for="textfield">Medidas</label>
                        <br />
                        <input name="scMedidas" type="text" id="scMedidas" size="10" /></td>
                    <td align="left" valign="bottom"><label for="label">Estatura(cms)<br />
                      </label>
                        <input name="scEstatura" type="text" id="label" size="10" /></td>
                  </tr>
                  <tr>
                    <td align="left" valign="bottom"><label for="label2">Peso(kgs)</label>
                        <br />
                        <input name="scPeso" type="text" id="label2" size="10" /></td>
                    <td align="left" valign="bottom"><label for="textfield">Color de Ojos</label>
                        <br />
                        <input name="scOjos" type="text" id="scOjos" size="15" /></td>
                  </tr>
                  <tr>
                    <td align="left" valign="bottom"><label for="label3">Color de cabello</label>
                        <br />
                        <input name="scCabello" type="text" id="label3" size="15" /></td>
                    <td align="left" valign="bottom"><label for="file">Fotograf&iacute;a</label>
                        <input type="file" name="scFoto" id="scFoto" /></td>
                  </tr>
                  <tr>
                    <td colspan="2" align="left" valign="bottom"><label></label>
                        <br />
                        <div align="center"></div></td>
                  </tr>
                  
                  <tr>
                    <td colspan="2" align="center" valign="bottom">
					<input type="submit" name="Submit" value="Enviar" onclick="validaEnvio();" /></td>
                    </tr>
                </table>
			    </form>
			  <br /><br />
                </td>
              <td align="center" valign="top" style="width:200px;"><br />
                <img src="imagenes/chica.jpg" width="179" height="279" /><br />
                <br /></td>
            </tr>
          </table>		  </td>
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
<area shape="rect" coords="9,27,187,59" href="index.php" />
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
