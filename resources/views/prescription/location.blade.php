@extends('layouts.app')

@section('content')

<h3>Add Pharmacy</h3>
@if(Session::has('message'))
    <div class="alert alert-danger"> {{ Session::get('message') }} </div>
@endif
@if(count($errors) > 0)
    <div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)          
                <li> {{ $error }} </li>         
        @endforeach
    </ul>
</div>
@endif

<div class="container">
<h2>Find the Location</h2>
<form>
    <div class="form-group ">
        <div><label> Alternative Location (if nesessary) : </label></div>
        <div>
            <input type="text" class="form-control" name="p_city" placeholder="Enter city" >
        </div>
    </div>

    <div class="form-group ">
        <div><label> To Find Location (by patient city) : </label></div>
        <div><button type="submit" class="btn btn-default">Find Location</button></div>
    </div>
</form>
<div class="row">
	<div class="col-lg-8">
	<div  id="map" style="height: 400px;width: 100%;"></div>
	</div>
	<div class="col-lg-4">
		<label> Address of Pharmacy : </label>
		<textarea class="form-control" rows="5" id="comment"></textarea>
		<br>
		<button type="submit" class="btn btn-default">Place Order</button> <!--use confirm box -->
		<button type="reset" class="btn btn-default">Reset</button>
	</div>

</div>
@stop
    
   <!-- end: find location -->

<!-- js for add map -->
<script type="text/javascript">
    	function initMap() {
		  var map = new google.maps.Map(document.getElementById('map'), {
		    zoom: 8,
		    center: {lat: 10, lng: 79 }
		  });

		  map.addListener('click', function(e) {
		    placeMarkerAndPanTo(e.latLng, map);
		  });
		}

		function placeMarkerAndPanTo(latLng, map) {

		  var marker = new google.maps.Marker({
		    position: latLng,
		    map: map
		  });
		  console.log(marker.getPosition().lat());
		  console.log(marker.getPosition().lng());
		  map.panTo(latLng);
		}
    
    var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
  var icons = {
    parking: {
      icon: iconBase + 'parking_lot_maps.png'
    },
    library: {
      icon: iconBase + 'library_maps.png'
    },
    info: {
      icon: iconBase + 'info-i_maps.png'
    }
  };

  function addMarker(feature) {
    var marker = new google.maps.Marker({
      position: feature.position,
      icon: icons[feature.type].icon,
      map: map
    });
  }

  var features = [
    {
      position: new google.maps.LatLng(-33.91721, 151.22630),
      type: 'info'
    }
  ];

  for (var i = 0, feature; feature = features[i]; i++) {
    addMarker(feature);
  }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCPoClfm0bn8XgSRK4a3CCMbD631C-eqY&callback=initMap">
    </script>