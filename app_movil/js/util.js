     
     
  function showLoadingScreen() 
  {
        var html = '<div id="load"></div>';
                   $('#dvLoader').append(html); 
                    hide_div('dvConten');
  }
  
  function hideLoadingScreen() 
  {
        $('#load').remove();
        show_div('dvConten');
  }

function loadUtil()
{

// becuase number inputs don't limit max until submit
$('input[type="number"]').each(function()
{
    $(this).on('keyup',function()
    {
        if ($(this).val() > Number($(this).attr("max"))) 
        {
            val=$(this).val().slice(0, $(this).attr("max").length);
            $(this).val(val);
        }
    });

});
 
$(".sendParcel").keyup(function(){totalSendParcel();});
 
 
$('html,body').on('focus',".count", function()
{
    
      var  id= $(this).attr('id');
      
       if(typeof id !== typeof undefined && id !== false)
       {
          $('input#'+id).characterCounter();
       }
});

 
 
    function dayNow()
    {
        var today = new Date();
        var dd = today.getDate();

        if(dd<10)
        {
        //  dd='0'+dd;
        } 
        return dd;
    }
    
    function monthNow()
    {
        var today = new Date();
      
        var mm = today.getMonth()+1; //January is 0!
        /*if(mm<10)
        {
            mm='0'+mm;
        }*/ 
        
       return mm;
    }
    
    function yearNow()
    {
        var today = new Date();
       

        var yyyy = today.getFullYear();
        return yyyy;
    }
    
    function dateNow()
    {
       
        var today = yearNow()+'-'+monthNow()+'-'+dayNow();
      return today;
    }


$('.modal').modal();
 
/*
  $('.datepicker').pickadate({
     
   firstDay: true,
     min: new Date(yearNow(),monthNow(),dayNow()),
     max: new Date(yearNow(),monthNow(),dayNow()),
     selectMonths: false,
     selectYears: false
  });*/
  
   $('.datepickerEvent').pickadate({
     
    firstDay: true,
     min: -5,
     max: true,
     selectMonths: false,
     selectYears: false,
     onSet: function() {
        setTimeout(this.close, 0);
    }
  });
   $('.datepickerEventG').pickadate({
     
    firstDay: true,
     min: -200,
     max: true,
     selectMonths: false,
     selectYears: false,
     onSet: function() {
        setTimeout(this.close, 0);
    }
  });
  //Time Picker:
$('.timepicker').pickatime({
    default: 'now',
    twelvehour: false, // change to 12 hour AM/PM clock from 24 hour
    donetext: '',
   autoclose: true,
   vibrate: true // vibrate the device when dragging clock hand
});
 
}
loadUtil();