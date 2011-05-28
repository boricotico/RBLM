<?php
	require_once("../includes/funciones.php");
	require_once("../includes/ConnLatin.php");
	validapag("1","../index.php");

	$order_by = isset($_GET['change']) ? " RAND() " : 'posicion';
	$sexo = isset($_GET['sex']) ? $_GET['sex'] : 'f';
	$query = "SELECT id_cartera, nombre,carpeta,tipo,categoria FROM cartera WHERE sexo='$sexo' ORDER BY $order_by;";

	echo $query;

	$path = 'cartera/smalls/';
	$pos = 0;
	$xlistado = mysql_query($query);
	while(list($id,$nombre,$carpeta,$tipo,$categ) = mysql_fetch_row($xlistado)){
		
		if(isset($_GET['change'])){
			mysql_query("UPDATE cartera SET posicion = ".intval($pos+1)." WHERE id_cartera = ".$id.";");
		}

		if($pos == 0){
			$listado .= '<tr>';
		}
		
		if($pos % 4 == 0 and $pos > 0){
			$listado .= '</tr><tr>';	
		}
		$listado .= '<td style="width:110px;height:150px;" valign="top" align="center">('.($pos+1).') '.$tipo.' - '.$categ.'<br> 
								<img src="/'.$path . $carpeta.'.jpg" alt="'.$id.'" width="100" height="118" />
								<br>'.$nombre.'</td>';					
		$pos++;
	}
	$listado .= '</tr>';
			
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>::: LatinModel ::: Modelos AA, Modelos AAA, Edecanes AA, Edecanes AAA, G'Os ::: </title>
<link href="../estilos.css" rel="stylesheet" type="text/css" />
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
              	<td align="left" valign="top" style="background-color:#FFFFFF;">
			  					<div align="left" class="txtRojo14">Posiciones</div>
			  					<br>
			  					<a href="<?= $PHP_SELF ?>set_position.php?sex=f&change">Cambiar posicion Mujeres</a>
			  						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			  					<a href="<?= $PHP_SELF ?>set_position.php?sex=m&change">Cambiar posicion Hombres</a>	
			  					<br><br>
			  					<div style="overflow:auto;max-height:300px;">
										<table align="center" width="90%">
											<?= $listado ?>
										</table>
									</div>
								</td>
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
