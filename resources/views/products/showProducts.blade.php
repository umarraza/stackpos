@extends('layouts.Admin')

@section('content')


<div class="box box-info">

    <div class="box-header">
        <h3 class="box-title">All Products</h3>
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
                    {{-- <th>Total Price</th> --}}
                    <th>Actions</th>
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
                            {{-- <td>{{ $product->totalPrice }}</td> --}}
                            <td>
                                {{-- <a href="#{{url('/product-delete/'.$product->id)}}" type="button" class="btn btn-danger" disabled>Delete</a>
                                    &nbsp;
                                <a href="#{{url('/edit-product-form/'.$product->id)}}" type="button" class="btn btn-warning" disabled>Edit</a> --}}
                                <a href="javascript:;" class="btn btn-danger btn-sm btnPrint" onclick="printElem('{{ $product->barCode }}')" type="button" value="print">Print Barcode</a>
                            </td>
                      </tr>
                      @php $count++; @endphp
                  @endforeach
            </tbody>
        </table>
        <div>
            <svg id="barcodeA"></svg>
        </div>
    </div>
    <!-- /.box-body -->
</div>


@endsection