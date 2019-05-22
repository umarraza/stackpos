@extends('layouts.Admin')

@section('content')


<div class="box box-info">

    <div class="box-header">
        <h3 class="box-title">All Suppliers</h3>
        <div class="pull-right">
            <a href="{{ url('add-suppliers-form') }}" type="button" class="btn btn-primary">Add New</a>
        </div>
    </div>
    
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
        
            <thead>
                <tr>
                    <th>Sr#</th>
                    <th>Name</th>
                    <th>Shop</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Account Number</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                  @php $count=1; @endphp
                  @foreach($suppliers as $supplier)
                      <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $supplier->name }}</td>
                            <td>{{ $supplier->brandName }}</td>
                            <td>{{ $supplier->cellNumber }}</td>
                            <td>{{ $supplier->address }}</td>
                            <td>{{ $supplier->accountNumber }}</td>
                            <td>
                                <a href="{{url('/supplier-delete/'.$supplier->id)}}" type="button" class="btn btn-danger">Delete</a>
                                    &nbsp;
                                <a href="{{url('/edit-supplier-form/'.$supplier->id)}}" type="button" class="btn btn-warning">Edit</a>
                                <a href="{{url('/view-supplier-detail/'.$supplier->id)}}" type="button" class="btn btn-info">View Detail</a>
                                <a href="{{url('/add-payments-supplier-form/'.$supplier->id)}}" type="button" class="btn btn-success">New Payment</a>
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