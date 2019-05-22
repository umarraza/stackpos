@extends('layouts.Admin')

@section('content')


<div class="box box-info">

    <div class="box-header">
        <h3 class="box-title">All Fixed Expenses</h3>
        <div class="pull-right">
            <a href="{{ url('new-fixed-expense-form') }}" type="button" class="btn btn-primary">Add New</a>
        </div>
    </div>
    
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
        
            <thead>
                <tr>
                    <th>Sr#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @php $count=1; @endphp
                @foreach($fixedExpenses as $fixedExpense)
                  <tr>
                        <td>{{ $count }}</td>
                        <td>{{ $fixedExpense->expenseName }}</td>
                        <td>{{ $fixedExpense->description }}</td>
                        <td>{{ $fixedExpense->amount }}</td>
                        <td>{{ $fixedExpense->created_at }}</td>
                        <td>
                            <a href="{{url('/fixed-expense-delete/'.$fixedExpense->id)}}" type="button" class="btn btn-danger">Delete</a>
                                &nbsp;
                            <a href="{{url('/edit-fixed-expense-form/'.$fixedExpense->id)}}" type="button" class="btn btn-warning">Edit</a>
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