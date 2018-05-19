function removeGuide()
{
     var guide=document.getElementById('guideId');
     var guide_id=guide.value;
     

     $.ajax({
        
        type:'POST',
        url:'/status/updateGuide',
        data:{guideId:guide_id,check:2},
        success:function(){
         window.alert("success");
        }
     
   });
}

function removeTourist()
{
     var id=document.getElementById('touristId');
     var guide_id=id.value;
     

     $.ajax({
        
        type:'POST',
        url:'/status/updateTourist',
        data:{guideId:guide_id,check:2},
        success:function(){
         window.alert("success");
        }
     
   });
}

function approve()
{
     var id=document.getElementById('destinationId');
     var destination_id=id.value;
     

     $.ajax({
        
        type:'POST',
        url:'/status/updatedestination',
        data:{guideId:guide_id,check:1},
        success:function(){
         window.alert("success");
        }
     
   });
}

function disapprove()
{
     var id=document.getElementById('destinationId');
     var destination_id=id.value;
     

     $.ajax({
        
        type:'POST',
        url:'/status/updatedestination',
        data:{destinationId:destination_id,check:2},
        success:function(){
         window.alert("success");
        }
     
   });
}