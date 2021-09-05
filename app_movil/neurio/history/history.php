<?php

if(!isset($_POST['jsonData'])) {
    $arrJson['password']='1234';
    $arrJson['user']='4321';
    $arrJson['idUser']='111';

    $json= json_encode($arrJson);
    $_POST['jsonData']=$json;
}

if(isset($_POST['jsonData'])&&!empty($_POST['jsonData'])){
    $data =  json_decode($_POST['jsonData']);

    ini_set("error_reporting",(E_ERROR | E_WARNING | E_PARSE | E_COMPILE_ERROR | E_NOTICE | E_COMPILE_WARNING | E_RECOVERABLE_ERROR | E_CORE_ERROR | E_ALL));
    ini_set('display_errors','1');
    include('../../header_sub.php');

    $funciones_ajax[]="consult_neurio_history";
?>

<!--Frm Consult-->
<form id="frmConsult" name="frmConsult"  onsubmit="return false;">
    <div class="card-panel">
        <div class="card-content" >
            <div class="row">
                <form class="col s12">
                    <div class="row">
                            <label>Panel:</label>
                            <select class="browser-default" id="optPanelId" name="optPanelId" onchange="loadDataHistory()">
                                <option value="0x0000C47F510354BA">0x0000C47F510354BA</option>
                                <option value="0x0000C47F518CC718">VELONA 3</option>
                                <option value="0x0000C47F510354BA">Anapoima</option>
                            </select>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="text"  id="txtDateStart" name="txtDateStart" readonly value="<?=date('Y-m-d')?>"  type="date" class="datepickerNoClose">
                            <label for="txtDateStart" class="active">Fecha Desde</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="text"  id="txtDateEnd" name="txtDateEnd" readonly value="<?=date('Y-m-d')?>"  type="date" class="datepickerNoClose">
                            <label for="txtDateEnd" class="active">Fecha Hasta</label>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col s12 center">
                        <button class="btn waves-effect waves-light" type="button"  name="btnSearch" id="btnSearch" onclick="loadDataHistory()" >
                            Buscar
                        </button>
                    </div>
                </div>

                <!-- Show result Here -->

                <!-- <div class="row">
                    <div class="col s12 center">
                        <div id="dvConsult"></div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</form>
<div class="card-panel">
    <div class="card-content" >
        <div class="row">
            <div class="col s12 center">
                <div class="chart-container">
                    <canvas id="chart"></canvas>
                    <br><br>
                    <div class="row">
                        <img class="responsive-img" src="../../images/energia.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include("../../../includes/ajax/common.funciones_ajax.php");
    $ajaxsub->printJavascript("../../../includes/ajax/");
?>

<!-- SCRIPTS -->

<script type="text/javascript">
    var ctx = document.getElementById('chart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
                'Poder',
                'Energia',
                'Generacion de Poder',
                'Generacion de Energia',
                'Consumo de Poder',
                'Consumo de Energia'
            ]
        },
        options: {
            responsive: true
        },
    });
</script>

<script type="text/javascript">
    var data = '<?php echo $_POST['jsonData']; ?>';

    function loadDataHistory(){
        showLoadingScreen();
        xajax_consult_neurio_history(data, xajax.getFormValues('frmConsult'));
    }

    function loadLiveDataHistory(jsonData) {
        var objData= JSON.parse(jsonData);

        objData.forEach(data => {
            reloadGraphic(data, myChart);
        });
    }

    function reloadGraphic(data, chart) {

        dataSetConfig = {
            label: data.timestamp,
            data: [
                data.netPower,
                data.netEnergy,
                data.generationPower,
                data.generationEnergy,
                data.consumptionPower,
                data.consumptionEnergy
            ],
            fill: false,
            borderColor: random_rgba(),
            tension: 0.1,
        }

        chart.data.datasets.push(dataSetConfig)
        chart.update();
    }

    function random_rgba() {
        var o = Math.round, r = Math.random, s = 255;
        return 'rgba(' + o(r()*s) + ',' + o(r()*s) + ',' + o(r()*s) + ',' + r().toFixed(1) + ')';
    }

</script>

<?php
include('../../footer_sub.php');
}
?>