<?php
    session_start();
    $fecha = date('Y-m-d');
    require "../includes/php_writeexcel-0.3.0/class.writeexcel_format.inc.php"; 
    require "../includes/php_writeexcel-0.3.0/class.writeexcel_workbook.inc.php"; 
    require "../includes/php_writeexcel-0.3.0/class.writeexcel_worksheet.inc.php";
    include "../Clases/class.principal.php";

    header('Content-type: application/vnd.ms-excel');
    header("Content-Disposition: attachment; filename=reporte_impresora_$fecha.xls");
    header("Pragma: no-cache");
    header("Expires: 0");

    $fname = tempnam("/tmp", "reporte_impresora_{$fecha}.xls");
    $workbook = new writeexcel_workbook($fname);
    $worksheet = $workbook->addworksheet();

    $normal= $workbook->addformat();
    $normal->set_align('center');//alinear
    $normal->set_border('1px solid');
    $normal->set_size(8);//tama�o

    $normal1= $workbook->addformat();
    $normal1->set_align('left');//alinear
    $normal1->set_border('1px solid');
    $normal1->set_size(8);//tama�o
    $normal1->set_text_wrap();

    $dgeneral = $workbook->addformat();
    $dgeneral->set_merge();//Permite expandir
    $dgeneral->set_bold();//negrilla
    $dgeneral->set_size(8);//tama�o
    $dgeneral->set_border('1px solid');//Borde
    $dgeneral->set_align('vcenter');

    $red = $workbook->addformat();
    $red->set_merge();//Permite expandir
    $red->set_bold();//negrilla
    $red->set_size(8);//tama�o
    $red->set_border('1px solid');//Borde
    $red->set_align('vcenter');

    $format1= $workbook->addformat();
    $format1->set_text_wrap();
    $format1->set_size(8);//tama�o
    $format1->set_border('1px solid');
    $format1->set_align('center');
    $format1->set_align('vcenter');

    $fechas= $workbook->addformat(); //Formato de las fechas
    $fechas->set_align('center');
    $fechas->set_size(8);//tama�o
    $fechas->set_border('1px solid');//Borde
    $fechas->set_align('vcenter');

    $number= $workbook->addformat(); //Formato de las fechas
    $number->set_align('center');
    $number->set_size(8);//tama�o
    $number->set_border('1px solid');//Borde
    $number->set_align('vcenter');
    $number->set_num_format();

    $worksheet->set_column('A:A', 10);
    $worksheet->set_column('B:B', 10);
    $worksheet->set_column('C:C', 25);
    $worksheet->set_column('D:D', 25);
    $worksheet->set_column('E:E', 20);

    $heading  = $workbook->addformat(array(
                                            bold    => 1,
                                            color   => '56',
                                            size    => 18,
                                            merge   => 1,
                                            ));

    $headings = array('REPORTE DE IMPRESORA','','','','','');
    $worksheet->write_row('A1', $headings, $heading);

    $usuario = $_SESSION['nom_usuario'].' '.$_SESSION['apellidos_usuario'] ;

    $worksheet->write($i+1,$j,'Fecha: '.$fecha 			,$normal1);
    $worksheet->write($i+2,$j,'Responsable: '.$usuario 		,$normal1);

    $bd = new conector_bd();

    $sql = "
        SELECT 
            IP.nombre,
            IP.observacion,
            IP.cod_impresora
        FROM tb_impresora IP
        ";
    
    $filtro = $_SESSION['filtro_impresora'];
    unset($_SESSION['filtro_impresora']);
    
    if(!empty($filtro))
        $sql .= " WHERE ".$filtro;
    $sql.= " ORDER BY IP.nombre";
   
    $result = $bd->consultar($sql);
		
    $i=5;
    $j=0;

    $worksheet->write($i,0,'NOMBRE',              $dgeneral);
    $worksheet->write($i,1,'OBSERVACION',         $dgeneral);
    $worksheet->write($i,2,'CODIGO',         $dgeneral);
    
    $i=6;
    
    while ($row = pg_fetch_array($result))
    {
        $worksheet->write($i,$j,$row[0],	$normal);
        $worksheet->write($i,$j+1,$row[1],	$normal);
        $worksheet->write($i,$j+2,$row[2],	$normal);

        $i++;
    }
    
    $workbook->close();

   
    $fh=fopen($fname, "rb");
    fpassthru($fh);
    unlink($fname);
?>