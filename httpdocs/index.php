<?php
include("includes/funciones.php");
include("includes/ConnLatin.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php	include("templates/tags.html");	?>
<link href="estilos.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="niceforms.js"></script>
<script language="javascript" type="text/javascript" src="js/mootools-release-1.11.js"></script>
<script type="text/javascript" language="javascript">

function mensaje()
{

alert("En los ultimos dias hemos estado experimentando problemas para mostrar las galerias con Explorer. \n\nRogamos tu comprension y te pedimos que revises el sitio con algun otro navegador mientras resolvemos los inconvenientes con Explorer.\n\n Puedes usar Firefox, Opera, Safari, Nestcape sin problemas.");
}	   

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
				className: 'custom',
				showDelay: 400,
				hideDelay: 400,
				offsets: {'x': -50, 'y': -70}
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
		<img src="imagenes/menu2.jpg" width="87" height="102" border="0"/></a>
		</td>
        <td width="87">
		<a href="modelos.php" title="C h i c a s::M o d e l o s" class="Tips2">
		<img src="imagenes/menu3.jpg" width="87" height="102" border="0"/></a>
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
          <td width="73"><img src="imagenes/left.jpg" width="73" height="427" /></td>
          <td width="652" align="left" valign="top">
		  			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="height:427px;">
            	<tr>
              	<td align="left" valign="top" style="background-color:#FFFFFF;">
              		<div style="overflow:auto;max-height:425px;">
	                	<span class="titulon">Latin</span> <span class="titulor">Model</span> <span class="titulon">M&eacute;xico</span>
	                	<p class="texto">Estamos comprometidos en garantizar un trabajo profesional  a todo organizador, cliente o empresa que requiera de nuestros servicios, para alcanzar un resultado &oacute;ptimo y &eacute;xitoso en la proyecci&oacute;n e imagen de sus eventos y proyectos. </p>
	                	<p class="texto">Tratamos de brindar un servicio 100% eficiente en imagen, elegancia, personalidad, simpat&iacute;a,facilidad de contacto hacia nuestra empresa, puntualidad, efectividad y confianza. </p>
	                	<p class="texto">Nuestros servicios:<br />
	                  	* Exposiciones<br />
	                  	* Conferencias<br />
	                  	* Ferias<br />
	                  	* Eventos<br />
	                  	* Pasarelas<br />
	                  	* Eventos publicitarios<br />
	                  	* Ruedas de prensa <br />
	                  	* Conciertos<br />
	                  	* Eventos deportivos<br />
	                  	* Autodromo<br />
	                  	* Modelos para TV<br />
	                  	* Modelos para fotografia<br />
	                  	* Modelos para comerciales<br />
	                  	* Modelos para eventos especiales<br />
	                  	* Edecanes para congresos<br />
	                		* Edecanes para promociones
	                	</p>
	                </div>
               	</td>
              	<td align="left" valign="top" style="width:200px; background-color:#FECDCD;">
			  					<table align="center" width="100%" cellpadding="4" cellspacing="10">
			  	<?php 
				$ruta_foto = "cartera/smalls";
				$query = "SELECT id_cartera,carpeta,nombre,fechaNacimiento FROM cartera WHERE status = 1 ORDER BY RAND() LIMIT 8";
				#print"$query";
				$result = mysql_query($query);
				$lista = mysql_num_rows($result);
				$faltantes = 6 - $lista;

				for($i=0; $i<$lista; $i++){
					$dato = mysql_fetch_array($result);	
					#print"$ruta_foto/$dato[1]";
					$nombre = $dato[2];
					$fnac = $dato[3];
					$nombre = ucfirst(substr(strtolower($nombre),0,strpos($nombre," ")));
					$edad = regresaEdad($fnac);
					if($i%2 == 0)
						echo '<tr>';
											
					echo'
						<td align="center" valign="top">
						<a href="perfil.php?idc='.$dato[0].'" title="'.$nombre.'::'.$edad.' años" class="Tips4"">
						<img src="'.$ruta_foto.'/'.$dato[1].'.jpg" width="70" height="80" alt="foto" border="0"/></a>
						</td>';					
				}
				
				if($faltantes > 0){
					for($j=$i ; $j < 8 ; $j++){
						if($j%2 == 0)
							echo '<tr>';
											
						echo'
						<td align="center" valign="top">
						<a href="scouting.php"><img src="imagenes/chicaD.jpg" width="70" height="80" alt="foto" border="0"/></a>
						</td>';					
					}
				}//fin if
				?>
				</table>
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
<div align="center">
<a href="http://guiamexico.com.mx" target="_blank" style="color:#242424">Gu&iacute;a M&eacute;xico</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="http://guiamexico.com.mx/agencia-de-modelos/empresas-guia.html" target="_blank" style="color:#242424">Modelos en México</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="http://guiamexico.com.mx/edecanes/empresas-guia.html" target="_blank" style="color:#242424">Edecanes en México</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="http://www.guiaespana.com.es/modelos-agencias-de-modelos/empresas-guia.html" target="_blank" style="color:#242424">Modelos en España</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="http://miguiaargentina.com.ar/modelos-agencias/empresas-guia.html" target="_blank" style="color:#242424">Modelos en Argentina</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="http://www.chili.com.mx" target="_blank" style="color:#242424">Directorio Mexicano</a>
</div>

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