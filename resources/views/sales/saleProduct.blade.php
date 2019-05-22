@extends('layouts.Admin')

@section('content')


<div class="box box-info">

    <div class="box-header">
        <h3 class="box-title">Sale#{{$id}}</h3>
        <div class="pull-right">
            <a onclick="window.history.back();" type="button" class="btn btn-danger">Back</a>
        </div>
    </div>
    
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
        
            <thead>
                <tr>
                    <th>Sr#</th>
                    <th>Name</th>
                    <th>Barcode</th>
                    <th>Color</th>
                    <th>Size</th>
                    {{-- <th>Brand Name</th> --}}
                    <th>Model</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>
                </tr>
            </thead>

            <tbody>
                @php $count=1; @endphp
                  @foreach($products as $product)
                      <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->barCode }}</td>
                            <td>{{ $product->color }}</td>
                            <td>{{ $product->size }}</td>
                            {{-- <td>{{ $product->brandName }}</td> --}}
                            <td>{{ $product->model }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->costPrice }}</td>
                            <td>{{ $product->totalPrice }}</td>
                      </tr>
                      @php $count++; @endphp
                  @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>


@endsection