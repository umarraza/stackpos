<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html id="abc">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>POS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{asset('./Admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('./Admin/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('./Admin/bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('./Admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('./Admin/dist/css/./AdminLTE.min.css')}}">
  <!-- ./AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="{{asset('./Admin/dist/css/skins/skin-blue.min.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="">



  <!-- Content Wrapper. Contains page content -->
  <div class="container">
    <!-- Content Header (Page header) -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Invoice
        <small>#{{$invoice->id}}</small>
        <div class="pull-right">
            <button onclick="window.print();return false;" class="btn btn-success"><i class="fa fa-print"></i> Print</button>
            
            <a href="{{url('/new-purchase-form')}}" class="btn btn-danger"> Back</a>
        </div>

      </h1>

      {{-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Invoice</li>
      </ol> --}}
    </section>

    {{-- <div class="pad margin no-print">
      <div class="callout callout-info" style="margin-bottom: 0!important;">
        <h4><i class="fa fa-info"></i> Note:</h4>
        This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
      </div>
    </div> --}}

    <!-- Main content -->
    <section  id="invoiceToPrint" class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i>POS
            <small class="pull-right">{{date('d/m/Y')}}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong>POS</strong><br>
            Shalmi Markete<br>
            Main Road<br>
            Phone: 0423-1234567<br>
            Email: example@gmail.com
          </address>
        </div>
        <!-- /.col -->
        {{-- <div class="col-sm-4 invoice-col">
          To
          <address>
            <strong>John Doe</strong><br>
            795 Folsom Ave, Suite 600<br>
            San Francisco, CA 94107<br>
            Phone: (555) 539-1037<br>
            Email: john.doe@example.com
          </address>
        </div> --}}
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Invoice #{{$invoice->id}}</b><br>
          <b>Order ID:</b> {{$purchase->id}}<br>
          {{-- <b>Payment Due:</b> 2/22/2014<br>
          <b>Account:</b> 968-34567 --}}
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Qty</th>
              <th>Name</th>
              <th>Serial #</th>
              
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->id}}</td>
                        <td>{{$product->costPrice}}</td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          {{-- <p class="lead">Payment Methods:</p>
          <img src="../../dist/img/credit/visa.png" alt="Visa">
          <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="../../dist/img/credit/american-express.png" alt="American Express">
          <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
            dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
          </p> --}}
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          {{-- <p class="lead">Amount Due 2/22/2014</p> --}}

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td>Rs. {{$purchase->finalAmount}}</td>
              </tr>
              <tr>
                <th>Discount:</th>
                <td>Rs. {{$purchase->discount}}</td>
              </tr>
              <tr>
                <th>Grand Total:</th>
                <td>Rs. {{$purchase->totalBill}}</td>
              </tr>
              <tr>
                <th>Amount Paid:</th>
                <td>Rs. {{$purchase->amountPaid}}</td>
              </tr>
              <tr>
                <th>Balance:</th>
                <td>Rs. {{$purchase->amountRemaining}}</td>
              </tr>
              <tr>
                <th>Return:</th>
                <td>Rs. {{$purchase->returnAmount}}</td>
              </tr>

            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          
          {{-- <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button> --}}
        </div>
      </div>
    </section>
    <!-- /.content -->
    <!-- /.content -->
  </div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->

<script src="{{asset('./Admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('./Admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- ./AdminLTE App -->
<script src="{{asset('./Admin/dist/js/adminlte.min.js')}}"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
     <!-- DataTables -->
<script src="{{ asset('./Admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('./Admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('./Admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('./Admin/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- page script -->
<script src="{{ url('js/JsBarcode.all.min.js') }}"></script>
<script>
    function printInvoice(data)
    {
        //alert(data);
        var mywindow = window.open('', 'new div', 'height=768,width=1366');
        mywindow.document.write('<html>');
        // mywindow.document.write('<link rel="stylesheet" href="/css/barcode.css" type="text/css" />');
        //mywindow.document.write("<style>@page  { size: 3.51in 1.25in; margin:.0in .0in; } @media print { *{ color: ##000# !important } #barcode{ width:'100%'; /*width for whole barcode */ } }</style>");
        mywindow.document.write(data);
        mywindow.document.write('</html>');

        mywindow.print();
        mywindow.close();

        return true;   
    }

</script>
</body>
</html>