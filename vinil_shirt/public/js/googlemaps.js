
    var map,
        lat = parseFloat(document.getElementById('map').dataset.lat),
        lng = parseFloat(document.getElementById('map').dataset.lng),
        marker,
        title = "Tienda Vinil-Shirt";
    function initMap() {
      map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: lat , lng: lng },
        zoom: 14 //1:world, 5:landmass/continent, 10:city, 15:streets, 20 buildings
      });
      marker = new google.maps.Marker({
        position: {lat: lat , lng: lng },
        map: map,
        draggable: false,
        animation: google.maps.Animation.DROP,//BOUNCE
        title: title,
        icon:'../imagenes/logogoogle.png'
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
      var contentstring = '<div class="infowindow">Vinil-Shirt</div><div><img src="../imagenes/fotoinfowindow.png" class="infoimg" /><p>Tu tienda de camisetas y mas productos personalizados.</p><p>Ven y disfruta de los mejores precios y ofertas para clientes.</p></div>';
      var infowindow = new google.maps.InfoWindow({
        content: contentstring
      });
      function liveWindow() {
        infowindow.open(map, marker);
      }
    }