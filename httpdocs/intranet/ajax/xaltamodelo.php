<?php

include_once('../../includes/ConnLatin.php');


if(isset($_GET["cambiarFoto"]))
{
	$id = (int)$_GET["cambiarFoto"];
	$ruta = '../../scouteo/';

	$xqry = mysql_query("SELECT id_scouteo,nombre,foto,correo FROM scouteo WHERE id_scouteo = $id");
	list($id,$nombre,$foto,$mail) = mysql_fetch_row($xqry);
	
	if(is_file($ruta.$foto))
		echo '
		<a href="../scouteo/'.$foto.'" title="Ver foto" target="_blank">
		<img src="../scouteo/'.$foto.'" alt="Foto del id '.$id.'" width="120" height="150" />
		</a><br>
		<a href="correomodelo.php?email='.$mail.'&name='.$nombre.'" title="Requerir book">Requerir Book</a><br><br>
		<a href="altamodelo.php?del='.$id.'" title="Eliminar">Eliminar de Scouting</a>';
	else
		echo 'No se encontro la foto<br>
		<a href="correomodelo.php?email='.$mail.'&name='.$nombre.'" title="Requerir book">Requerir Book</a><br><br>
		<a href="altamodelo.php?del='.$id.'" title="Eliminar">Eliminar de Scouting</a>';

}
?>
