@extends('layouts.app')

@section('content')

@if(Session::has('message'))
    <div class="alert alert-danger"> {{ Session::get('message') }} </div>
@endif
<h3>Patients</h3>
    
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
   <table class="table table-striped table-hover table-users">
                <thead>
                    <tr>
                        <th>NIC No</th>
                        <th>Patient Name</th>
                        <th>Account status</th>
                        <th>Patient Address</th>  
                        <!-- <th>Email</th> -->
                        <th>Telephone No</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($patients as $patient)
                    <tr>
                        
                        <td> {{ $patient->nic }} </td>
                        <td> {{ $patient->name }} </td>
                        <td> 
                            @if($patient->status == 1)
                                <label>Active</label>
                            @else
                                <label>Pending</label>
                            @endif
                        </td>
                        <td> {{ $patient->address }} </td>
                        <td> {{ $patient->phone }} </td>
                        <!-- <td> {{-- $patient->email --}} </td> -->

                        <td>
                            {{ Form::open(['method' => 'GET', 'url' => ['admin/patient', $patient->id, 'edit']]) }}
                                {{ Form::submit('Edit', ['class' => '']) }}
                            {{ Form::close() }}   
                        </td>
                        <td>
                            {{ Form::open(['method' => 'DELETE', 'url' => ['admin/patient', $patient->id]]) }}
                                {{ Form::submit('Delete', ['class' => '']) }}
                            {{ Form::close() }}            
                        </td>
                    </tr>
                    @endforeach                
                   </tbody>
            </table>


    <div> {{$patients->links()}} </div>

    @stop