<?
class navbar
{
  /**** Valores por default ******************/
        var $num_resultados_x_pag = 10;
        var $result_previos = "<< Anterior ";
        var $result_siguientes = " Siguiente >>";
  /**** Variables internas ********************/
        var $file;
        var $total_records;

  /*
        '***************************************************************************
        '       Nombre de la Funcion:  ejecuta_qry
        '       Autor:  Mediks.com
        '****************************************************************************
        ' Proposito: Esta funcion ejecuta el query y obtiene el total de registros
        ' Entrada :
        '       parámetro1 : El query en SQL a ejecutar, string
        '       parámetro2 : El conector a la base de datos, string
        '
        ' Regresa : ---
        ' Observaciones:  ---
        '
        '************************************************************************************
  */
  function ejecuta_qry($query) {
    global $total_records, $pag, $numtoshow;

    $numtoshow = $this->num_resultados_x_pag;
    if (!isset($_GET["pag"])) $pag = 0;
	else $pag = $_GET["pag"];
    $start = $pag * $numtoshow;
	   //echo "pagina = $pag y muestro $numtoshow por pagina";
        $resultado_qry = mysql_query($query);
        $total_records = mysql_num_rows($resultado_qry);
        $query .= " LIMIT $start, $numtoshow";
		 // echo " el query es $query";
        $resultado_qry = mysql_query($query);

    return $resultado_qry;
  }

  /*
        '***************************************************************************
        '       Nombre de la Funcion:  genera_url
        '       Autor:  Mediks.com
        '****************************************************************************
        ' Proposito: Esta funcion genera el URL para identificar el numero de pagina
        ' Entrada :
        '       parámetro1 : ---
        '       parámetro2 : ---
        '
        ' Regresa : ---
        ' Observaciones:  ---
        '
        '************************************************************************************
  */
  function genera_url()
  {
    #global $REQUEST_URI, $REQUEST_METHOD, $HTTP_GET_VARS, $HTTP_POST_VARS;

    list($fullfile, $voided) = explode("?", $_SERVER['REQUEST_URI']);
    $this->file = $fullfile;
    $cgi = $_SERVER['REQUEST_METHOD'] == 'GET' ? $_GET : $_POST;
    reset ($cgi);
    while (list($key, $value) = each($cgi)) {
      if ($key != "pag")
        $query_string .= "&" . $key . "=" . $value;
    }
    return $query_string;
  }

  // This function creates an array of all the links for the
  // navigation bar. This is useful since it is completely
  // independent from the layout or design of the page.
  // The function returns the array of navigation links to the
  // caller php script, so it can build the layout with the
  // navigation links content available.
  //
  // $option parameter (default to "all") :
  //  . "all"   - return every navigation link
  //  . "pages" - return only the page numbering links
  //  . "sides" - return only the 'Next' and / or 'Previous' links
  //
  // $show_blank parameter (default to "off") :
  //  . "off" - don't show the "Next" or "Previous" when it is not needed
  //  . "on"  - show the "Next" or "Previous" strings as plain text when it is not needed

  /*
        '***************************************************************************
        '       Nombre de la Funcion:  paginas
        '       Autor:  Mediks.com
        '****************************************************************************
        ' Proposito: Esta funcion genera el URL para identificar el numero de pagina
        ' Entrada :
        '       parámetro1 : $option
        '                          "all" - regresa el numero de paginas
        '       parámetro2 : ---
        '
        ' Regresa : ---
        ' Observaciones:  ---
        '
        '************************************************************************************
  */
  function paginas($option = "all", $show_blank = "off") {
    global $total_records, $pag, $numtoshow;

    $extra_vars = $this->genera_url();
    $file = $this->file;
    $number_of_pages = ceil($total_records / $numtoshow);
    $subscript = 0;

    for ($current = 0; $current < $number_of_pages; $current++) {
      if ((($option == "all") || ($option == "sides")) && ($current == 0)) {
        if ($pag != 0)
          $array[0] = "<A HREF='" . $file . "?pag=" . ($pag - 1) . $extra_vars . "' class='titulor'><strong>" . $this->result_previos . "</strong></A>";
        elseif (($pag == 0) && ($show_blank == "on"))
          //$array[0] = $this->result_previos;
                  $array[0] = " ";
      }

      if (($option == "all") || ($option == "pages")) {
        if ($pag == $current)
          $array[++$subscript] = ($current > 0 ? ($current + 1) : 1);
        else
          $array[++$subscript] = "<A HREF='" . $file . "?pag=" . $current . $extra_vars . "' class='titulor'><strong>
		  " . ($current + 1) . "</strong></A>";
      }

      if ((($option == "all") || ($option == "sides")) && ($current == ($number_of_pages - 1))) {
        if ($pag != ($number_of_pages - 1))
          $array[++$subscript] = "<A HREF='" . $file . "?pag=" . ($pag + 1) . $extra_vars . "' class='titulor'><strong>" . $this->result_siguientes . "</strong></A>";
        elseif (($pag == ($number_of_pages - 1)) && ($show_blank == "on"))
          //$array[++$subscript] = $this->result_siguientes;
                  $array[++$subscript] = "
                  ";
      }
    }
    return $array;
  }
}
?>
