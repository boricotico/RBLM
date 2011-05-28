<?php
	#error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));		
	session_start();
	header('Content-Type: text/html; charset=iso-88859-1');

	# DESC: Archivo de funciones recurrentes
	# AUT : Roberto Bárcenas Adame
	# FECHA : 28/Marzo/2005
	# MODIF : 28/Marzo/2005
	
####################################
# Funcion para validación de los usuarios dentro de las páginas del sistema
####################################

function validapag ($perfil, $ini)
{
	if (! isset( $_SESSION['USPFID'] ) )
		$vale = false;
	else
	{	
		if ( $_SESSION['USPFID'] == 0)
			$vale = false;
		else
		{
			$vale = false;
			$xlst = split( ",", $perfil);
		
			for ($i = 0; $i < count($xlst); $i++)
			{
				if ($_SESSION['USPFID'] == $xlst[$i])
				{
					$vale = true;
					break;
				}
			} 
		}
	}

	if (! $vale)
	{
		$_SESSION['USPFID'] = 0;
		
		session_unset();
		session_destroy();

		echo '
				<script language="javascript" type="text/javascript">
					self.location="'.$ini.'";
				</script>';
	}
	return($vale);
}
##############################
# Función para encriptación de las claves de usuario
##############################

function encrip ($clave) 
{
	$xs = "";
	$xc = "";
	$xn = 0;
	$xn2 = 0;
	
	for ($i = 1; $i <= strlen($clave); $i++)
	{
		$xc = substr ($clave, ($i - 1), 1);
		$xn = ord ($xc);

		$xn2 = $xn;

		if (($xn >= 48) && ($xn < 58))
		{
			if (($xn + $i) > 57)
				$xn2 = (48 + ((($xn + $i) - 58) % 10));
			else
				$xn2 = ($xn + $i);
		}

		if (($xn >= 65) && ($xn < 91))
		{
			if (($xn + $i) > 90)
				$xn2 = (65 + ((($xn + $i) - 91) % 26));
			else
				$xn2 = ($xn + $i);
		}

		if (($xn >= 97) && ($xn < 123))
		{
			if (($xn + $i) > 122)
				$xn2 = (97 + ((($xn + $i) - 123) % 26));
			else
				$xn2 = ($xn + $i);
		}
		$xs = $xs . chr($xn2);
	}
	return($xs);
}

######################################
# Función inversa a encrip(), desencripta la clave del usuario
######################################

function decrip ($clave)
{
	$xs = "";
	$xc = "";
	$xn = 0;
	$xn2 = 0;
	
	for ($i = 1; $i <= strlen($clave); $i++)
	{
		$xc = substr ($clave, ($i - 1), 1);
		$xn = ord ($xc);

		$xn2 = $xn;

		if (($xn >= 48) && ($xn < 58))
		{
			if (($xn - $i) < 48)
				$xn2 = 57 - ((58 - ($xn - ($i - 1))) % 10);
			else
				$xn2 = ($xn - $i);
		}

		if (($xn >= 65) && ($xn < 91))
		{
			if (($xn - $i) < 65)
				$xn2 = 90 - ((91 - ($xn - ($i - 1))) % 26);
			else
				$xn2 = ($xn - $i);
		}

		if (($xn >= 97) && ($xn < 123))
		{
			if (($xn - $i) < 97)
				$xn2 = 122 - ((123 - ($xn - ($i - 1))) % 26);
			else
				$xn2 = ($xn - $i);
		}
		$xs = $xs . chr($xn2);
	}
	return($xs);
}
######################################
# Imprime un combo Select de HTML (es capaz de formar combos simples o multiples,
# así como elementos individuales preseleccionados, o bien un arreglo de elementos para el caso de combos multiples.
# Recibe 6 parámetros
# Param1: El nombre del combo
# Param2: El query
# Param3: El elemento preseleccionado en el combo.
# Param4: Eventos o modificadores del combo
# Param5: Texto seleccionado si no hay un elemento coincidente
# Param6: Valor que indica si el query formado ha de mostrarse(1=mostrar | 0=no mostrar) 
######################################

function impSelect($nombre,$queryObj,$select,$extra,$inicial,$show)
{ 
  if($show == 1)
  	echo $queryObj;			

   $xObj = mysql_query($queryObj);
   $filas = mysql_num_rows($xObj);
      
   if($filas <= 0) $inicial = "---";

    echo '<select id="'.$nombre.'" name="'.$nombre.'" '.$extra.'>';
	
	if($select == -99)
		echo '<option value="-99" selected="selected">'.$inicial.'</option>';

          
         for ($j = 0; $j < $filas; $j++)
		 {
          	$arrObj = mysql_fetch_array($xObj);
          	$id_obj = $arrObj[0];
			$obj =	  $arrObj[1]; 
			
			if(is_array($select) && in_array($id_obj,$select))
				echo '<option value="'.$id_obj.'" selected="selected">'.htmlentities($obj).'</option>';
			else if($id_obj == $select)
				echo '<option value="'.$id_obj.'" selected="selected">'.htmlentities($obj).'</option>';
			else
               	echo '<option value="'.$id_obj.'">'.htmlentities($obj).'</option>';
		}
		echo "</select>";
}
######################################
# Imprime un combo HTML Select
# Recibe 5 parámetros
# Param1: El nombre del combo.
# Param2: Algun evento a ejecutar al seleccionar
# Param3: El valor por defecto.
# Param4: La etiqueta inicial.
# Param5: El arreglo con los valores
######################################

function impSelectArray($nombre,$extra,$select,$inicial,$arreglo)
{
    echo '<select id="'.$nombre.'" name="'.$nombre.'" '.$extra.'>';
	
	if($select == -99)
		echo '<option value="-99" selected="selected">'.$inicial.'__</option>';

          
	foreach($arreglo as $valor => $etiqueta)
	{
		if(is_array($select) && in_array($id_obj,$select))	
			echo '<option value="'.$valor.'" selected="selected">'.htmlentities($etiqueta).'</option>';
		else if($valor == $select)
			echo '<option value="'.$valor.'" selected="selected">'.htmlentities($etiqueta).'</option>';
		else
        	echo '<option value="'.$valor.'">'.htmlentities($etiqueta).'</option>';
	}
	echo "</select>";
}
#######################
# Función que pinta el abecedario
# (recibe un parámetro, que es el href de la liga) 
############################
function daABCdario($pag,$desde,$hasta)
{
	for ($i = A; $i!="AA"; $i++)
 	{
		echo '<a href="'.$pag.'?letra='.$i.'&amp;inicio='.$desde.'&amp;termino='.$hasta.'&amp;flag=1">'.$i.'</a>&nbsp;&nbsp;&nbsp;&nbsp;';
	}
}
#############################
# Funcion que traduce un dia de la semana
# de ingles a español
# recibe el dia de la semana en ingles
#############################
function diaSemana($dia)
{
	switch($dia)
	{
		case 'Sunday':
					   $dia = 'DOMINGO';
					   break;
		case 'Monday':
					   $dia = 'LUNES';
					   break;
		case 'Tuesday':
					   $dia = 'MARTES';
					   break;
		case 'Wednesday':
					   $dia = 'MIERCOLES';
					   break;
		case 'Thursday':
					   $dia = 'JUEVES';
					   break;
		case 'Friday':
					   $dia = 'VIERNES';
					   break;
		case 'Saturday':
					   $dia = 'SABADO';
					   break;
	}
	return $dia;
}

#############################
# Funcion que traduce un mes 
# de ingles a español
# recibe el dia de la semana en ingles
#############################
function daMes($mes)
{
	switch($mes)
	{
		case '01':
					   $mes = 'Enero';
					   break;
		case '02':
					   $mes = 'Febrero';
					   break;
		case '03':
					   $mes = 'Marzo';
					   break;
		case '04':
					   $mes = 'Abril';
					   break;
		case '05':
					   $mes = 'Mayo';
					   break;
		case '06':
					   $mes = 'Junio';
					   break;
		case '07':
					   $mes = 'Julio';
					   break;
		case '08':
					   $mes = 'Agosto';
					   break;
		case '09':
					   $mes = 'Septiembre';
					   break;
		case '10':
					   $mes = 'Octubre';
					   break;
		case '11':
					   $mes = 'Noviembre';
					   break;
		case '12':
					   $mes = 'Diciembre';
					   break;
	}
	return $mes;
}
##############################################################################
# Función que imprime un objeto media "Quicktime" dependiendo del navegador
# Recibe 1 parametro (1= Explorer | 2= Otro)
##############################################################################

function quicktimeVideo($navegador,$video)
{
	$rutaVideo = './videos/';

	if($navegador == 1 && is_file($rutaVideo.$video))
		echo '				  
			<object classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" codebase="http://www.apple.com/qtactivex/qtplugin.cab" width="170" height="160">
              <param name="src" value="'.$rutaVideo.$video.'" />
              <param name="autoplay" value="false" />
			  <param name="starttime" value="00:00:02:00" />
              <param name="pluginspage" value="http://www.apple.com/quicktime/download/" />
              <param name="controller" value="true" />
			  <param name="scale" value="ToFit" />
			</object>';
	else if(is_file($rutaVideo.$video))
		echo'
            <object data="'.$rutaVideo.$video.'" width="170" height="160" type="video/quicktime">
              <param name="pluginurl" value="http://www.apple.com/quicktime/download/" />
              <param name="controller" value="true" />
              <param name="autoplay" value="false" />
			  <param name="starttime" value="00:00:01:50" />
			  <param name="scale" value="ToFit" />
             </object>';
}

################################### Funcion para validar la sintaxis de un correo #############################	
function regresaUltimo()
{
	$xqry = mysql_query("SELECT LAST_INSERT_ID()");
	list($ultimo) = mysql_fetch_row($xqry);
	
	return $ultimo;
}
################################### Funcion para regresar un dato de las tablas #############################	
############################################################################################
# Funcion que regresa un registro completo de una tabla
############################################################################################
function regresaRegistro($tabla,$id)
{
	$qry = "SELECT * FROM $tabla  WHERE id_$tabla = $id";
	$xqry = mysql_query($qry);
	
	#echo "$qry<br>";
		
	return mysql_fetch_row($xqry);
}	
############################################################################################
# Funcion que regresa la edad en años transcurridos desde una fecha
############################################################################################
function regresaEdad($fecha)
{
    $arrF = explode("-",$fecha);
    $fnacim = $arrF[0].$arrF[1].$arrF[2];
    $hoy = date("Ymd");

    $edad = floor($hoy/10000 - $fnacim/10000);

	return $edad;
}
?>