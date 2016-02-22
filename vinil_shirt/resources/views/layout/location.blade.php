@extends('layout.layout')

@section('content')
      <div class="container">
        <div  id="map" data-lat="{{$citys['lat']}}" data-lng="{{$citys['lng']}}" ></div>
        <div class="geo_tittle">
          <h1>Tu tienda mas cercana</h1>
        </div>
        <div class="geo_info">
          <h2>Direccion:</h2>
          <p><span class="glyphicon glyphicon-globe"></span> {{ $citys['address'] }}</p>
        </div>
        <div class="geo_info">
          <h2>Contacto:</h2>
          <p><span class="glyphicon glyphicon-phone-alt"></span> 655 33 66 88</p>
          <p><span class="glyphicon glyphicon-envelope"></span><a href=""> vinil-shirt-{{ $citys['city'] }}@vinil-shirt.com </a></p>
        </div>
        <div class="geo_img"><img src="{{ asset('imagenes/tienda.jpg') }}" alt="vinil tienda"></div>
      </div>
		  
      <script src="{{ asset('js/googlemaps.js') }}"></script>
      <!--key = credenciales google developer console, claves de API -->
      <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9mZ0MhE3N18hHHf0biTusN-uyqNsJXbI&callback=initMap"></script>
@endsection