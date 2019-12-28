$(document).ready(function(){
    // Activate Carousel
    $("#myCarousel2").carousel();

    // Enable Carousel Indicators
    $(".item1").click(function(){
        $("#myCarousel2").carousel(0);
    });
    $(".item2").click(function(){
        $("#myCarousel2").carousel(1);
    });
    $(".item3").click(function(){
        $("#myCarousel2").carousel(2);
    });
    $(".item4").click(function(){
        $("#myCarousel2").carousel(3);
    });
    // Enable Carousel Controls
    $(".left").click(function(){
        $("#myCarousel2").carousel("prev");
    });
    $(".right").click(function(){
        $("#myCarousel2").carousel("next");
    });
});