<!DOCTYPE html>
<html lang="en">
<head>
  <title>Validacion Logs SILOG</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
      <style>
        .panel-body{
   height:600px;
   overflow:auto;
} 
    </style>
    
 <div class="container">   
<?php

include '../Clases/class.principal.php';
$user = '';
$pass = '';
$obj_util = new util();
if(isset($_POST['username']) AND isset($_POST['password']))
{    
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $pass = $obj_util->limpia_dato($pass);
}

if($user == SIG_USUARIO_ERROR AND $pass == SIG_PASS_ERROR)
{   
    echo '<div class="col-md-12">
               <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">ERRORES SILOG</h3>
                  </div>
                  <div class="panel-body" >
                  <div class="table-responsive"> 
            <table class="table table-hover table-bordered">            
                <thead>
                    <tr class="bg-info">
                        <th>Codigo</th>
                        <th>Fecha</th>
                        <th>Mensaje</th>
                        <th>Sql</th>                                         
                    </tr>
                </thead>
                <tbody>';
    $file = fopen(SIG_DIR.SIG_ARCHIVO_ERROR, "r");
    $datos = file_get_contents(SIG_DIR.SIG_ARCHIVO_ERROR); //Leemos y guardamos en $texto el archivo texto.txt
    if(!empty($datos))
    {
        $datos = explode('|||', $datos);
        foreach($datos as $linea)
        {           
            if(!empty($linea) AND strlen($linea) > 3)
            {
                $linea = explode('&&', $linea);
               
                echo "<tr>
                            <td>{$linea[1]}</td>
                            <td >{$linea[2]}</td>
                            <td>{$linea[3]}</td>
                            <td>{$linea[4]}</td>
                           
                      </tr>";
            }
        }
    }
    fclose($file);
    echo '</tbody>
            </table>
        </div>
              </div>
              </div>
</div>
';
}
else
{
    echo "<script>location.href ='index.php';</script>";
}
?>
</div>
<footer>
            <div class="row">
                <div class="col-lg-12">
                    <p class="text-center">Copyright &copy; SITRANS SAS</p>
                </div>
            </div>
        </footer>
</body>
</html>