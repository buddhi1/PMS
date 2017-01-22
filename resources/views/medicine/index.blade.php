@extends('layouts.app')

@section('content')

@if(Session::has('message'))
    <div class="alert alert-danger"> {{ Session::get('message') }} </div>
@endif
<h3>Medicines</h3>
    <table  border="2">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Brand Name</th>
            <th>Admin Approval</th>
            <th>Prescribe</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach($medicines as $medicine)
        <tr>
            <td><label> {{ $medicine->id }} </label></td>
            <td><label> {{ $medicine->name }} </label></td>
            <td><label> {{ $medicine->brand_name }} </label></td>
            <td>
                {{ Form::open(['method' => 'GET', 'url' => ['admin/medicine', $medicine->id, 'edit']]) }}
                    @if($medicine->approval == 1)
                        {{ Form::submit('Approved', ['class' => '']) }}
                    @else
                        {{ Form::submit('Pending', ['class' => '']) }}
                    @endif
                {{ Form::close() }}  
            </td>
            <td>
                {{ Form::open(['method' => 'GET', 'url' => ['admin/medicine', $medicine->id, 'edit']]) }}
                
                    @if($medicine->prescribed == 1)
                        {{ Form::submit('Required', ['class' => '']) }}
                    @else
                        {{ Form::submit('Not Required', ['class' => '']) }}
                    @endif
                {{ Form::close() }}  
            </td>
            <td>
                {{ Form::open(['method' => 'GET', 'url' => ['admin/medicine', $medicine->id, 'edit']]) }}
                    {{ Form::submit('Edit', ['class' => '']) }}
                {{ Form::close() }}   
            </td>
            <td>
                {{ Form::open(['method' => 'DELETE', 'url' => ['admin/medicine', $medicine->id]]) }}
                    {{ Form::submit('Delete', ['class' => '']) }}
                {{ Form::close() }}            
            </td>
        </tr>
        @endforeach
    </table>
    <div> {{$medicines->links()}} </div>

    @stop