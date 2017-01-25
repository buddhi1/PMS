@extends('layouts.app')

@section('content')
<h3>E-Prescription</h3>
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
    <form method="POST" action="{{ url('doctor/prescription') }}" >
    {{ csrf_field() }}
        <div>
            <div>
                <label>Patient NIC</label>
                <select name="patient_id">
                    @foreach($patients as $patient)
                    <option value=" {{ $patient->id }} "> {{ $patient->nic }} </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>Medication</label>
                <input type="text" required="required" name="medication"/>
            </div>
            <div>
                <label>Comments</label>
                <textarea name="comments"></textarea>
            </div>
            <div>
                <button type="submit">Save</button>
            </div>
    </form>
@stop