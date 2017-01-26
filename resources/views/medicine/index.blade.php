@extends('layouts.app')

@section('content')
<h2 class="container">View Medicine Details</h2>
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
    <table class="table table-striped table-hover table-users" border="2">
        <thead>    
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Brand Name</th>
                <th>Admin Approval</th>
                <th>Prescribe</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        @foreach($medicines as $medicine)
        <tr>
            <td><label> {{ $medicine->id }} </label></td>
            <td><label> {{ $medicine->name }} </label></td>
            <td><label> {{ $medicine->brand_name }} </label></td>
            <td>
                {{ Form::open(['method' => 'GET', 'url' => ['admin/medicine', $medicine->id, 'edit']]) }}
                    @if($medicine->approval == 1)
                        <label>Approved</label>
                    @else
                        <label>Not approved</label>
                    @endif
                {{ Form::close() }}  
            </td>
            <td>
                {{ Form::open(['method' => 'GET', 'url' => ['admin/medicine', $medicine->id, 'edit']]) }}
                
                    @if($medicine->prescribed == 1)
                        <label>Required</label>
                    @else
                        <label>Not required</label>
                    @endif
                {{ Form::close() }}  
            </td>
            <td>
                {{ Form::open(['method' => 'GET', 'url' => ['admin/medicine', $medicine->id, 'edit']]) }}
                    {{ Form::submit('Edit', ['class' => 'btn btn-warning']) }}
                {{ Form::close() }}   
            </td>
            <td>
                {{ Form::open(['method' => 'DELETE', 'url' => ['admin/medicine', $medicine->id]]) }}
                    {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                {{ Form::close() }}            
            </td>
        </tr>
        @endforeach
    </table>
    <div> {{$medicines->links()}} </div>

    @stop