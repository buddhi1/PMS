@extends('layouts.app')

@section('content')
<h3>Add a New Medicine</h3>
@if(Session::has('message'))
    <div class="alert alert-danger"> {{ Session::get('message') }} </div>
@endif
    <form method="POST" action="{{ url('admin/medicine') }}" >
    {{ csrf_field() }}
        <div>
            <div>
                <label>Medicine Name</label>
                <input type="text" required="required"  name="name" />
            </div>
            <div>
                <label>Brand Name</label>
                <input type="text" required="required" name="brand_name"/>
            </div>
            <div>
                <label>Description</label>
                <textarea name="description"></textarea>
            </div>
            <div>
                <button type="submit">Save</button>
            </div>
    </form>
@stop