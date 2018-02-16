      function initMap() {
      	var latLng ={
      		lat: 10.9948093,
      		lng: -74.7919731
      	};
      	var map = new google.maps.Map(document.getElementById('mapa'), {
          'center': latLng,
          'zoom': 16
        });
        
       var contenido = '<h2>Biomedicina IPS</h2>'+
       					'<p>Visitanos Pronto y asi poder atenderte</P>';
        
        var informacion = new google.maps.InfoWindow({
        	content: contenido
        });

        var marker = new google.maps.Marker({
        	position:latLng,
        	map: map,
        	title: 'Biomedicina IPS'
        });

        marker.addListener('click', function(){
        	informacion.open(map, marker);
        });

      }



$(function(){
  /**Lettering**/
  $('.nombre-sitio').lettering();

  //menu Fijo
  var windowHeight = $(window).height();
  var barraAltura = $('.barra').innerHeight();

  $(window).scroll(function(){
    var scroll=$(window).scrollTop();
    if (scroll > windowHeight) {
        $('.barra').addClass('fixed');
        $('body').css({'margin-top': barraAltura + 'px'});
    }else{
        $('.barra').removeClass('fixed');
         $('body').css({'margin-top': '0px'})
    }
  })

  //Menu Responsivo
  $('.menu-movil').on('click', function(){
      $('.navegacion-ppal').slideToggle();
  })
})



