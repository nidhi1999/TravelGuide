
function approve()
{
     var booking=document.getElementById('bookingId');
     var booking_id=booking.value;
     

     $.ajax({
        
        type:'POST',
        url:'/UpcomingTrips/update',
        data:{bookingId:booking_id,check:1},
        success:function(){
         window.alert("success");
        }
     
   });
}

function cancel()
{
    var booking=document.getElementById('bookingId');
     var booking_id=booking.value;
     $.ajax({
        type:'POST',
        url:'/UpcomingTrips/update',
        data:{bookingId:booking_id,check:1},
        success:function(){
         window.alert("success");
        }
     
   });
}
