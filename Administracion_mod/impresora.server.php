<?php
function consultar_impresora($frm, $pagina = 1 ,$rp = 0)
{	
    $r	= new xajaxResponse();
    if(!isset($_SESSION[SESSION_USUARIO])){$r->addScript("xajax_reloguea();"); return $r;}
    if($rp == 0) $rp = $_SESSION["cant_registros"];
    
    $obj_util = new util();
    $filtro = '';
    
    if(isset($frm['txtNomImpresoraB']) &&  !empty($frm['txtNomImpresoraB']))
        $filtro .= ($filtro ? ' AND ' : ' ')." nombre LIKE '%".strtoupper($obj_util->limpia_dato($frm['txtNomImpresoraB']))."%'";
    
    if(isset($frm['txtCodImpresoraB']) &&  !empty($frm['txtCodImpresoraB']))
        $filtro .= ($filtro ? ' AND ' : ' ')." cod_impresora LIKE '%". strtolower($obj_util->limpia_dato($frm['txtCodImpresoraB']))."%'";
    
    $arrPar=array();
    $elementos=array();
    $limit = "LIMIT $rp OFFSET " . (($pagina - 1) * $rp);
    $arrPar['filtro'] = $filtro;
    $arrPar['orderBy'] = "nombre";
    $arrPar['limit'] =	$limit;
    $elementos = $obj_util->consultar("impresora", $arrPar);
    $n = $elementos['n'];
    $elementos = $elementos['elementos'];
   
    if($n > 0)
    {
        $tabla = '<table class="tablaResultado" cellpadding="1px" cellspacing="1px" align = "center">
                    <th align="left">Nombre</th>
                    <th align="left">Cod Impresora</th>
                    <th align="left">Observacion</th>';
        $color = true;
        foreach($elementos as $codigos)
        {
            $tabla .= '<tr class="' . ($color ? 'rowpar' : 'rownon') . '"></td>';								
            $tabla .= '<td align="left">' . $codigos->nombre.'</td>';
            $tabla .= '<td align="left">' . $codigos->cod_impresora.'</td>';
            $tabla .= '<td align="left">' . $codigos->observacion.'</td>';
            $tabla .= '<td align="center" width="10"><img src="../Galeria/modificar.gif"  style="cursor:pointer" onclick="xajax_frm_mod_impresora('.$codigos->codigo.');"/></td>';
            $tabla .= '<td align="center" width="10"><img src="../Galeria/eliminar.gif" style="cursor:pointer" onclick="if(confirm(\'Seguro desea eliminar' . $codigos->nombre . '\')) xajax_del_impresora('.$codigos->codigo.'); "/></td>';
            $tabla .= '</tr>';
            $color = !$color;
        }
        $tabla .= '<tr><td align="center" colspan="4" id="paginacion"></td></tr></table>';
    }
    else
        $tabla = 'No se encontraron registros!!!';
    
    $r->addAssign('div_resultado_busqueda', 'innerHTML',  $tabla);
    $r->addScript("xajax_pagina($n, $pagina, 'n_pagina');");

    return $r;	
}

function frm_crear_impresora()
{
    $r	= new xajaxResponse();
    
    $r->addScript('document.getElementById("frmImpresora").reset();');
    $r->addScript('mostrarW("dvFrmImpresora");');
    $r->addScript('foco("txtNomImpresora");');
    
    $r->addAssign('dvTituloFrmImpresora', 'innerHTML', '<b>NUEVA IMPRESORA</b>');   
    $r->addAssign('btnGuardarImpresora', 'value', 'Guardar');
    $r->addEvent('btnGuardarImpresora', 'onclick', 'if(valida_frm_crear_impresora()){xajax_crea_impresora(xajax.getFormValues("frmImpresora"));}');
    
    return $r;		
}

function frm_mod_impresora($id_impresora)
{
    $r	= new xajaxResponse();
   
    $obj_impresora = new impresora($id_impresora);
    $r->addScript('document.getElementById("frmImpresora").reset();');
     $r->addScript('mostrarW("dvFrmImpresora");');
    $r->addScript('foco("txtNomImpresora");');
    $r->addAssign('dvTituloFrmImpresora', 'innerHTML', '<b>MODIFICAR LA IMPRESORA: '.$obj_impresora->nombre.'</b>');   
    $r->addAssign('btnGuardarImpresora', 'value', 'Modificar');			
    $r->addAssign('txtNomImpresora', 'value', $obj_impresora->nombre);
    $r->addAssign('texObservacionImpresora', 'value', $obj_impresora->observacion);
    $r->addAssign('txtCodImpresora', 'value', $obj_impresora->cod_impresora);
    $r->addEvent('btnGuardarImpresora', 'onclick', 'if(valida_frm_crear_impresora()){xajax_mod_impresora(xajax.getFormValues("frmImpresora"),'.$id_impresora.');}');

    return $r;	
}

function crea_impresora($frm)
{
    $r	= new xajaxResponse();
    if(!isset($_SESSION[SESSION_USUARIO])){$r->addScript("xajax_reloguea();"); return $r;}
        $obj_util = new util();
        $obj_impresora = new impresora();

        $creo = 0;
        $datos=array();

        $nombre = $obj_util->limpia_dato(strtoupper($frm['txtNomImpresora']));

        if($obj_util->existen_registros('tb_impresora',"nombre='{$nombre}' or cod_impresora='{$obj_util->limpia_dato(strtolower($frm['txtCodImpresora']))}'"))
        {
            $r->addAlert('Ya Existe Una Impresora Con Ese Nombre O Codigo!!!');
            return $r;
        }
        if(isset($frm['txtNomImpresora']) AND !empty($frm['txtNomImpresora']))$datos['nombre']=$nombre;
        if(isset($frm['txtCodImpresora']) AND !empty($frm['txtCodImpresora']))$datos['cod_impresora']=$obj_util->limpia_dato(strtolower($frm['txtCodImpresora']));
        if(isset($frm['texObservacionImpresora']) AND !empty($frm['texObservacionImpresora']))$datos['Observacion']=$obj_util->limpia_dato(strtoupper($frm['texObservacionImpresora']));
        $datos['id_usuario_cre'] = $_SESSION[SESSION_USUARIO];
        $creo=$obj_impresora->crear($datos);

        if($creo)
        {
            $r->addScript('ocultarW("dvFrmImpresora");');
            $r->addScript("message('Se ha creado la impresora:$nombre!!!');");
            $r->addScript("n_pagina(pagina);");
        }

    return $r;
}

function mod_impresora($frm, $id_impresora)
{
    $r	= new xajaxResponse();
    if(!isset($_SESSION[SESSION_USUARIO])){$r->addScript("xajax_reloguea();"); return $r;}

        $obj_util = new util();
        $obj_impresora= new impresora($id_impresora);
        $modifico = 0;
        $datos=array();
            $nombre = $obj_util->limpia_dato(strtoupper($frm['txtNomImpresora']));

         if($obj_util->existen_registros('tb_impresora',"nombre='{$nombre}' AND id_impresora<>$id_impresora "))
        {
            $r->addAlert('Ya Existe Una Impresora Con Ese Nombre!!!');
            return $r;
        }
         if($obj_util->existen_registros('tb_impresora',"cod_impresora='{$obj_util->limpia_dato(strtolower($frm['txtCodImpresora']))}' AND id_impresora<>$id_impresora "))
        {
            $r->addAlert('Ya Existe Una Impresora Con Ese Codigo!!!');
            return $r;
        }

        $datos['id_impresora']=$id_impresora;
       if(isset($frm['txtNomImpresora']) AND !empty($frm['txtNomImpresora']))$datos['nombre']=$nombre;
       if(isset($frm['txtCodImpresora']) AND !empty($frm['txtCodImpresora']))$datos['cod_impresora']=$obj_util->limpia_dato(strtolower($frm['txtCodImpresora']));
       if(isset($frm['texObservacionImpresora']) AND !empty($frm['texObservacionImpresora']))$datos['Observacion']=$obj_util->limpia_dato(strtoupper($frm['texObservacionImpresora']));
         $modifico=$obj_impresora->modificar($datos);

        if($modifico)
        {
            $r->addScript('ocultarW("dvFrmImpresora");');
            $r->addScript("message('Se ha Modificado la impresora: $obj_impresora->nombre !!!');");
            $r->addScript("n_pagina(pagina);");
        }
     

    return $r;	
}

function del_impresora($id_impresora)
{
    $r	= new xajaxResponse();
    if(!isset($_SESSION[SESSION_USUARIO])){$r->addScript("xajax_reloguea();"); return $r;}

    $obj_impresora = new impresora($id_impresora);
    $datos=array();
     $datos['id_impresora']=$id_impresora;
    $elimino = $obj_impresora->eliminar($datos);

    if($elimino)
    {
        $r->addScript("message('Se ha eliminado: $obj_impresora->nombre !!!');");
        $r->addScript("n_pagina(pagina);");
    }
    return $r;	
}

function exportar_impresora($frm)
{
    $r	= new xajaxResponse();
    if(!isset($_SESSION[SESSION_USUARIO])){$r->addScript("xajax_reloguea();"); return $r;}
    
    $obj_util = new util();
    $filtro = '';
    
  if(isset($frm['txtNomImpresoraB']) &&  !empty($frm['txtNomImpresoraB']))
        $filtro .= ($filtro ? ' AND ' : ' ')." nombre LIKE '%".strtoupper($obj_util->limpia_dato($frm['txtNomImpresoraB']))."%'";
   
  if(isset($frm['txtCodImpresoraB']) &&  !empty($frm['txtCodImpresoraB']))
        $filtro .= ($filtro ? ' AND ' : ' ')." cod_impresora LIKE '%". strtolower($obj_util->limpia_dato($frm['txtCodImpresoraB']))."%'";
      
  
    $_SESSION['filtro_impresora'] = $filtro;
    
    $r->addScript("redireccionar('{$_SESSION[PANEL_URL]}Administracion_mod/rep_xl.impresora.php');");
    
    return $r;	
}
?>