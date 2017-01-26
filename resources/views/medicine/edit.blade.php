@extends('layouts.app')

@section('content')
<h3>Update Medicine</h3>
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
    {{ Form::open(['method' => 'PUT', 'url' => ['admin/medicine', $medicine->id]]) }}                   
                
    {{ csrf_field() }}
        <div>
            <div class="form-group ">
                <label>Medicine Name :</label>
                <input type="text" required="required"  class="form-control" name="name" value="{{ $medicine->name }}"/>
            </div>
            <div class="form-group ">
                <label>Brand Name :</label>
                <input disabled="disabled" type="text" class="form-control" required="required" name="brand_name" value="{{ $medicine->brand_name }}"/>
            </div>
            <div class="form-group ">
                <label>Admin Approval :</label><br/>
                @if($medicine->approval == 1)
                    <input type="radio" name="approval" checked="checked" value="1" /><label>  Approved</label><br> 
                        
                    <input type="radio" name="approval" value="0" /><label>  Pending</label>
                @else
                     <input type="radio" name="approval" value="1" /><label>Approved</label><br> 
                    <input type="radio" name="approval" checked="checked" value="0" /><label>Pending</label>
                @endif
            </div>
            <div class="form-group ">
                <label>Prescribed Status :</label><br/>
                @if($medicine->prescription == 1)
                    <input type="radio" name="prescribed" value="Approved" checked="checked" value="1"/><label>Required</label><br/>
                    <input type="radio" name="prescribed" value="0"/><label>Not Required</label>
                @else
                    <input type="radio" name="prescribed" value="1" checked="checked" /><label>Required</label><br/>
                    <input type="radio" name="prescribed" value="0"/><label>Not Required</label>                    
                @endif
            </div>
            <div class="form-group ">
                <label>Description :</label>
                <textarea name="description" class="form-control">{{ $medicine->description }}</textarea>
            </div>
            <div>
                <button type="submit">Save</button>
            </div>
    <!-- </form> -->
    {{ Form::close() }}  
@stop