@extends('layouts.Admin')

@section('content')


<div class="box box-info">

    <div class="box-header">
        <h3 class="box-title">All Customers</h3>
        <div class="pull-right">
            <a href="{{ url('add-customers-form') }}" type="button" class="btn btn-primary">Add New</a>
        </div>
    </div>
    
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
        
            <thead>
                <tr>
                    <th>Sr#</th>
                    <th>Name</th>
{{--                     <th>Shop</th>
                    <th>Phone Number</th> --}}
                    <th>Address</th>
                    <th>Account Number</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                  @php $count=1; @endphp
                  @foreach($customers as $customer)
                      <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->address }}</td>
                            <td>{{ $customer->accountNumber }}</td>
                            <td>
                                @if($customer->id!=0)
                                    <a href="{{url('/customer-delete/'.$customer->id)}}" type="button" class="btn btn-danger">Delete</a>
                                        &nbsp;
                                    <a href="{{url('/edit-customer-form/'.$customer->id)}}" type="button" class="btn btn-warning">Edit</a>
                                @endif
                                <a href="{{url('/view-customer-detail/'.$customer->id)}}" type="button" class="btn btn-info">View Detail</a>
                                <a href="{{url('/add-payments-customer-form/'.$customer->id)}}" type="button" class="btn btn-success">New Payment</a>
                            </td>
                      </tr>
                      @php $count++; @endphp
                  @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>


@endsection