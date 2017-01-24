@extends('layouts.app')

@section('content')
<h3>Update Patient</h3>
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
    {{ Form::open(['method' => 'PUT', 'url' => ['admin/patient', $patient->id]]) }}  
    {{ csrf_field() }}
        <div class="form-group">
            <div><div class="req_field">*</div> <label >Patient Name :</label></div>
              <input type="text" class="form-control" name="name" value=" {{ $patient->name }} " placeholder="Input Patient Name" required>
        </div>
        <div class="form-group">
            <div><div class="req_field">*</div> <label >Enter NIC_No :</label></div>
            <input type="text" class="form-control" name="nic" value=" {{ $patient->nic }} " placeholder="Input Patient NIC_No" required>
        </div>
        <div class="form-group">
            <label >Patient Adress :</label>
            <input type="text" class="form-control" name="address" value=" {{ $patient->address }} " placeholder="Input Patient Adress">
        </div>
        <div class="form-group">
            <label >Account Status :</label>
            @if($patient->status == 1)
                <label>Active</label><input type="radio" name="status" checked="checked" value="1" /><br/>
                <label>Pending</label><input type="radio" name="status" value="0" />
            @else
                 <label>Active</label><input type="radio" name="status" value="1" /><br/>
                <label>Pending</label><input type="radio" name="status" checked="checked" value="0" />
            @endif
        </div>
        <div class="form-group">
            <label >City :</label>
            <input type="text" class="form-control" name="city" value=" {{ $patient->city }} " placeholder="Input Patient City">
        </div>
        <div class="form-group">
            <div><div class="req_field">*</div><label>Patient Location :</label></div>
            <input type="text" class="form-control" name="location" value=" {{ $patient->location }} " placeholder="Input Patient Location" required>
        </div>
        <div class="form-group">
            <label>Patient Email Adress :</label>
            <input type="text" class="form-control" name="pa_email" value="" placeholder="Input Patient Email">
        </div>
        <div class="form-group">
            <label>Patient Tel_No :</label>
            <input type="text" class="form-control" name="phone" value=" {{ $patient->phone }} " placeholder="Input Patient Telephone No">
        </div>
       <button type="submit" class="btn btn-default">Update</button>
       <button type="reset" class="btn btn-default">Reset</button>
    </form>
@stop