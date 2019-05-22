@extends('layouts.Admin')

@section('content')
	<div class="box box-info">
	    <div class="box-header">
	        <h3 class="box-title">All Employes</h3>
	        <div class="pull-right">
	            <a href="{{ url('new-employee') }}" type="button" class="btn btn-primary">Add New</a>
	        </div>
	    </div>  
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">        
            <thead>
            	<tr> 
                   <th>Sr#</th>
                   <th>Name</th>
                   <th>Email</th>
                   <!-- <th>Actions</th>
                   <th>Address</th>
                   <th>Phone Number</th>
                   <th>Age</th> -->

            	</tr>
            </thead>
            <tbody>
                  @php $count=1; @endphp
                  @foreach($employes as $employe)
	        	  <tr>
	                <td>{{ $count }}</td>
	                <td>{{ $employe->name }}</td>
	                <td>{{ $employe->email }}</td>
	            
                  <td>
                      <a href="{{url('/employee-delete/'.$employe->id)}}" type="button" class="btn btn-danger">Delete</a>
                          &nbsp;
                      <a href="{{url('/edit-employee-form/'.$employe->id)}}" type="button" class="btn btn-warning">Edit</a>
                      <a href="" type="button" class="btn btn-info">View Detail</a>
                      <a href="" type="button" class="btn btn-success">New Payment</a>
                  </td>
	           </tr>
                      @php $count++; @endphp
                  @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection