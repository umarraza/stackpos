@extends('layouts.Admin')

@section('content')


<div class="box box-info">
    <div class="box-header with-border">
        <h1 class="box-title">Add New Fixed Expense</h1>
        <div class="pull-right">
            <a href="{{ url('show-fixed-expenses') }}" type="button" class="btn btn-danger">Back</a>
        </div>
    </div> 

    <form class="form-horizontal" method="post" action="{{url('new-fixed-expense-store')}}">
        @csrf()
        <div class="box-body">
            <div class="form-group">
                <label for="expenseName" class="col-sm-2 control-label">Name:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="expenseName" name="expenseName"  required="true">
                </div>
            </div>

            <div class="form-group">
                <label for="description" class="col-sm-2 control-label">Description:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="description" name="description"  required="true">
                </div>
            </div>

            <div class="form-group">
                <label for="amount" class="col-sm-2 control-label">Amount:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="amount" name="amount"  required="true">
                </div>
            </div>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            {{-- <button type="submit" class="btn btn-default">Cancel</button> --}}
            <button type="submit" class="btn btn-info pull-right">ADD</button>
        </div>
        <!-- /.box-footer -->
    </form>
    
  <!-- /.box -->
</div>


@endsection