<?php 
include('../header.php');
$funciones_ajax[]="reloguea";
$funciones_ajax[]="pagina";
$funciones_ajax[]="valida_logueo";

$funciones_ajax[]="consultar_impresora";
$funciones_ajax[]="frm_crear_impresora";
$funciones_ajax[]="crea_impresora";
$funciones_ajax[]="del_impresora";
$funciones_ajax[]="frm_mod_impresora";
$funciones_ajax[]="mod_impresora";
$funciones_ajax[]="exportar_impresora";

include("../includes/ajax/common.funciones_ajax.php");
$ajax->printJavascript("../includes/ajax/");
    
?>
<h2>IMPRESORA</h2>
<div id="columnB">
    <div id="div_formulario_busqueda">
        <form id="frmBusqueda" name="frmBusqueda" onsubmit="return false;">
            <table class="tabla1" align="center">
                <tr>
                    <td align="right"><b>Nombre:</b></td>
                    <td align="left"><input type="text" name="txtNomImpresoraB" id="txtNomImpresoraB" onkeypress="return ValidarCampo(event,'alfanumericoEsp');" style="width:200px;text-transform: uppercase;" maxlength="49" onkeydown="if(event.keyCode == 13) { n_pagina(1); return false; }" /></td>
                </tr>
                <tr>
                    <td align="right"><b>Codigo:</b></td>
                    <td align="left"><input type="text" name="txtCodImpresoraB" id="txtCodImpresoraB" onkeypress="return ValidarCampo(event,'alfanumericoEsp');" style="width:200px;text-transform: uppercase;" maxlength="10" onkeydown="if(event.keyCode == 13) { n_pagina(1); return false; }" /></td>
                </tr>
                <tr>
                    <td align="right"><input type="submit" id="btnBuscar" name="btnBuscar" value="Buscar" class="boton1" onclick="n_pagina(1); return false" /></td>														
                    <td align="left"><input type="reset" value="Limpiar" class="boton1" /></td>
                    <td align="left"><input type="button" value="Nuevo" class="boton1" onclick="xajax_frm_crear_impresora();" /></td>
                    <td align="left"><input type="button" value="Exportar a Excel" class="boton1" onclick="excel();" id="btn_excel"  /></td>
                </tr>
            </table>
        </form>
    </div>
    <div id="div_resultado_busqueda"></div>
</div>


<!--FORMULARIO PARA CREAR Y MODIFICAR UNA IMPRESORA-->
<div id="dvFrmImpresora" style="display: none;background:#CCE6FF; border: 1px solid #004080; height:auto; width:auto; position:absolute; z-index:8888;left:200px; font-size:9px;">
    <div align="right"><span onclick="ocultarW('dvFrmImpresora');" title="Cerrar" style="cursor:pointer"><font color="#0066CC"><b>X&nbsp;</b></font></span></div>
    <div align="left" id="dvTituloFrmImpresora" style="background:#E8F8FF; border: 1px solid #93C9FF; margin-bottom:4px; margin-left:4px; margin-right:4px; margin-top:4px"></div>
    <div style="background:#E8F8FF; border: 1px solid #93C9FF; margin-bottom:4px; margin-left:4px; margin-right:4px; margin-top:4px" align="left">
        <form id="frmImpresora" name="frmImpresora">
            <table>
                <tr> 
                    <td align="right"><b>Nombre:</b><b Style="color:#f00">*</b></td>
                    <td align="left"><input type="text" style="width:200px;text-transform: uppercase;"  maxlength="49" name="txtNomImpresora" id="txtNomImpresora" /></td>
                </tr>
                <tr> 
                    <td align="right"><b>Codigo:</b><b Style="color:#f00">*</b></td>
                    <td align="left"><input type="text" style="width:200px;text-transform: uppercase;"  maxlength="10" name="txtCodImpresora" id="txtCodImpresora"/></td>
                </tr>
                <tr> 
                    <td align="right"><b>Observacion:</b><b Style="color:#f00">*</b></td>
                    <td align="left"><textarea style="text-transform: uppercase;resize:none; " name="texObservacionImpresora" id="texObservacionImpresora" /></textarea>
                </tr>
                <tr>
                    <td align="right"><input type="button" class="boton1"  id="btnGuardarImpresora"  name="btnGuardarImpresora"/></td>
                    <td align="left"><input type="button" class="boton1" value="Cancelar" onclick="ocultarW('dvFrmImpresora');"/></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<!--FIN-->

<div style="clear: both;">&nbsp;</div>
<script language="javascript">
drag("#dvFrmImpresora");
foco("txtNomImpresora");
var pagina = 1;
function n_pagina(pagina)
{
    xajax_consultar_impresora(xajax.getFormValues('frmBusqueda'), pagina);
}

function excel()
{
    xajax_exportar_impresora(xajax.getFormValues('frmBusqueda'));
}

function valida_frm_crear_impresora()
{
    return validar
    (
        {
            txtNomImpresora:{necesario:true,nombre:"Nombre"},
            txtCodImpresora:{necesario:true,nombre:"Codigo Impresora"},
            texObservacionImpresora:{necesario:true,nombre:"Observacion"}
        }
    );
}

</script>
<?php
include('../footer.php');
?>