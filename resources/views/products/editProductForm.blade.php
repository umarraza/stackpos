@extends('layouts.Admin')

@section('content')


<div class="box box-info">
    <div class="box-header with-border">
        <h1 class="box-title">Add New Product</h1>
    </div>

    <form class="form-horizontal" method="post" action="{{url('product-update')}}">
        @csrf()
        <div class="box-body">

            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Name:</label>

                <div class="col-sm-8">
                    <input type="text" class="form-control" id="productName" name="productName" placeholder="" required="true" value="{{$product->name}}">
                </div>
            </div>

            {{-- <div class="form-group">
                <label for="brandName" class="col-sm-2 control-label">Brand:</label>

                <div class="col-sm-8">
                    <select name="brand" class="form-control">
                        @foreach($brands as $brand)
                            <option value="{{$brand->name}}">{{$brand->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div> --}}
            {{-- <div class="form-group">
                <label for="brandName" class="col-sm-2 control-label">Brand:</label>

                <div class="col-sm-8">
                    <input type="text" class="form-control" id="brand" name="brand" placeholder="Levis" required="true">
                </div>
            </div> --}}

            <div class="form-group">
                <label for="barcode" class="col-sm-2 control-label">Barcode:</label>

                <div class="col-sm-8">
                    <input type="tel" class="form-control" id="barcode" name="barCode" placeholder="" required="true" value="{{$product->barCode}}">
                </div>
            </div>

            <div class="form-group">
                <label for="supplierAddress" class="col-sm-2 control-label">Color:</label>

                <div class="col-sm-8">
                    <input type="text" class="form-control" id="color" name="color" placeholder="" required="true" value="{{$product->color}}">
                </div>
            </div>

            <div class="form-group">
                <label for="accountNumber" class="col-sm-2 control-label">Size:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="size" name="size" placeholder="" required="true" value="{{$product->size}}">
                </div>
            </div>
            <div class="form-group">
                <label for="accountNumber" class="col-sm-2 control-label">Model:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="model" name="model" placeholder="" required="true" value="{{$product->model}}">
                </div>
            </div>
            <div class="form-group">
                <label for="brandName" class="col-sm-2 control-label">Brand:</label>

                <div class="col-sm-8">
                    <select name="brandName" class="form-control" >
                        @foreach($brands as $brand)
                            @if($brand->name == $product->brandName)
                                <option selected value="{{$brand->name}}">{{$brand->name}}</option>
                            @else
                                <option value="{{$brand->name}}">{{$brand->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="quantity" class="col-sm-2 control-label">Quanitiy:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="quantity" name="quantity" placeholder="" required="true" value="{{$product->quantity}}">
                </div>
            </div>
            
            <div class="form-group">
                <label for="costPrice" class="col-sm-2 control-label">Cost Price:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="costPrice" name="costPrice" placeholder="" required="true" value="{{$product->costPrice}}">
                </div>
            </div>
            <div class="form-group">
                <label for="salePrice" class="col-sm-2 control-label">Sale Price:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="salePrice" name="salePrice" placeholder="" required="true" value="{{$product->salePrice}}">
                </div>
            </div>

            <input type="hidden" class="form-control" id="id" name="id" placeholder="" required="true" value="{{$product->id}}">
{{--             <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                <div class="col-sm-8">
                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-8">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Remember me
                        </label>
                    </div>
                </div>
            </div> --}}

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            {{-- <button type="submit" class="btn btn-default">Cancel</button> --}}
            <button type="submit" class="btn btn-info pull-right">Update</button>
        </div>
        <!-- /.box-footer -->
    </form>
    
  <!-- /.box -->
</div>


@endsection