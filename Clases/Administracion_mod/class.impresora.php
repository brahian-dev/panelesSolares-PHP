<?php
class impresora
{
    public $codigo;
    public $nombre;
    public $observacion;
    public $id_usuario_cre;
    public $fec_cre;
    public $id_usuario_mod;
    public $fec_mod;
    public $cod_impresora;

    public function __construct($id = 0)
    {
        if ($id) $this->consultar($id);
    }

    public function consultar($id = 0)
    {
        if ($id)
        {
            $sql = "SELECT * FROM tb_impresora WHERE id_impresora = $id";
            $conector_bd = new conector_bd();
            $conector_bd->query($sql);
            $consulta = $conector_bd->fetch();
            if(is_object($consulta))
            {
                $this->codigo                           = $consulta->id_impresora;
                $this->nombre                           = $consulta->nombre;
                $this->observacion                      = $consulta->observacion;
                $this->id_usuario_cre                   = $consulta->id_usuario_cre;
                $this->fec_cre                          = $consulta->fec_cre;       
                $this->id_usuario_mod                   = $consulta->id_usuario_mod;
                $this->fec_mod                          = $consulta->fec_mod; 
                $this->cod_impresora                    = $consulta->cod_impresora; 
            }
        }
    }

    function crear($datos, $trc=false)
    {
        $bd = new conector_bd();
           
        $bd->insert('tb_impresora', $datos, $trc);               
                    
        return $bd->commit($trc);
    }
function modificar($datos, $trc=false) 
 {
     $bd= new conector_bd();
     $datos['fec_mod'] = date('Y-m-d H:m:s');
     $arrId['id_impresora'] = $datos['id_impresora'];
     return $bd->update('tb_impresora', $datos, $arrId, $trc);
 } 
 function eliminar($datos, $trc=false) 
 {
      $bd = new conector_bd();
      $arrId['id_impresora'] = $datos['id_impresora'];
      return $bd->delete('tb_impresora', $arrId, $trc);
  }
	
}
?>