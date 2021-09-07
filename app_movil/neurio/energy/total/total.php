
<!-- Author: @brahian-dev -->

<?php
    include('../../../header_real.php');
?>

<div class="energy-consumption">
    <div class="title center">
        <h3>
            <i> Energia Total </i>
            <i class="Small material-icons">lightbulb_outline</i>
            <i class="Small material-icons">settings_power</i>
        </h3>
    </div>

    <div class="subtitle">
        <blockquote>
            Selecciona la Planta
        </blockquote>
    </div>
    <br>
    <div class="selectPlant">
        <div class="input-field col s12">
            <select id="selectPlant">
                <option value="" disabled selected>Selecciona</option>
                <option value="0x0000C47F510354BA">0x0000C47F510354BA</option>
                <option value="0x0000C47F518CC718">VELONA 3</option>
                <option value="0x0000C47F510354BA">Anapoima</option>
            </select>
            <label>Planta</label>
        </div>
    </div>
    <br>
    <ul class="collapsible energyConsumibleCollapsible" style="display: none">
        <li>
            <div class="collapsible-header"><i class="material-icons">filter_drama</i>Consumo</div>
            <div class="collapsible-body">
                <blockquote>
                    Consumo de Energia
                </blockquote>

                <canvas id="chartEnergyConsumption"></canvas>
            </div>
        </li>
        <li>
            <div class="collapsible-header"><i class="material-icons">place</i>Generacion</div>
            <div class="collapsible-body">
                <blockquote>
                    Generacion de Energia
                </blockquote>

                <canvas id="chartEnergyGeneration"></canvas>
            </div>
        </li>
        <li>
            <div class="collapsible-header"><i class="material-icons">whatshot</i>Net</div>
            <div class="collapsible-body">
                <blockquote>
                    Energia Net
                </blockquote>

                <canvas id="chartEnergyNet"></canvas>
            </div>
        </li>
    </ul>
</div>

<!-- SCRIPTS -->

    <!-- Init Chart -->

    <script>

        ( () => {
            var ctxChartConsumption = document.getElementById('chartEnergyConsumption').getContext('2d');

            const dataConsumption = {
                labels: [
                    'Red',
                    'Blue',
                    'Yellow'
                ],
                datasets: [{
                    label: 'My First Dataset',
                    data: [300, 50, 100],
                    backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                    ],
                    hoverOffset: 4
                }]
            };

            var chartConsumption = new Chart(ctxChartConsumption, {
                type: 'pie',
                data: dataConsumption,
                options: {}
            });

            var ctxGenerate = document.getElementById('chartEnergyGeneration').getContext('2d');

            const dataGenerate = {
                labels: [
                    'Red',
                    'Blue',
                    'Yellow'
                ],
                datasets: [{
                    label: 'My First Dataset',
                    data: [300, 50, 100],
                    backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                    ],
                    hoverOffset: 4
                }]
            };

            var chartGenerate = new Chart(ctxGenerate, {
                type: 'pie',
                data: dataGenerate,
                options: {}
            });

            var ctxNet = document.getElementById('chartEnergyNet').getContext('2d');

            const dataNet = {
                labels: [
                    'Red',
                    'Blue',
                    'Yellow'
                ],
                datasets: [{
                    label: 'My First Dataset',
                    data: [300, 50, 100],
                    backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                    ],
                    hoverOffset: 4
                }]
            };

            var chartNet = new Chart(ctxNet, {
                type: 'pie',
                data: dataNet,
                options: {}
            });

        })()
    </script>

<?php
    include('../../../footer_real.php');
?>