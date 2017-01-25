@extends('layouts.app')

@section('content')


<h2 class="container">View Pharmacy Store Details</h2>
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
    					
    					
    					<th>Medicine Id</th>
    					<th>Quantity</th>
    					
    					<th>Edit</th>
    					<th>Delete</th>
    				</tr>
    			</thead>

    			<tbody>
    				@foreach($pharmacyStores as $pharmacyStore)
    				<tr>
                        
    					
    					<td><label>{{ $pharmacyStore->name}}</label></td>
    					<td><label>{{ $pharmacyStore->qty}}</label></td>
    					
    					<td>{{ Form::open(['method' => 'GET', 'url' => ['pharmacy/store', $pharmacyStore->id, 'edit']]) }}
                   			 {{ Form::submit('Edit', ['class' => 'btn btn-warning']) }}
              				 {{ Form::close() }}  </td>

                        <td>{{ Form::open(['method' => 'DELETE', 'url' => ['pharmacy/store', $pharmacyStore->id]]) }}
                   			{{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                			{{ Form::close() }}  </td>
                    </tr>
					
                	@endforeach
	               </tbody>

    		</table>
    		<div> {{$pharmacyStores->links()}} </div>