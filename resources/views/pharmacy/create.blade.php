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
  

    <form method="POST" action="{{ url('admin/pharmacy') }}" >
    {{ csrf_field() }}
        <div class="form-group">
            <div><label><span style="color: red">* </span> Register Number : </label></div>
            <div><input type="text" class="form-control" name="register_number" placeholder="Enter Pharmacy Registered Number" required></div>
        </div>
        <div class="form-group">
            <div><label><span style="color: red">* </span>Pharmacy Name : </label></div>
            <div><input type="text" class="form-control" name="name" placeholder="Enter Pharmacy Name" required></div>
        </div>
        <div class="form-group">
            <div><label><span style="color: red">* </span>Pharmacy Address : </label></div>
            <div><input type="text" class="form-control" name="address" placeholder="Enter Pharmacy Address" required></div>
        </div>
        <div class="form-group ">
            <div><label><span style="color: red">* </span> City : </label></div>
            <div><input type="text" class="form-control" name="city" placeholder="Enter Pharmacy located city" required></div>
        </div>
        <div id="map" style="height: 400px;width: 70%;"></div>
        <input type="hidden" name="location" id="location">
        <div class="form-group">
            <div><label><span style="color: red">* </span>Minimum Quantity: </label></div>
            <div><input type="text" class="form-control" name="minimum_qty" placeholder="Enter Minimum Quantity of Medicine" required></div>
        </div>
        <div class="form-group">
            <div><label>Opening Time: </label></div>
            <div class="example-container">
                <div>
                    <input type="time" class="form-control" value="" id="basic_example_2" name="open_time" />
                </div>
            </div>

            <div><label>Closing Time: </label></div>
            <div class="example-container">
                <div>
                    <input type="time" class="form-control" value="" id="basic_example_3" name="close_time" />
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </form>
</div>
@stop
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
      document.getElementById('location').value = (marker.getPosition().lat()).toFixed(5)+ ',' +(marker.getPosition().lng()).toFixed(5);
      console.log(marker.getPosition().lat());
      console.log(marker.getPosition().lng());
      map.panTo(latLng);
    }
</script>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCPoClfm0bn8XgSRK4a3CCMbD631C-eqY&callback=initMap">
</script> 
