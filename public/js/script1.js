
function checkdate()
{
 

   

    var startdate_state = true;
    var enddate_state = true;
    //window.alert("hi"); 
     var startdate =document.getElementById("start_date");
     var start_date=startdate.value;
    // window.alert(startdate.value);
     var guideid=document.getElementById("guide_id");
     var guide_id=guideid.value;
     if (startdate.value=="")
      {  //window.alert("hi"); 
         startdate_state = false;
         return false;
      }
     var enddate = document.getElementById("end_date");
     var end_date=enddate.value;
     if (enddate.value =="")
      {
         enddate_state = false;
         return false;
     }

     $.ajax({
       url:'check',
       type: "POST",
       data: { startdate: start_date, enddate: end_date, guide_id: guide_id},
       headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr("{{csrf_token()}}")},

       success: function(response){
        console.log(response);
           alert("hello");
           
        if (response == "busy" ) {
            alert("true");
             startdate_state = false;
             enddate_state=false;
             $('#start_date').parent().removeClass();
             $('#start_date').parent().addClass("form_error");
             $('#start_date').siblings("span").text('Sorry...already booked');
            
         }
         if (startdate_state == false && enddate_state == false) {
            return false;
        }else{
          // proceed with form submission
          return false;
        }
       },
      error: function(jqXHR, exception)
      {
        console.log(jqXHR);
        console.log(exception);
        alert("error");
      } 
     });
    
	
    }
   
   

   

