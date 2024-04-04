$('.portfolio-carousel').owlCarousel({
    loop:true,
    margin:10,
    autoplay:true,
    nav:false,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }
})

$('.servicios-carousel').owlCarousel({
    loop:true,
    margin:10,
    autoplay:true,
    smartSpeed: 850,
    autoPlay: 2000,
    nav:false,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})

$(window).scroll(function (event) {
    var scrollTop = $(this).scrollTop();

    $('.main-hero').css({
      opacity: function() {
        var elementHeight = $(this).height();
        return (elementHeight - scrollTop) / elementHeight ;
      }
    });
});