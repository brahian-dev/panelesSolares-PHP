$('#selectPlant').change(function(e) {
    const plant = $(e.target).val()

    plant != '' ? $('.energyConsumibleCollapsible').show() : $('.energyConsumibleCollapsible').hide()
});