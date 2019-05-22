@extends('layouts.Admin')

@section('content')


<div class="box box-info">
    <div class="box-header with-border">
        <h1 class="box-title">{{$customer->name}}</h1>
        <div class="pull-right">
            <a onclick="window.history.back();" type="button" class="btn btn-danger">Back</a>
        </div>
    </div>
    <div class="box-body">
        <table id="BasicData" class="table table-bordered table-striped">
        
            <thead>
                <tr>
                    <th>Total Business</th>
                    <th>Balnce</th>
                    <th>Amount Paid</th>
                    <th>Total Discount</th>
                    <th>Last Pyment Date</th>
                    <th>Last Payment Amount</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>{{ $totalBusiness }}</td>
                    <td>{{ $remainingAmount }}</td>
                    <td>{{ $amountPaid }}</td>
                    <td>{{ $discount }}</td>
                    <td>@if(!empty($customerPayment)){{$customerPayment->created_at}} @else N/A @endif</td>
                    <td>@if(!empty($customerPayment)){{$customerPayment->amount}} @else N/A @endif</td>
                </tr>
            </tbody>
        </table>
    </div>
  <!-- /.box -->
</div>
<div class="box box-info">

    <div class="box-header">
        <h3 class="box-title">Sales</h3>
    </div>
    
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
        
            <thead>
                <tr>
                    <th>Sr#</th>
                    <th>Total Bill</th>
                    <th>Amount Paid</th>
                    <th>Amount Remaining</th>
                    <th>Discount</th>
                    <th>Time</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                  @php $count=1; @endphp
                  @foreach($sales as $sale)
                      <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $sale->totalBill }}</td>
                            <td>{{ $sale->amountPaid }}</td>
                            <td>{{ $sale->amountRemaining }}</td>
                            <td>{{ $sale->discount }}</td>
                            <td>{{ $sale->created_at }}</td>
                            <td>
                                <a href="{{url('/view-sale-detail/'.$sale->id)}}" type="button" class="btn btn-danger">View Detail</a>
                            </td>
                      </tr>
                      @php $count++; @endphp
                  @endforeach
            </tbody>
        </table> 
    </div>
    <!-- /.box-body -->
</div>

<div class="box box-info">

    <div class="box-header">
        <h3 class="box-title">Payment History</h3>
    </div>
    
    <!-- /.box-header -->
    <div class="box-body">
        <table id="paymentHistory" class="table table-bordered table-striped">
        
            <thead>
                <tr>
                    <th>Sr#</th>
                    <th>Amount Paid</th>
                    <th>Date</th>
                    
                </tr>
            </thead>

            <tbody>
                  @php $count=1; @endphp
                  @foreach($paymentHistory as $ph)
                      <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $ph->amount }}</td>
                            <td>{{ $ph->created_at }}</td>
                      </tr>
                      @php $count++; @endphp
                  @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>

<div class="col-md-12">
          {{-- <!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Area Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="areaChart" style="height:250px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box --> --}}
          <!-- Bar chart -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Bar Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div id="bar-chart" style="height: 300px;"></div>
            </div>
            <!-- /.box-body-->
          </div>
</div>

@endsection

@section('pagescript')
    
    <script src="{{ url('js/jquery.flot.js') }}"></script>
    <script src="{{ url('js/jquery.flot.resize.js') }}"></script>
    <script src="{{ url('js/jquery.flot.pie.js') }}"></script>
    <script src="{{ url('js/jquery.flot.categories.js') }}"></script>
    <script type="text/javascript">
        var bar_data = {
          data : [['Monday', {{$weeklySale[0]}}], ['Tuesday', {{$weeklySale[1]}}], ['Wednesday', {{$weeklySale[2]}}], ['Thursday', {{$weeklySale[3]}}], ['Friday', {{$weeklySale[4]}}], ['Saturday', {{$weeklySale[5]}}],['Sunday', {{$weeklySale[6]}}]],
          color: '#3c8dbc'
        }
        $.plot('#bar-chart', [bar_data], {
          grid  : {
            borderWidth: 1,
            borderColor: '#f3f3f3',
            tickColor  : '#f3f3f3'
          },
          series: {
            bars: {
              show    : true,
              barWidth: 0.5,
              align   : 'center'
            }
          },
          xaxis : {
            mode      : 'categories',
            tickLength: 0
          }
        })
        /* END BAR CHART */
    </script>
@stop
