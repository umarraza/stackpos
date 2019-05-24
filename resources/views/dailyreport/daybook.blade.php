@extends('layouts.Admin')

@section('content')

    <section class="content">
        <div class="row">

        {{-- ================= Total Sales Box ================= --}}

            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{ $salesTotal }}<sup style="font-size: 20px"></sup></h3>
                        @if (isset($now))
                        <p>Todays Sales</p>
                        @else
                        <p>Sales for the date &nbsp; <span class="label label-default">{{$dateMonthYear}}</span></p>
                        @endif
                        <p></p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ url('/total-bussiness') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

        {{-- ================= Total Purchases Box ================= --}}

            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{ $purchsesTotal }}<sup style="font-size: 20px"></sup></h3>
                        @if (isset($now))
                        <p>Todays Purchases</p>
                        @else
                        <p>Purchases for the date &nbsp; <span class="label label-default">{{$dateMonthYear}}</span></p>
                        @endif
                        <p></p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-cart"></i>
                    </div>
                    <a href="{{ url('/total-bussiness') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            
        {{-- ================= Total Expenses Box ================= --}}

            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{ $expensesTotal }}<sup style="font-size: 20px"></sup></h3>
                        @if (isset($now))
                        <p>Todays Expenses</p>
                        @else
                        <p>Expenses for the date &nbsp; <span class="label label-default">{{$dateMonthYear}}</span></p>
                        @endif
                        <p></p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{ url('/total-bussiness') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

        {{-- ================= Total Balance Box ================= --}}

            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h6><b>{{ $totalSalesBalance }}</b><span>&nbsp; Sales Balance</span></h6>
                        <h6><b>{{ $totalPurchaseBalance }}</b><span>&nbsp; Purchase Balance</span></h6>
                        @if (isset($now))
                        <h5><span><b>Todays Balance Figures</b><span></h5>
                        @else
                        <h5><b>Balance for the date</b> &nbsp; <span class="label label-default">{{$dateMonthYear}}</span></h5>
                        @endif
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{ url('/cuurent-day-report') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

        <br>
        <br>

        {{--  ====== Date Picker ======  --}}

        <div class="row">
            <div class="col-md-4">
                <form action="other-day-report" method="POST">
                    {{ csrf_field() }}
                    <div class="box-body mt-5">
                        <div class="form-group">
                            <label>Select Date Wise Records:</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="datepicker" class="form-control pull-right" id="datepicker" autocomplete="off" placeholder="Select Date">
                            </div>
                        </div>
                        <button  type="submit" class="btn btn-bitbucket pull-left"><i class="fas fa-info-circle">&nbsp;&nbsp;</i>Check Statement</button>
                    </div>
                </form>
            </div>
        </div>

        <br>

        {{-- ================= Sales Records ================= --}}

        <div class="row">
            <div class="col-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Sales</h3>
                        <div class="pull-right">
                    </div>
                </div>
                <div class="box-body">
                    <table id="dbookSales" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Customer Name</th>
                                <th>Product Name</th>
                                <th>Amount</th>
                                <th>Balance</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $count=1; @endphp
                            @foreach($dailySales as $sale)
                            <tr>
                                <td><span class="label btn-github">{{ $count }}</span></td>
                                @if($sale->customer_name !== NULL)
                                <td><a style="width: 120px" href="{{url('/view-customer-detail/'.$sale->customerId)}}" type="button" class="btn btn-xs btn-github">{{ $sale->customer_name }}</td>
                                @else
                                <td><a style="width: 120px" href="{{url('#')}}" type="button" class="btn btn-xs btn-github disabled">Walk-In</td>
                                @endif
                                <td>{{ $sale->name }}</td>
                                <td>{{ $sale->totalBill }}</td>
                                <td>{{ $sale->amountRemaining }}</td>
                                @if (isset($now))
                                <td>{{ $now }}</td>
                                @else
                                <td>{{ $dateMonthYear }}</td>
                                @endif
                            </tr>
                            @php $count++; @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- ================= Purchases Records ================= --}}

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Purchases</h3>
                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                            </div>
                        </div>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table id="dbookPurchase" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Sr#</th>
                                    <th>Supplier Name</th>
                                    <th>Product Name</th>
                                    <th>Amount</th>
                                    <th>Balance</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $count=1; @endphp
                                @foreach($dailyPurchases as $purchase)
                                    <tr>
                                        <td><span class="label btn-github">{{ $count }}</span></td>
                                        <td><a style="width: 120px" href="{{url('/view-supplier-detail/'.$purchase->supplierId)}}" type="button" class="btn btn-xs btn-github">{{ $purchase->supplier_name }}</td>
                                        <td>{{ $purchase->name }}</td>
                                        <td>{{ $purchase->totalBill }}</td>
                                        <td>{{ $purchase->amountRemaining }}</td>
                                        @if (isset($now))
                                        <td>{{ $now }}</td>
                                        @else
                                        <td>{{ $dateMonthYear }}</td>
                                        @endif
                                    </tr>
                                @php $count++; @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- ================= Expenses Records ================= --}}

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Expenses</h3>
                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                            </div>
                        </div>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table id="dbookExpenses" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Sr#</th>
                                    <th>Expence Name</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $count=1; @endphp
                                @foreach($dailyExpenses as $expense)
                                    <tr>
                                        <td><span class="label btn-github">{{ $count }}</span></td>
                                        <td>{{ $expense->expenseName }}</td>
                                        <td>{{ $expense->amount }}</td>
                                        @if (isset($now))
                                        <td>{{ $now }}</td>
                                        @else
                                        <td>{{ $dateMonthYear }}</td>
                                        @endif
                                    </tr>
                                @php $count++; @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection