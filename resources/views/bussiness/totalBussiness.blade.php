@extends('layouts.Admin')

@section('content')

{{-- <div class="container-fluid"> --}}
    <h1>
        Total Bussiness
        <div class="pull-right">
            <a onclick="window.history.back();" type="button" class="btn btn-danger">Back</a>
        </div>
    </h1>
{{-- </div> --}}
<br>
<div class="box box-info">
    <div class="box-header with-border">
        <h1 class="box-title">Purchases</h1>
        
    </div>
    <div class="box-body">
        <table id="BasicData" class="table table-bordered table-striped">
        
            <thead>
                <tr>
                    <th>Total Purchase</th>
                    <th>Balnce</th>
                    <th>Amount Paid</th>
                    <th>Discount</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>{{ $totalBusiness }}</td>
                    <td>{{ $remainingAmount }}</td>
                    <td>{{ $amountPaid }}</td>
                    <td>{{ $discount }}</td>
                </tr>
            </tbody>
        </table>
    </div>
  <!-- /.box -->
</div>
<div class="box box-info">
    <div class="box-header with-border">
        <h1 class="box-title">Sales</h1>
        {{-- <div class="pull-right">
            <a onclick="window.history.back();" type="button" class="btn btn-danger">Back</a>
        </div> --}}
    </div>
    <div class="box-body">
        <table id="BasicData" class="table table-bordered table-striped">
        
            <thead>
                <tr>
                    <th>Total Sales</th>
                    <th>Balnce</th>
                    <th>Amount Paid</th>
                    <th>Discount</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>{{ $sTotalBusiness }}</td>
                    <td>{{ $sRemainingAmount }}</td>
                    <td>{{ $sAmountPaid }}</td>
                    <td>{{ $sDiscount }}</td>
                </tr>
            </tbody>
        </table>
    </div>
  <!-- /.box -->
</div>



@endsection