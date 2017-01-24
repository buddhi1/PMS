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
        <div class="form-group ">
            <div><div class="req_field"></div><label> Location : </label></div>
            <div><input type="text" class="form-control" name="location" value="{{ $pharmacy->location}}" required></div>
        </div>

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
