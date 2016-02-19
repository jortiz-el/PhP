@extends('layout.layout')

@section('content')
		 <div style="height: 400px; width: 400px;" id="map" data-lat="{{$citys['lat']}}" data-lng="{{$citys['lng']}}" ></div>
    <script type="text/javascript">
    function $(id) {
      return document.getElementById(id);
    }


    var map,
        lat = parseFloat($('map').dataset.lat),
        lng = parseFloat($('map').dataset.lng),
        marker,
        title = "Tienda Vinil-Shirt";
    function initMap() {
      map = new google.maps.Map($('map'), {
        center: {lat: lat , lng: lng },
        zoom: 5 //1:world, 5:landmass/continent, 10:city, 15:streets, 20 buildings
      });
      marker = new google.maps.Marker({
        position: {lat: lat , lng: lng },
        map: map,
        draggable: false,
        animation: google.maps.Animation.DROP,//BOUNCE
        title: title,
        icon:'logogoogle.png'
      });

      //animacion al hacer click en el icon
      marker.addListener('click', toggleBounce);
      function toggleBounce() {
        if (marker.getAnimation() !== null) {
          marker.setAnimation(null);
        } else {
          marker.setAnimation(google.maps.Animation.BOUNCE);
        }
      }

      //ventana de informacion al hacer doble click sobre el icono
      marker.addListener('dblclick', liveWindow);
      var contentstring = '<div class="infowindow">Vinil-Shirt</div><div><img src="fotoinfowindow.png" class="infoimg" /><p>Tu tienda de camisetas y mas productos personalizados.</p><p>Ven y disfruta de los mejores precios y ofertas para clientes.</p></div>';
      var infowindow = new google.maps.InfoWindow({
        content: contentstring
      });
      function liveWindow() {
        infowindow.open(map, marker);
      }
    }

    </script>
    <!--key = credenciales google developer console, claves de API -->
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9mZ0MhE3N18hHHf0biTusN-uyqNsJXbI&callback=initMap">
    </script>
@endsection