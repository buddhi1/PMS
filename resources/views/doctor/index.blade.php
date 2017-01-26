@extends('layouts.app')

@section('content')
<h2 class="container">View Doctor Details</h2>
@if(Session::has('message'))
    <div class="alert alert-danger"> {{ Session::get('message') }} </div>
@endif
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h3 id="myModalLabel">Delete</h3>
                        </div>
                        <div class="modal-body">
                            <p></p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                            <button data-dismiss="modal" class="btn red" id="btnYes">Confirm</button>
                        </div>
   </div>

    <table class="table table-striped table-hover table-users"  border="0">
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
                    {{ Form::submit('Edit', ['class' => 'btn btn-warning']) }}
                {{ Form::close() }}   
            </td>
            <td>
                {{ Form::open(['method' => 'DELETE', 'url' => ['admin/doctor', $doctor->id]]) }}
                    {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                {{ Form::close() }}            
            </td>
        </tr>
        @endforeach
    </table>
    <div> {{$doctors->links()}} </div>

    @stop