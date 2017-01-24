@extends('layouts.app')

@section('content')
<h3>Add a New Doctor</h3>
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
    <form method="POST" action="{{ url('admin/doctor') }}" >
    {{ csrf_field() }}
        <div>
            <div>
                <label>Doctor Name</label>
                <input type="text" required="required"  name="name" />
            </div>
            <div>
                <label>Registration Number</label>
                <input type="text" required="required" name="reg_no"/>
            </div>
            <div>
                <label>Address</label>
                <input type="text" required="required" name="address"/>
            </div>
            <div>
                <label>City</label>
                <input type="text" required="required" name="city"/>
            </div>            
            <div>
                <label>Location</label>
                <input type="text" required="required" name="location"/>
            </div>
            <div>
                <button type="submit">Save</button>
            </div>
    </form>
@stop