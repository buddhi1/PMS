@extends('layouts.app')

@section('content')
<h3>Add Medicine</h3>
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
    <form method="POST" action="{{ url('admin/medicine') }}" >
    {{ csrf_field() }}
        <div>
            <div class="form-group">
                <label><span style="color: red">* </span>Medicine Name</label>
                <input type="text" class="form-control" required="required"  name="name" />
            </div>
            <div class="form-group">
                <label><span style="color: red">* </span>Brand Name</label>
                <input type="text" class="form-control" required="required" name="brand_name"/>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="10"></textarea>
            </div>
            <div>
                <button class="btn btn-default" type="submit">Save</button>
                <button type="reset" class="btn btn-default">Reset</button>
            </div>

    </form>
@stop