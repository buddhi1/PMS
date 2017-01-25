@extends('layouts.app')

@section('content')

<h3>Edit Pharmacy details</h3>
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
{{ Form::open(['method' => 'PUT', 'url' => ['admin/pharmacy', $pharmacy->id]]) }}
    {{ csrf_field() }}

    <div class="container">
    
        <div class="form-group">
            <div><label> Register Number : </label></div>
            <div><input type="text" class="form-control" name="register_number" value="{{ $pharmacy->register_number}}" required="required" disabled="disabled"></div>
        </div>
        <div class="form-group">
            <div><label>Pharmacy Name : </label></div>
            <div><input type="text" class="form-control" name="name" value="{{ $pharmacy->name}}" required></div>
        </div>
        <div class="form-group">
            <div><label>Pharmacy Address : </label></div>
            <div><input type="text" class="form-control" name="address" value="{{ $pharmacy->address}}" required></div>
        </div>
        <div class="form-group ">
            <div><div class="req_field"></div><label> City : </label></div>
            <div><input type="text" class="form-control" name="city" value="{{ $pharmacy->city}}" required></div>
        </div>
        <div id="map" style="height: 400px;width: 70%;"></div>
        <input type="hidden" name="location" id="location" value="{{ $pharmacy->location}}">
        <div class="form-group">
        	<div><div class="req_field"></div><label> Availability : </label></div>
        	<div>
        		@if( $pharmacy->availability == 1)
        			<label>Available</label><input type="radio" name="availability" checked="checked" value="1" /><br/>
                    <label>Not available</label><input type="radio" name="availability" value="0" />
        		@else
        			<label>Available</label><input type="radio" name="availability"  value="1" /><br/>
                    <label>Not available</label><input type="radio" name="availability" checked="checked" value="0" />
                @endif
        	</div>
        </div>
        <div class="form-group">
            <div><label>Minimum Quantity: </label></div>
            <div><input type="text" class="form-control" name="minimum_qty" value="{{ $pharmacy->minimum_qty}}" required></div>
        </div>


        <div class="form-group">
            <div><label>Opening Time: </label></div>
            <div>
            <input type="text" class="form-control timepicker" name="opening_time" id="ph_Open" value="{{ $pharmacy->opening_time}}" required></div>

            <div><label>Closing Time: </label></div>
            <div><input type="text" class="form-control" name="closing_time" id="ph_Close" value="{{ $pharmacy->closing_time}}" required></div>
        </div>
        <div class="form-group">
        	<div><div class="req_field"></div><label> Status : </label></div>
        	<div>
        		@if( $pharmacy->status == 1)
        			<label>Active</label><input type="radio" name="status" checked="checked" value="1" /><br/>
                    <label>Inactive</label><input type="radio" name="status" value="0" />
        		@else
        			<label>Active</label><input type="radio" name="status"  value="1" /><br/>
                    <label>Inactive</label><input type="radio" name="status" checked="checked" value="0" />
                @endif
        	</div>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </div>
    {{ Form::close() }}  
@stop
<script type="text/javascript">
    var map;
  var markers = [];

  function initMap() {
    var location  = "{{ $pharmacy->location}}";

    var lt = parseFloat(location.split(",")[0]);
    var lg = parseFloat(location.split(",")[1]);


    var haightAshbury = {lat: 6.91942, lng: 79.86764};
    haightAshbury.lat = lt;
    haightAshbury.lng = lg;

    if( haightAshbury.lat == ' ' || haightAshbury.lng==' ')
        haightAshbury = {lat: 6.91942, lng: 79.86764};

    map = new google.maps.Map(document.getElementById('map'), {
      zoom: 8,
      center: haightAshbury
      //mapTypeId: 'terrain'
    });

    // This event listener will call addMarker() when the map is clicked.
    map.addListener('click', function(event) {
      addMarker(event.latLng);
    });

    // Adds a marker at the center of the map.
    addMarker(haightAshbury);
  }

  // Adds a marker to the map and push to the array.
  function addMarker(location) {
    deleteMarkers()
    var marker = new google.maps.Marker({
      position: location,
      map: map
    });
    markers.push(marker);

    console.log(marker.getPosition().lat().toFixed(5));
    console.log(marker.getPosition().lng().toFixed(5));
    document.getElementById('location').value = (marker.getPosition().lat()).toFixed(5)+ ',' +(marker.getPosition().lng()).toFixed(5);
  }

  // Sets the map on all markers in the array.
  function setMapOnAll(map) {
    for (var i = 0; i < markers.length; i++) {
      markers[i].setMap(map);
    }
  }

  // Removes the markers from the map, but keeps them in the array.
  function clearMarkers() {
    setMapOnAll(null);
  }

  // Shows any markers currently in the array.
  function showMarkers() {
    setMapOnAll(map);
  }

  // Deletes all markers in the array by removing references to them.
  function deleteMarkers() {
    clearMarkers();
    markers = [];
  }      

</script>
 <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCPoClfm0bn8XgSRK4a3CCMbD631C-eqY&callback=initMap">
</script>