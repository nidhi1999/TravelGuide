
var count;
function validateName()
{  
    $("#err_name").hide();  
    var name=document.getElementById("name");
    
    //window.alert(name.value);
    if(name.value=="")
    {   //window.alert("hi");
        document.getElementById("err_name").innerHTML="name field is empty";
        $("#err_name").show();
        return false;
    }
//window.alert((/"^[A-Za-z\\s]+$"/.test(name.val)))
   
}
function validateContact()
{
   
    var contact=document.getElementById("contact");
    $("#err_contact").hide();
    if(contact.value=="")
    {
        $("#err_contact").text("contact is empty");
        $("#err_contact").show();
        return false;

    }
    
}
function validateEmail()
{
    var email=document.getElementById("email");
    $("#err_email").hide();
    if(email.value=="")
    {
        $("#err_email").text("email is empty");
        $("#err_email").show();
        return false;

    }  
   
    
}
function validatePassword()
{   $("#err_password").hide();
    var password=document.getElementById("password");
    if(password.value=="")
    {
        $("#err_password").text("password is empty");
        $("#err_password").show();
        return false;

    }
   
}

function confirmPass()
{
    var confirmPass=document.getElementById("password-confirm");
    var password=document.getElementById("password");
    $("#err_confirm").hide();

    if(confirmPass.value=="")
    {
        $("#err_confirm").text("password confirmation not done");
        $("#err_confirm").show();
        return false;

    }   
    else if(confirmPass.value!=password.value)
    {
    
        $("#err_confirm").text("password confirmation does not match");
        $("#err_confirm").show();
        return false;
    }
    else{
        return true;
    }

}
function validateArea()
{    $("#err_area").hide();
    var area=document.getElementById("area");
    if(area.value=="")
    {
        $("#err_area").text("area is not set");
        $("#err_area").show();
        return false;

    }   
   
}
function validateCity()
{    $("#err_city").hide();
    var city=document.getElementById("city");
    if(city.value=="")
    {
        $("#err_city").text("city is not set");
        $("#err_city").show();
        return false;

    } 
   
}
function validateCountry()
{    $("#err_country").hide();
    var country=document.getElementById("country");
    if(country.value=="")
    {
        $("#err_country").text("country is not set");
        $("#err_country").show();
        return false;

    }   
    
}
function validateForm()
{
    if(validateName()&&validateContact()&&validateEmail()&&validatePassword()&&confirmPass()&&validateArea()&&validateCity()!=true)
    {
        return false;
    }
    else
    {
        return true;
    }
}

