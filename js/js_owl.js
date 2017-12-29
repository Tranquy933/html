$(document).ready(function(){
$('.owl-carousel').owlCarousel({
    loop:true,
    margin:3,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        200:{
            items:2
        },
        300:{
            items:3
        }
    }
})
	$( ".owl-prev").html('<i class="fa fa-chevron-left"></i>');
	$( ".owl-next").html('<i class="fa fa-chevron-right"></i>');
})

$(function(){
  $('.bxslider').bxSlider({
    mode: 'fade',
    captions: true,
    slideWidth: 2000
  });
});