<?php

if(!isset($_POST['jsonData']))
{
$arrJson['password']='1234';
$arrJson['user']='4321';
$arrJson['idUser']='111';


$json= json_encode($arrJson);
$_POST['jsonData']=$json;
}
if(isset($_POST['jsonData'])&&!empty($_POST['jsonData']))
{
$data =  json_decode($_POST['jsonData']); 

ini_set("error_reporting",(E_ERROR | E_WARNING | E_PARSE | E_COMPILE_ERROR | E_NOTICE | E_COMPILE_WARNING | E_RECOVERABLE_ERROR | E_CORE_ERROR | E_ALL));
ini_set('display_errors','1');
include('../header.php');

$funciones_ajax[]="home_consult_growatt";

?>

<!--Frm Consult-->
<form id="frmConsult" name="frmConsult"  onsubmit="return false;">
    <div class="card-panel">
        <div class="card-content" >
            <div class="row">
                <div class="col s12">
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="text" value="" id="txtPref" name="txtPref" >
                            <label class="active" for="txtPref" >Prefijo</label>
                        </div>
                        <div class="input-field col s6">
                            <input  id="txtNro" name="txtNro" type="number" step="1" value="0" onkeypress="return ValidarCampo(event,'numero');" length="10" maxlength="10" min="1" max="999999999" class="count"/>
                            <label class="active" for="txtNro">Nro </label>
                        </div>
                    </div>
                </div>

                <div class="input-field col s12" id="dvTxtMotCancel" style="display: none">
                    <i class="material-icons prefix"><img class="responsive-img" src="../images/icon/ic_mode_edit_black.svg"></i>
                    <textarea id="txtMotCancel" name="txtMotCancel" class="materialize-textarea" ></textarea>
                    <label for="txtMotCancel">Razón Anulación</label>
                  </div>
                 <div class="col s6 center-align" >
                     <button class="btn  waves-effect waves-light" type="button"  name="btnSearch" id="btnSearch" onclick="loadDataHome()" >
                         BUSCAR
                    </button>
                </div>
                
                </div>
                  <div class="col s12 center-align">
                        <h5 ><div id="dvConsult"></div></h5>
                </div>
               
            </div>
        </div>
    </div>
</form>
<div class="card-panel">
    <div class="card-content" >
        <div class="row">
            <div class="col s12 center-align">
                <div class="chart-container">
                    <canvas id="chart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

 <?php
include("../../includes/ajax/common.funciones_ajax.php");
$ajax2->printJavascript("../../includes/ajax/");
?>
     <script type="text/javascript">
 
var ctx = document.getElementById('chart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

     
     </script>
 
<script type="text/javascript">
 loadDataHome();
var data = '<?php echo $_POST['jsonData']; ?>';
        function loadDataHome()
        {
           xajax_home_consult_growatt(data); 
        }
 


</script>
<?php
include('../footer.php');
}
?>