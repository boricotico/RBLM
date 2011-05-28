<?php
include("includes/funciones.php");
include("includes/ConnLatin.php");
include("includes/paginador.php");

if(!isset($_GET["idc"]))
	header("Location : index.php");

$id = (int)$_GET["idc"];

$ficha = regresaRegistro("cartera",$id);
$nombre = $ficha[2];
$nacionalidad = $ficha[3];
$edad = regresaEdad($ficha[4]) > 100 ? 'N/A' : regresaEdad($ficha[4]);
$residencia = $ficha[1];
$telefono = $ficha[5];
$correo = $ficha[6];
$experiencia = $ficha[13];
$sexo = $ficha[7];
$medidas = 	$ficha[8];
$estatura = $ficha[9];
$peso = $ficha[10];
$ojos = $ficha[11];
$cabello = $ficha[12];
$archivo_xml = 'cartera/listaxml/'.$ficha[14].'.xml';
$categoria = $ficha[17];

########################### Construimos el archivo xml con las fotos a mostrar ################		
	if(!is_file($archivo_xml))
	{
		$carpeta_fotos = 'cartera/'.$ficha[14].'/';
		$fotos  = dir($carpeta_fotos);
		#$totalFotos = count($fotos);
		#unlink($archivo_xml);
		
		touch($archivo_xml,0777);
		chmod($archivo_xml,0777);
	
		$link = fopen($archivo_xml,"a");
		fwrite($link,' <gallery rows="3" cols="3" stage_width="350" stage_height="380" galleryMargin="40" thumb_width="90" thumb_height="95" thumb_space="10" thumbs_x="auto" thumbs_y="auto" large_x="auto" large_y="auto" nav_x="0" nav_y="auto" nav_slider_alpha="50" nav_padding ="7" use_flash_fonts="false" nav_text_size="11" nav_text_bold="false" nav_font="Verdana" bg_alpha="100" text_bg_alpha="50" text_xoffset="20" text_yoffset="10" text_size="11" text_bold="false" text_font="Verdana" link_xoffset="-2" link_yoffset="5" link_text_size="11" link_text_bold="false" link_font="Verdana" border="5" corner_radius="5" shadow_alpha="40" shadow_offset="2" shadow_size="5" shadow_spread="0" friction=".3" bg_color="333333"
border_color="FFFFFF" thumb_bg_color="FFFFFF" nav_color="999999" nav_slider_color="000000" txt_color="FFFFFF" text_bg_color="000000" link_text_color="666666" link_text_over_color="FF9900" auto_size="true" showHideCaption="true"
autoShowFirst="false" disableThumbOnOpen="true" >' . "\n");

		$i= 1;
		while (false !== ($fotico = $fotos->read()))
		{
			if(strstr(strtolower($fotico),"jpg"))
			{
				fwrite($link,'  <pic image="'.$carpeta_fotos.$fotico.'" title="'.$nombre.'" />'."\n");
				$i++;
			}
		}

	
		#if($i > 1)
		#{
		fwrite($link,"</gallery>");
		fclose($link);
	#}else
		#unlink($archivo_xml);
	}		
###############		

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php	include("templates/tags.html");	?>
<link href="estilos.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="flashdetect.js"></script>
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
          <td width="73"><img src="imagenes/left.jpg" width="73" height="427" /></td>
          <td width="652" align="left" valign="top">
		  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="height:427px;">
            <tr>
              <td align="left" valign="top" style="background-color:#FFFFFF">
			  <div align="left" class="txtRojo14"><?=$nombre?> &nbsp; <?php if ($sexo=='f') echo "($categoria)"; ?></div><br />
			  <table align="center" width="651" border="0" cellpadding="5">
				  <td align="left" valign="top" style="border:1px solid #FFFFFF; width:250px;">
				  <table width="100%" border="0" align="center" cellpadding="1" class="ctable">
                    <tr style="height:20px;">
                      <td width="50%" align="right" valign="bottom" class="ctitle">Edad:</td>
                      <td width="50%" align="left" valign="bottom" class="ctext"><?=$edad?> años</td>
                    </tr>
                    
                    <tr>
                      <td align="right" valign="bottom" class="ctitle">Estatura:</td>
                      <td align="left" valign="bottom" class="ctext"><?=$estatura?> cms.</td>
                    </tr>
                    <tr>
                      <td align="right" valign="bottom" class="ctitle">Peso:</td>
                      <td align="left" valign="bottom" class="ctext"><?=$peso?> kgs.</td>
                    </tr>
					<?php	if($sexo == 'f'){	?>
                    <tr>
                      <td align="right" valign="bottom" class="ctitle">Medidas:</td>
                      <td align="left" valign="bottom" class="ctext"><?=$medidas?></td>
                    </tr>
					<?php	}	?>
                    <tr>
                      <td align="right" valign="bottom" class="ctitle">Color de Ojos: </td>
                      <td align="left" valign="bottom" class="ctext"><?=$ojos?></td>
                    </tr>
                    
                    <tr>
                      <td align="right" valign="bottom" class="ctitle">Color de Cabello:</td>
                      <td align="left" valign="bottom" class="ctext">
                        <?=$cabello?>
                      </td>
                    </tr>
                    <tr>
                      <td align="right" valign="bottom">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="2" align="left" valign="top" class="cexperience"><?=nl2br($experiencia)?></td>
                      </tr>
                  </table></td>
				   <td align="center" valign="top" style="border:1px solid #FFFFFF; background-color:#242424; height:380px;">
					<div id="galeriamodelo">
					<p style="color:#FFFFFF; font-weight:bold;">Parece que no tienes el Plugin de Flash instalado.  
					<a href="http://www.macromedia.com/go/getflashplayer" style="color:E4FFF3;" >Haz click aquí</a> 
					para descargarlo.					</p>
					</div>
					<script type="text/javascript">
					var so = new SWFObject("xmlGallery.swf", "gallery", "390", "375", "7", "#242424");
					so.addVariable("file_to_load", "<?=$archivo_xml?>");
					so.write("galeriamodelo");
					</script>					</td>				
			  </table>			  </td>
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
