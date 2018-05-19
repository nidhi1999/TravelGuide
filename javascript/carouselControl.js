
$(document).ready(function(){
    // Activate Carousel
    $("#images").carousel({interval: 1000, wrap: true});
    
    // Enable Carousel Indicators
    $(".item1").click(function(){
        $("#images").carousel(0);
    });
    $(".item2").click(function(){
        $("#images").carousel(1);
    });
    $(".item3").click(function(){
        $("#images").carousel(2);
    });
    $(".item4").click(function(){
        $("#images").carousel(3);
    });
    
    // Enable Carousel Controls
    $(".left").click(function(){
        $("#images").carousel("prev");
    });
    $(".right").click(function(){
        $("#images").carousel("next");
    });
});