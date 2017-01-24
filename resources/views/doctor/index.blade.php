@extends('layouts.app')

@section('content')

@if(Session::has('message'))
    <div class="alert alert-danger"> {{ Session::get('message') }} </div>
@endif
<h3>Doctors</h3>
    <table  border="2">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Brand Name</th>
            <th>Account Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach($doctors as $doctor)
        <tr>
            <td><label> {{ $doctor->id }} </label></td>
            <td><label> {{ $doctor->name }} </label></td>
            <td><label> {{ $doctor->reg_no }} </label></td>
            <td>
                @if($doctor->status == 1)
                    <label>Active</label>
                @else
                    <label>Pending</label>
                @endif
            </td>
            <td>
                {{ Form::open(['method' => 'GET', 'url' => ['admin/doctor', $doctor->id, 'edit']]) }}
                    {{ Form::submit('Edit', ['class' => '']) }}
                {{ Form::close() }}   
            </td>
            <td>
                {{ Form::open(['method' => 'DELETE', 'url' => ['admin/doctor', $doctor->id]]) }}
                    {{ Form::submit('Delete', ['class' => '']) }}
                {{ Form::close() }}            
            </td>
        </tr>
        @endforeach
    </table>
    <div> {{$doctors->links()}} </div>

    @stop