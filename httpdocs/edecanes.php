<?php
include("includes/funciones.php");
include("includes/ConnLatin.php");
include("includes/paginador.php");
define("MINIMO",8); //MINIMO DE FOTOS POR PAGINA
$faltantes = 0; // Variable para controlar las fotos que restan en cada pagina
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php	include("templates/tags.html");	?>
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
		<img src="imagenes/menu2.jpg" width="87" height="102" /></a>
		</td>
        <td width="87">
		<a href="modelos.php" title="C h i c a s::M o d e l o s" class="Tips2">
		<img src="imagenes/menu3.jpg" width="87" height="102" border="0" /></a>		</td>
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
              <td align="left" valign="top" style="background-color:#FFFFFF">
			  <div align="left" class="txtRojo14">Edecanes</div><br />
			  <table align="center" width="450" border="0" cellpadding="5" style="background-color:#FECDCD;">
			  <?php
			  
			  	$query = "SELECT id_cartera,nombre,carpeta,fechaNacimiento,categoria FROM cartera 
						WHERE tipo = 'E'  AND status = 1 AND sexo = 'f' 
						AND fechaNacimiento <= DATE_SUB(CURDATE(),INTERVAL 18 YEAR)  
						ORDER BY posicion";
											
				$nav = new navbar;
				$nav->num_resultados_x_pag = 8;
    			$resultado_qry = $nav->ejecuta_qry($query, $conex);
    			$filas = mysql_num_rows($resultado_qry);
			
				if($filas < MINIMO)
					$faltantes = MINIMO - $filas;
			
				$i = 0;
				while(list($id,$nombre,$carpeta,$fnac,$cat) = mysql_fetch_row($resultado_qry))
				{
					$nombre = ucfirst(substr(strtolower($nombre),0,strpos($nombre," ")));
					#$edad = regresaEdad($fnac);
					if(is_file('cartera/smalls/'.$carpeta.'.jpg'))
						$foto = 'cartera/smalls/'.$carpeta.'.jpg'; 
					else
						$foto = 'imagenes/sinfoto.jpg';
						 
			  		if($i%4==0)
						echo '<tr>';
				?>
				<td  align="center" style="width:105px; height:160px; border:1px solid #FFFFFF;">
				<a href="perfil.php?idc=<?= $id ?>" title="<?= $nombre ?>::<?= $cat ?>" class="Tips4">
				<img src="<?=$foto?>" alt="" width="100" height="118" />
				</td>	
			  <?php
			  		$i++;
			  	}
				
				############# Si faltan foto para rellenar en la fila, las ponemos vacías ##########
				if($faltantes > 0)
				{
					for($j=$i; $j<$faltantes+$i; $j++)
					{
						if($j % 4 == 0)
							echo '<tr>';	
				?>
				<td align="center"style="width:105px; height:160px; border:1px solid #FFFFFF;">&nbsp;</td>				
			  <?php
			  		}
			  	}
			  ?>
			  </table>
			  	<div align="center"><br /><br />
					<?php
						$ligas = $nav->paginas("all", "on");
            			for ($y = 0; $y < count($ligas); $y++)
 			 				echo $ligas[$y] .'&nbsp;&nbsp;';
					?>				
              </div>
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
