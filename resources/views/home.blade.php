
@extends('layouts.Admin')

@section('content')
    <div class="row justify-content-center">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
             <section class="content-header">
                  <h1>Dashboard
                    <small>Control panel</small>
                  </h1>
                  <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                  </ol>
                </section>
            <section class="content">
              <div class="row">
                    <div class="col-lg-3 col-xs-6">
                      
                      {{-- ================= TOTAL SALES BOX ================= --}}

                      <div class="small-box bg-aqua">
                        <div class="inner">
                          <h3>{{ $sTotalBusiness }}<sup style="font-size: 20px"></sup></h3>
                          <p>Total Sales &nbsp; &nbsp; </p>
                          <p></p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ url('/total-bussiness') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                      <div class="col-lg-3 col-xs-6">
                      
                      {{-- ================= TOTAL PURCHASES BOX ================= --}}

                      <div class="small-box bg-green">
                        <div class="inner">
                          <h3>{{ $totalBusiness }}<sup style="font-size: 20px"></sup></h3>
                          <p>Total Purchases &nbsp; &nbsp; </p>

                        </div>
                        <div class="icon">
                          <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ url('/total-bussiness') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">

                      {{-- ================= TOTAL CUSTOMERS BOX ================= --}}

                      <div class="small-box bg-yellow">
                        <div class="inner">
                          <h3>{{$customers}}</h3>
 
                          <p>Total Customers</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>

                      {{-- ================= TOTAL EMPLOYES BOX ================= --}}

                     <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                      <div class="inner">
                        <h3>{{$employes}}</h3>

                        <p>Total Employes</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                      </div>
                      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
              </div>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
              <!-- AREA CHART -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Expenses Chart</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="chart">
                    <canvas id="lineChart" style="height:250px"></canvas>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Sale and Purchase Chart</h3>
                          <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                         </div>
                    </div>
                    <div class="box-body">
                        <div class="chart"><canvas id="barChart" style="height:230px"></canvas></div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
           <div class="card">
               <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Donut Chart</h3>
                          <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                          </div>
                    </div>
                <div class="box-body"><canvas id="pieChart" style="height:250px"></canvas></div>   
                </div>
           </div>
        </div>
    </div>
@endsection
@section('pagescript')
<script>
/* --=========================== AREA CHART ===============================-- */
  $(function () {
    "use strict";


    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      datasets: [
        {
          label               : 'Electronics',
          fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [{{$yearlyExpenses[0]}}, {{$yearlyExpenses[1]}}, {{$yearlyExpenses[2]}}, {{$yearlyExpenses[3]}}, {{$yearlyExpenses[4]}}, {{$yearlyExpenses[5]}}, {{$yearlyExpenses[6]}}, {{$yearlyExpenses[7]}}, {{$yearlyExpenses[8]}}, {{$yearlyExpenses[9]}}, {{$yearlyExpenses[10]}}, {{$yearlyExpenses[11]}}]
        }
      ]
    }

    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale               : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : false,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - Whether the line is curved between points
      bezierCurve             : true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension      : 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot                : false,
      //Number - Radius of each point dot in pixels
      pointDotRadius          : 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth     : 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius : 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke           : true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth      : 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill             : true,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio     : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive              : true
    }

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas          = $('#lineChart').get(0).getContext('2d')
    var lineChart                = new Chart(lineChartCanvas)
    var lineChartOptions         = areaChartOptions
    lineChartOptions.datasetFill = false
    lineChart.Line(areaChartData, lineChartOptions)





/* --=========================== BAR CHART ===============================-- */

var barChartDataSet = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      datasets: [
        {
          label               : 'Electronics',
          fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [{{$yearlySale[0]}}, {{$yearlySale[1]}}, {{$yearlySale[2]}}, {{$yearlySale[3]}}, {{$yearlySale[4]}}, {{$yearlySale[5]}}, {{$yearlySale[6]}}, {{$yearlySale[7]}}, {{$yearlySale[8]}}, {{$yearlySale[9]}}, {{$yearlySale[10]}}, {{$yearlySale[11]}}]
        },
          {
          label               : 'Electronics',
          fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [{{$yearlyPurchase[0]}}, {{$yearlyPurchase[1]}}, {{$yearlyPurchase[2]}}, {{$yearlyPurchase[3]}}, {{$yearlyPurchase[4]}}, {{$yearlyPurchase[5]}}, {{$yearlyPurchase[6]}}, {{$yearlyPurchase[7]}}, {{$yearlyPurchase[8]}}, {{$yearlyPurchase[9]}}, {{$yearlyPurchase[10]}}, {{$yearlyPurchase[11]}}]
        }
      ]
    }



var barChartCanvas                       = $('#barChart').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = barChartDataSet
    barChartData.datasets[1].fillColor   = '#00a65a'
    barChartData.datasets[1].strokeColor = '#00a65a'
    barChartData.datasets[1].pointColor  = '#00a65a'
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)


/* --=========================== DONUT CHART ===============================-- */

var pieChartCanvas     = $('#pieChart').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = [
      {
        
        value    : [{{$monthlyPurchases}}],
        color    : '#f56954',
        highlight: '#f56954',
        label    : 'Monthly Sales'
      },
      {
        value    : [{{$monthlySales}}],
        color    : '#00a65a',
        highlight: '#00a65a',
        label    : 'Monthly Purchases'
      },
      {
        value    : [{{$monthlyExpenses}}],
        color    : '#f39c12',
        highlight: '#f39c12',
        label    : 'Monthly Expenses'
      }
    ]
    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions)
  });

</script>
@endsection
