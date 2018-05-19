
$(document).ready(function(){
    // Activate Carousel
    $("#images").carousel({interval: 1500, wrap: true});
    
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
    $(".item5").click(function(){
      $("#images").carousel(4);
  });
  $(".item6").click(function(){
        $("#images").carousel(5);
    });
    // Enable Carousel Controls
    $(".left").click(function(){
        $("#images").carousel("prev");
    });
    $(".right").click(function(){
        $("#images").carousel("next");
    });
});




      