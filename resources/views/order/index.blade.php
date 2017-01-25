@extends('layouts.app')

@section('content')

<h3>View order details</h3>
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
    					
    					
    					<th>Prescription Id</th>
    					<th>Pharmacy Id</th>
    					
    					<th>Process status</th>
    					<!--th>Delete</th-->
    				</tr>
    			</thead>

    			<tbody>
    				@foreach($orders as $order)
    				<tr>
                        
    					
    					<td><label>{{ $order->prescription_id}}</label></td>
    					<td><label>{{ $order->pha_id}}</label></td>
    					<td><label>{{ $order->process_status}}</label></td>
    					
    					
                    </tr>
					
                	@endforeach
	               </tbody>

    		</table>
    		<div> {{$orders->links()}} </div>
