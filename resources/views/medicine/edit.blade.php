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
    <!-- <form method="PATCH" action="{{ url('admin/medicine') }}/{{ $medicine->id }}" > -->
    {{ Form::open(['method' => 'PUT', 'url' => ['admin/medicine', $medicine->id]]) }}                   
                
    {{ csrf_field() }}
        <div>
            <div>
                <label>Medicine Name :</label>
                <input type="text" required="required"  name="name" value="{{ $medicine->name }}"/>
            </div>
            <div>
                <label>Brand Name :</label>
                <input disabled="disabled" type="text" required="required" name="brand_name" value="{{ $medicine->brand_name }}"/>
            </div>
            <div>
                <label>Admin Approval :</label><br/>
                @if($medicine->approval == 1)
                    <label>Approved</label><input type="radio" name="approval" checked="checked" value="1" /><br/>
                    <label>Pending</label><input type="radio" name="approval" value="0" />
                @else
                     <label>Approved</label><input type="radio" name="approval" value="1" /><br/>
                    <label>Pending</label><input type="radio" name="approval" checked="checked" value="0" />
                @endif
            </div>
            <div>
                <label>Prescribed Status :</label><br/>
                @if($medicine->prescription == 1)
                    <label>Required</label><input type="radio" name="prescribed" value="Approved" checked="checked" value="1"/><br/>
                    <label>Not Required</label><input type="radio" name="prescribed" value="0"/>
                @else
                    <label>Required</label><input type="radio" name="prescribed" value="1" checked="checked" /><br/>
                    <label>Not Required</label><input type="radio" name="prescribed" value="0"/>                    
                @endif
            </div>
            <div>
                <label>Description :</label>
                <textarea name="description">{{ $medicine->description }}</textarea>
            </div>
            <div>
                <button type="submit">Save</button>
            </div>
    <!-- </form> -->
    {{ Form::close() }}  
@stop