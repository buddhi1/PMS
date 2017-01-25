
@extends('layouts.app')

@section('content')

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
{{ Form::open(['method' => 'PUT', 'url' => ['pharmacy/store', $pharmacyStore->id]]) }}
    {{ csrf_field() }}
<div class="container">
    <h2>Edit Pharmacy Store</h2>

    <form method="POST" action="{{ url('pharmacy/store') }}" >
    {{ csrf_field() }}
        <div class="form-group">
            <div><label> Pharmacy Id : </label></div>
            <div>
                <input type="text" class="form-control" name="pha_id" placeholder="Enter Medicine id" required>
            </div>
        </div>
        <div class="form-group">
            <div><label>Medicine id : </label></div>
            <div>
                <select name="med_id">
                    @foreach($medicines as $medicine)
                    <option value=" {{ $medicine->id }} "> {{ $medicine->brand_name }}[ {{ $medicine->name }} ] </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <div><label>Quantity : </label></div>
            <div><input type="number" class="form-control" name="qty" required="required" min="0" size="1" /></div>
        </div>
        
        
        <button type="submit" class="btn btn-default">Submit</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </form>
</div>
    