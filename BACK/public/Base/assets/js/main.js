jQuery(document).ready(function($) {

	'use strict';

        $('.owl-carousel').owlCarousel({
            items:4,
            lazyLoad:true,
            dots:true,
            responsiveClass:true,
                responsive:{
                    0:{
                        items:1,
                    },
                    650:{
                        items:2,
                    },
                    900:{
                        items:3,
                    },
                    1200:{
                        items:4,
                    }
                }
        });


        $(function() {
            $( "#tabs" ).tabs();
        });


        $(function(){
        
            $('#thumbnail li').click(function(){
                var thisIndex = $(this).index()
                    
                if(thisIndex < $('#thumbnail li.active').index()){
                    prevImage(thisIndex, $(this).parents("#thumbnail").prev("#image-slider"));
                }else if(thisIndex > $('#thumbnail li.active').index()){
                    nextImage(thisIndex, $(this).parents("#thumbnail").prev("#image-slider"));
                }
                    
                $('#thumbnail li.active').removeClass('active');
                $(this).addClass('active');

                });
            });

        var width = $('#image-slider').width();

        function nextImage(newIndex, parent){
            parent.find('li').eq(newIndex).addClass('next-img').css('left', width).animate({left: 0},600);
            parent.find('li.active-img').removeClass('active-img').css('left', '0').animate({left: -width},600);
            parent.find('li.next-img').attr('class', 'active-img');
        }
        function prevImage(newIndex, parent){
            parent.find('li').eq(newIndex).addClass('next-img').css('left', -width).animate({left: 0},600);
            parent.find('li.active-img').removeClass('active-img').css('left', '0').animate({left: width},600);
            parent.find('li.next-img').attr('class', 'active-img');
        }

        /* Thumbails */
        var ThumbailsWidth = ($('#image-slider').width() - 18.5)/7;
        $('#thumbnail li').find('img').css('width', ThumbailsWidth);



        $(".seq-preloader").fadeOut(); // will first fade out the loading animation
        $(".sequence").delay(500).fadeOut("slow"); // will fade out the white DIV that covers the website.
            
        
        $(function() {
  
        function showSlide(n) {
            // n is relative position from current slide
          
            // unbind event listener to prevent retriggering
            $body.unbind("mousewheel");
          
            // increment slide number by n and keep within boundaries
            currSlide = Math.min(Math.max(0, currSlide + n), $slide.length-1);
            
            var displacment = window.innerWidth*currSlide;
            // translate slides div across to appropriate slide
            $slides.css('transform', 'translateX(-' + displacment + 'px)');
            // delay before rebinding event to prevent retriggering
            setTimeout(bind, 700);
            
            // change active class on link
            $('nav a.active').removeClass('active');
            $($('a')[currSlide]).addClass('active');
            
        }
      
        function bind() {
             $body.bind('false', mouseEvent);
          }
      
        function mouseEvent(e, delta) {
            // On down scroll, show next slide otherwise show prev slide
            showSlide(delta >= 0 ? -1 : 1);
            e.preventDefault();
        }
        
        $('nav a, .main-btn a').click(function(e) {
            // When link clicked, find slide it points to
            var newslide = parseInt($(this).attr('href')[1]);
            // find how far it is from current slide
            var diff = newslide - currSlide - 1;
            showSlide(diff); // show that slide
            e.preventDefault();
        });
      
        $(window).resize(function(){
          // Keep current slide to left of window on resize
          var displacment = window.innerWidth*currSlide;
          $slides.css('transform', 'translateX(-'+displacment+'px)');
        });
        
        // cache
        var $body = $('body');
        var currSlide = 0;
        var $slides = $('.slides');
        var $slide = $('.slide');
      
        // give active class to first link
        $($('nav a')[0]).addClass('active');
        
        // add event listener for mousescroll
        $body.bind('false', mouseEvent);
    })        


        $(window).on("scroll", function() {
            if($(window).scrollTop() > 100) {
                $(".header").addClass("active");
            } else {
                //remove the background property so it comes transparent again (defined in your css)
               $(".header").removeClass("active");
            }
        });


});
