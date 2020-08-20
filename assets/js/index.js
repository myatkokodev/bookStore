$(document).ready(function(){
     //banner owl carousel
     $('#client-word .owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        responsive: {
            0:{
                items: 1
            },
            600:{
                items: 2
            },
            1000:{
                items: 3
            }
        }
    });

    var windowWidth = window.outerWidth;
    //console.log(windowWidth);


        $('.nav-menu').on('click',function(e){

            $('.nav-navbar').slideToggle();
    
        });


    $('.top-seller').hover(function(){
        $('.top-seller-list', this).stop().slideToggle();
    });

    $('.book').hover(function(){
        $('.book-list', this).stop().slideToggle();
    });


    


    // var siteBannerHeight = $('#site-banner').height();
    // var categoryHeight = siteBannerHeight - 500;

    // $('.category-list').css('top',(categoryHeight + 'px'));

});


// .blog-container:hover .blog-date{
//     background: #02335a;
// }