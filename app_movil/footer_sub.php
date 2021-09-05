
</div>
 <!--Preloader-->
<div id="dvLoader"></div> 

<!-- Modal Dialog -->
  <div id="modalAlert" class="modal modal-fixed-footer">
    <div class="modal-content">
        <div id="dvContentAlert"></div>
    </div>
    <div class="modal-footer">
         <div class="col s12 center-align">
           
                <div class="col s6">
                            <input type="button" id="btnActionAlert" class="modal-action modal-close waves-effect waves-light btn left" style="display: none" value="">
                </div>
                <div class="col s6">
                 <input  class="modal-action modal-close waves-effect waves-light btn right" type="button"  id="btnCloseAlert" onclick="$('#modalAlert').modal('close');" value="Aceptar" />
                </div>
        </div>
        
        
    </div>
  </div>
<script  src="../../js/jquery-2.1.1.min.js" type="text/javascript"></script>
<script  src="../../js/materialize.min.js" type="text/javascript"></script>
<script  src="../../js/jquery-ui.min.js" type="text/javascript"></script>
<script  src="https://cdn.rawgit.com/chingyawhao/materialize-clockpicker/master/dist/js/materialize.clockpicker.js" type="text/javascript"></script>
<script  src="../../js/util.js" type="text/javascript"></script>
<script  type="text/javascript"><?=$sjs?></script>
<script>
$('.datepickerSellTicket').pickadate({
firstDay: true,
onClose: function() {
    showLoadingScreen();
xajax_see_hour_operation_today(data,xajax.getFormValues('frmSellTicket')); 
}
});

$('.datepickerChangeTicket').pickadate({
firstDay: true
});

$('.datepickerNoClose').pickadate({
firstDay: true,
onClose: function() {
   hideLoadingScreen();
}
});

$('.datepickerGlobalClose').pickadate({
firstDay: true,
onClose: function() {
    showLoadingScreen();
consultarSaldo()
}
});

</script>
</body>
</html>
