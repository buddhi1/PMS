@extends('layouts.app')

@section('content')

@if(Session::has('message'))
    <div class="alert alert-danger"> {{ Session::get('message') }} </div>
@endif
<h3>Prescriptions</h3>
    <table  border="2">
        <tr>
            <th>Id</th>
            <th>patient Details</th>
            <th>Medication</th>
            <th>Comments</th>
            <th>Date</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach($prescriptions as $prescription)
        <tr>
            <td><label> {{ $prescription->id }} </label></td>
            <td><label> {{ $prescription->name }} [ {{ $prescription->nic }} ] </label></td>
            <td><label> {{ $prescription->medication }} </label></td>
            <td><label> {{ $prescription->comments }} </label></td>             
            <td><label> {{ $prescription->created_at }} </label></td>             
            <td>
                {{ Form::open(['method' => 'GET', 'url' => ['admin/doctor', $prescription->id, 'edit']]) }}
                    {{ Form::submit('Edit', ['class' => '']) }}
                {{ Form::close() }}   
            </td>
            <td>
                {{ Form::open(['method' => 'DELETE', 'url' => ['admin/doctor', $prescription->id]]) }}
                    {{ Form::submit('Delete', ['class' => '']) }}
                {{ Form::close() }}            
            </td>
        </tr>
        @endforeach
    </table>
    <div> {{$prescriptions->links()}} </div>

    @stop