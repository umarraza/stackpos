@extends('layouts.Admin')

@section('content')

<section class="content">
    <div class="row">
        <div class="col-lg-4 col-xs-6">
            
            {{-- ================= TOTAL SALES BOX ================= --}}

        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>{{ $salesTotal }}<sup style="font-size: 20px"></sup></h3>
                <p>Total Sales &nbsp; &nbsp; </p>
                <p></p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="{{ url('/total-bussiness') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
            <div class="col-lg-4 col-xs-6">
            
            {{-- ================= TOTAL PURCHASES BOX ================= --}}

            <div class="small-box bg-green">
            <div class="inner">
                <h3>{{ $purchsesTotal }}<sup style="font-size: 20px"></sup></h3>
                <p>Todays Purchases &nbsp; &nbsp; </p>

            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ url('/total-bussiness') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

            {{-- ================= TOTAL EMPLOYES BOX ================= --}}

            <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
            <h3>{{$expensesTotal}}</h3>

            <p>Todays Expenses</p>
            </div>
            <div class="icon">
            <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
        </div>
    </div>

    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title">Sales</h3>
            <div class="pull-right">
        </div>
    </div>
<!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Sr#</th>
                    <th>Date</th>
                    <th>Product Name</th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sale</th>
                    <th>Balance</th>
                </tr>
            </thead>
            <tbody>
                @php $count=1; @endphp
                @foreach($currentDaySales as $sale)
                <tr>
                    <td><span class="label label-primary">{{ $count }}</span></td>
                    <td>{{ $now }}</td>
                    <td>{{ $sale->name }}</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $sale->totalBill }}</td>
                    <td>{{ $sale->amountRemaining }}</td>
                </tr>
                @php $count++; @endphp
                @endforeach
            </tbody>
        </table>
    </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Purchases</h3>
                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                        </div>
                    </div>
                </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Sr#</th>
                            <th>Date</th>
                            <th>Product Name</th>
                            <th>Purchase</th>
                            <th>Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $count=1; @endphp
                        @foreach($currentDayPurchases as $purchase)
                            <tr>
                                <td><span class="label label-primary">{{ $count }}</span></td>
                                <td>{{ $now }}</td>
                                <td>{{ $purchase->name }}</td>
                                <td>{{ $purchase->totalBill }}</td>
                                <td>{{ $purchase->amountRemaining }}</td>
                            </tr>
                        @php $count++; @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
          <!-- /.box -->
    </div>
    </div>

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Expenses</h3>
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Sr#</th>
                        <th>Date</th>
                        <th>Expence Name</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @php $count=1; @endphp
                    @foreach($currentDayExpenses as $expense)
                        <tr>
                            <td><span class="label label-primary">{{ $count }}</span></td>
                            <td>{{ $now }}</td>
                            <td>{{ $expense->expenseName }}</td>
                            <td>{{ $expense->amount }}</td>
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