@extends('layouts.app')

@section('content')


<h2 class="container">View Pharmacy Details</h2>
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
    					
    					<th>Register No</th>
    					<th>Pharmacy Name</th>
    					<th>Pharmacy Address</th>
    					<th>City</th>
    					<th>Location</th>
    					
    					<th>Minimum Quantity</th>
    					<th>Availability</th>
    					<th>Open Time</th>
    					<th>Close Time</th>
    					<th>Status</th>
    					<th>Edit</th>
    					<th>Delete</th>
    				</tr>
    			</thead>

    			<tbody>
    				@foreach($pharmacies as $pharmacy)
    				<tr>
                        
    					<td><label>{{ $pharmacy->register_number}}</label></td>
    					<td><label>{{ $pharmacy->name}}</label></td>
    					<td><label>{{ $pharmacy->address}}</label></td>
    					<td><label>{{ $pharmacy->city}}</label></td>
    					<td><label>{{ $pharmacy->location}}</label></td>
    					<td><label>{{ $pharmacy->minimum_qty}}</label></td>
                      	<td><label>
                      		@if($pharmacy->availability==1)
                      			Available
                      		@else
                      			Not available
                      		@endif
                      	</label></td>
                      	

    				  	<td><label>{{ $pharmacy->opening_time}}</label></td> 
    					   					
                    	<td><label>{{ $pharmacy->closing_time}}</label></td>
                    	<td><label>
                    		@if($pharmacy->status==1)
                    			Active
                    		@else
                    			Inactive
                    		@endif
                    	</label></td>
                    	  					
    					<td>{{ Form::open(['method' => 'GET', 'url' => ['admin/pharmacy', $pharmacy->id, 'edit']]) }}
                   			 {{ Form::submit('Edit', ['class' => 'btn btn-warning']) }}
              				 {{ Form::close() }}  </td>

                        <td>{{ Form::open(['method' => 'DELETE', 'url' => ['admin/pharmacy', $pharmacy->id]]) }}
                   			{{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                			{{ Form::close() }}  </td>
                    </tr>
					
                	@endforeach
	               </tbody>

    		</table>
    		<div> {{$pharmacies->links()}} </div>


<!--end: View Pharmacy-->
