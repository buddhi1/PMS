@extends('layouts.app')

@section('content')

<h3>Create Order</h3>
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
    <h2>Add Pharmacy</h2>

    <form method="POST" action="{{ url('admin/order') }}" >
    {{ csrf_field() }}
        <div class="form-group">
            <div><label> Prescription Id : </label></div>
            <div><input type="text" class="form-control" name="prescription_id" placeholder="Enter Prescription Id" required></div>
        </div>
        <div class="form-group">
            <div><label>Pharmacy Id : </label></div>
            <div><input type="text" class="form-control" name="pha_id" placeholder="Enter Pharmacy Id" required></div>
        </div>
        <div class="form-group">
            <div><label>Process status : </label></div>
            <div>
            	<select name="process_status">
            		<option value="0">0</option>
            		<option value="1">1</option>
            		<option value="2">2</option>
            		<option value="3">3</option>
            		<option value="4">4</option>
            	</select>
            </div>
        </div>
        
        <button type="submit" class="btn btn-default">Submit</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </form>
</div>