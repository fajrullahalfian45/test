jQuery(function ($) {
    'use strict';


    $(document).ready(function () {

        $('.datepicker').datepicker({
            format: 'mm/dd/yyyy',
            startDate: '-3d'
        });
    });

    $(window).on("scroll", function () {
        if ($(window).scrollTop() > 100) {
            $(".header").addClass("active");
        } else {
            //remove the background property so it comes transparent again (defined in your css)
            $(".header").removeClass("active");
        }
    });

    $( document ).ready(function( $ ) {
		$( '#hotel-detail1' ).sliderPro({
			width: 960,
			height: 500,
			fade: false,
			arrows: true,
			buttons: false,
//			fullScreen: true,
			shuffle: true,
			smallSize: 500,
			mediumSize: 1000,
			largeSize: 3000,
			thumbnailArrows: true,
			autoplay: false
		});
	});

    $(document).ready(function () {
        $('#check-in-date input').datepicker();
        $('#check-out-date input').datepicker();
        $('#event-date input').datepicker();
        $('#date-of-birth input').datepicker();
    });


    $('#introCarousel').carousel({
        interval: 2000
    });

    $(".js-example-basic-single").select2({});


});