@extends('layouts.Admin')

@section('content')


<div class="box box-info">
    <div class="box-header with-border">
        <h1 class="box-title">Add Payment</h1>
        <div class="pull-right">
            <a href="{{ url('show-customers') }}" type="button" class="btn btn-danger">Back</a>
        </div>
    </div>

    <form class="form-horizontal" method="post" action="{{url('add-payments-customer')}}">
        @csrf()
        <div class="box-body">

            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Customer Name:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="customerName" readonly="" value="{{$customer->name}}" name="customerName" placeholder="Ali" required="true">
                    <input type="hidden" class="form-control" id="customerId" readonly="" value="{{$customer->id}}" name="customerId" placeholder="Ali" required="true">
                </div>
            </div>

            <div class="form-group">
                <label for="amount" class="col-sm-2 control-label">Amount:</label>

                <div class="col-sm-8">
                    <input type="text" class="form-control" id="amount" name="amount" placeholder="" required="true">
                </div>
            </div>


            <div class="form-group">
                <label for="description" class="col-sm-2 control-label">Description:</label>

                <div class="col-sm-8">
                    <input type="text" class="form-control" id="description" name="description" placeholder="" required="true">
                </div>
            </div>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            {{-- <button type="submit" class="btn btn-default">Cancel</button> --}}
            <button type="submit" class="btn btn-info pull-right">Add Payment</button>
        </div>
        <!-- /.box-footer -->
    </form>
    
  <!-- /.box -->
</div>


@endsection