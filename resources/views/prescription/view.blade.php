@extends('layouts.app')

@section('content')

@if(Session::has('message'))
    <div class="alert alert-danger"> {{ Session::get('message') }} </div>
@endif
<h3>Prescriptions</h3>
    <table class="table table-striped table-hover table-users" border="2">
        <tr>
            <th>Id</th>
            <th>patient Details</th>
            <th>Medication</th>
            <th>Disease</th>
            <th>Date</th>
        </tr>
        @foreach($prescriptions as $prescription)
        <tr>
            <td><label> {{ $prescription->id }} </label></td>
            <td><label> {{ $prescription->name }} [ {{ $prescription->nic }} ] </label></td>
            <td><label> {{ $prescription->medication }} </label></td>
            <td><label> {{ $prescription->comments }} </label></td>             
            <td><label> {{ $prescription->created_at }} </label></td>             
        </tr>
        @endforeach
    </table>
    <div> {{$prescriptions->links()}} </div>

    @stop