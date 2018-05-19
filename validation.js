

$(document).ready(function(){
    $("err_name").hide();
    $("err_contact").hide();
function validateName()
{  
     
    name=$("#name").val();
    if(name=="")
    {
        $("err_name").text("name is empty");
        $("err_name").show();
    }
}
function validateContact()
{
   
    var contact=$("#contact").val();
    if(contact=="")
    {
        $("err_contact").text("contact is empty");
        $("err_contact").show();

    }
}
});