@extends('layouts.app')

@section('content')
<h3>Add a New Medicine</h3>
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
    <form method="PUT" action="{{ url('admin/medicine') }}/{{ $medicine->id }}" >
    {{ csrf_field() }}
        <div>
            <div>
                <label>Medicine Name</label>
                <input type="text" required="required"  name="name" value="{{ $medicine->name }}"/>
            </div>
            <div>
                <label>Brand Name</label>
                <input type="text" required="required" name="brand_name" value="{{ $medicine->brand_name }}"/>
            </div>
            <div>
                <label>Admin Approval</label>
                @if($medicine->approval == 1)
                    <label>Approved</label><input type="radio" name="" value="Approved"/>
                @else
                    <label>Pending</label><input type="radio" name="" value=""/>
                @endif
            </div>
            <div>
                <label>Prescribed Status</label>
                @if($medicine->prescription == 1)
                    <label>Required</label><input type="radio" name="" value="Approved"/>
                @else
                    <label>Not Required</label><input type="radio" name="" value=""/>
                @endif
            </div>
            <div>
                <label>Description</label>
                <textarea name="description">{{ $medicine->description }}</textarea>
            </div>
            <div>
                <button type="submit">Save</button>
            </div>
    </form>
@stop