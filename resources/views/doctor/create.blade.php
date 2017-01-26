@extends('layouts.app')

@section('content')
<h3>Add Doctor</h3>
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
    <form method="POST" action="{{ url('admin/doctor') }}" >
    {{ csrf_field() }}
        <div>
            <div class="form-group">
                <label><span style="color: red">* </span> Doctor Name</label>
                <input type="text" class="form-control" required="required"  name="name" />
            </div>
            <div class="form-group">
                <label><span style="color: red">* </span>Register Number (Legal ID)</label>
                <input type="text" class="form-control" required="required" name="reg_no"/>
            </div>
            <div class="form-group">
                <label><span style="color: red">* </span>Address</label>
                <input type="text" class="form-control" required="required" name="address"/>
            </div>
            <div class="form-group">
                <label><span style="color: red">* </span>City</label>
                <input type="text" class="form-control" required="required" name="city"/>
            </div>            
            <div>
                <label>Location</label>
                <div id="map" style="height: 400px;width: 70%;"></div>
                <input type="hidden" name="location" id="location">
            </div>
            <br>
             <div class="form-group">
                <label><span style="color: red">* </span>Specialization</label>
                <input type="text" class="form-control" required="required" name="spec"/>
            </div>
            <div class="form-group">
                <button class="btn btn-default" type="submit">Save</button>
            </div><br><br><br>
    </form>
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
      document.getElementById('location').value = (marker.getPosition().lat()).toFixed(2)+ ',' +(marker.getPosition().lng()).toFixed(2);
      console.log(marker.getPosition().lat());
      console.log(marker.getPosition().lng());
      map.panTo(latLng);
    }
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCPoClfm0bn8XgSRK4a3CCMbD631C-eqY&callback=initMap">
</script> 
@stop
