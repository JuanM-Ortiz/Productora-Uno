$('.portfolio-carousel').owlCarousel({
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

window.addEventListener('scroll', function() {
    var footer = document.getElementById('footer');
    var posicionFooter = footer.getBoundingClientRect().top;
    var alturaPantalla = window.innerHeight;
  
    if(posicionFooter < alturaPantalla) {
      setTimeout(function() {
        footer.style.opacity = 1; // Asegúrate de que el footer inicialmente tenga opacity: 0 en CSS
      }, 200); // Ajusta el tiempo según prefieras
    }
  });
  
  window.addEventListener('scroll', function() {
    var footer = document.getElementById('servicios');
    var posicionFooter = footer.getBoundingClientRect().top;
    var alturaPantalla = window.innerHeight;
  
    if(posicionFooter < alturaPantalla) {
      setTimeout(function() {
        footer.style.opacity = 1; // Asegúrate de que el footer inicialmente tenga opacity: 0 en CSS
      }, 200); // Ajusta el tiempo según prefieras
    }
  });  