@extends('layouts.app')

@section('content')
<h3>Add a New Patient</h3>
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
    <form method="POST" action="{{ url('admin/patient') }}" >
    {{ csrf_field() }}
        <div class="form-group">
            <div><div class="req_field">*</div> <label >Patient Name :</label></div>
              <input type="text" class="form-control" name="name" placeholder="Input Patient Name" required>
        </div>
        <div class="form-group">
            <div><div class="req_field">*</div> <label >Enter NIC_No :</label></div>
            <input type="text" class="form-control" name="nic" placeholder="Input Patient NIC_No" required>
        </div>
        <div class="form-group">
            <label >Patient Adress :</label>
            <input type="text" class="form-control" name="address" placeholder="Input Patient Adress">
        </div>
        <div class="form-group">
            <label >City :</label>
            <input type="text" class="form-control" name="city" placeholder="Input Patient City">
        </div>
        <div class="form-group">
            <div><div class="req_field">*</div><label>Patient Location :</label></div>
            <input type="text" class="form-control" name="location" placeholder="Input Patient Location" required>
        </div>
        <div class="form-group">
            <label>Patient Email Adress :</label>
            <input type="text" class="form-control" name="pa_email" placeholder="Input Patient Email">
        </div>
        <div class="form-group">
            <label>Patient Tel_No :</label>
            <input type="text" class="form-control" name="phone" placeholder="Input Patient Telephone No">
        </div>
       <button type="submit" class="btn btn-default">Submit</button>
       <button type="reset" class="btn btn-default">Reset</button>
    </form>
@stop