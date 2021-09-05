<? require('../Spreadsheet/Excel/Writer.php');
$workbook = new Spreadsheet_Excel_Writer();
$workbook->send('prueba.xls');
$worksheet =& $workbook->addWorksheet('Hoja de calculo');
$worksheet->write(0, 0, 'Nombre');
$worksheet->write(0, 1, 'Edad');
$worksheet->write(1, 0, 'Juan Perez');
$worksheet->write(1, 1, 30);
$worksheet->write(2, 0, 'Eduardo Lopez');
$worksheet->write(2, 1, 31);
$worksheet->write(3, 0, 'Juan Herrera');
$worksheet->write(3, 1, 32);
$workbook->close();
?>
