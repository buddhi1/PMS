@extends('layouts.app')

@section('content')
<h3>Update Doctor</h3>
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
     {{ Form::open(['method' => 'PUT', 'url' => ['admin/doctor', $doctor->id]]) }}  
    {{ csrf_field() }}
        <div>
            <div>
                <label>Doctor Name</label>
                <input type="text" required="required"  name="name" value=" {{ $doctor->name }} " />
            </div>
            <div>
                <label>Registration Number</label>
                <input type="text" disabled="disabled" required="required" name="reg_no" value=" {{ $doctor->reg_no }} "/>
            </div>
            <div>
                <label>Address</label>
                <input type="text" required="required" name="address" value=" {{ $doctor->address }} "/>
            </div>
            <div>
                <label>City</label> 
                <input type="text" required="required" name="city" value=" {{ $doctor->city }} "/>
            </div>            
            <div>
                <label>Location</label>
                <div id="map" style="height: 400px;width: 70%;"></div>
            </div>
            <div>
                <label>Account Status</label>
                @if($doctor->status == 1)
                    <label>Active</label><input type="radio" name="status" checked="checked" value="1" /><br/>
                    <label>Pending</label><input type="radio" name="status" value="0" />
                @else
                     <label>Active</label><input type="radio" name="status" value="1" /><br/>
                    <label>Pending</label><input type="radio" name="status" checked="checked" value="0" />
                @endif
            </div>
            <div>
                <button type="submit">Update</button>
            </div>
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