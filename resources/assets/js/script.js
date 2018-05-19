
function check()
{


    var startdate_state = true;
    var enddate_state = true;

    $('#book').on('click', function(){ 
     var startdate = $('#start_date').val();
     var guide_id=$('#guide_id').val();
     if (startdate == '')
      {
         startdate_state = false;
         return;
      }
     var enddate = $('#end_date').val();
     if (enddate == '')
      {
         enddate_state = false;
         return;
     }

     $.ajax({
       url: '{{route("/booking/check/")}}',
       type: 'post',
       data: {
           'startdate_check' : 1,
           'startdate' : startdate, 'enddate':enddate, 'guide_id':guide_id,
       },
       success: function(response){
         if (response == 'busy' ) {
             startdate_state = false;
             enddate_state=false;
             $('#start_date').parent().removeClass();
             $('#start_date').parent().addClass("form_error");
             $('#start_date').siblings("span").text('Sorry...already booked');
         }
       }
     });
    	
    	
 	if (startdate_state == false || enddate_state == false) {
	  $('#error_msg').text('Fix the errors in the form first');
	}else{
      // proceed with form submission
      $.ajax({
      	url: '{{route("/booking/store")}}',
      	type: 'post',
      	data: {
      		'save' : 1,
      		'startdate' : startdate,
              'enddate' : enddate,
              'guide_id':guide_id,
      		
      	},
          success: function(response)
          {
      		alert('user saved');
      	
      	  }
      });
    }
   
   
   });

}