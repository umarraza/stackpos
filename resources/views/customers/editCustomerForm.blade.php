@extends('layouts.Admin')

@section('content')


<div class="box box-info">
    <div class="box-header with-border">
        <h1 class="box-title">Edit Customer</h1>
        <div class="pull-right">
            <a href="{{ url('show-customers') }}" type="button" class="btn btn-danger">Back</a>
        </div>
    </div>

    <form class="form-horizontal" method="post" action="{{url('/customer-update')}}">
        @csrf()
        <div class="box-body">

            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Name:</label>

                <div class="col-sm-8">
                    <input type="text" class="form-control" id="customerName" name="customerName" placeholder="Ali" required="true" value="{{$customer->name}}">
                </div>
            </div>
            
            {{-- <div class="form-group">
                <label for="brandName" class="col-sm-2 control-label">Select Brand:</label>

                <div class="col-sm-8">
                    <select name="brandType" onchange="brandChange(this.value)"  class="form-control">
                            <option value="Existing">Existing</option>
                            <option value="New">New</option>
                    </select>
                </div>
            </div>
            <div class="form-group" id="existing" >
                <label for="brandName" class="col-sm-2 control-label"></label>

                <div class="col-sm-8">
                    <select name="brandExist" id="brandExist" class="form-control">
                        @foreach($brands as $brand)
                            <option value="{{$brand->name}}">{{$brand->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group" id="new" style="display: none">
                <label for="brandName" class="col-sm-2 control-label"></label>

                <div class="col-sm-8">
                    <input type="text" class="form-control" id="brandNew" name="brandNew" placeholder="New Brand Name">
                </div>
            </div> --}}
            {{-- <div class="form-group">
                <label for="brandName" class="col-sm-2 control-label">Brand:</label>

                <div class="col-sm-8">
                    <input type="text" class="form-control" id="brand" name="brand" placeholder="Levis" required="true">
                </div>
            </div> --}}

            {{-- <div class="form-group">
                <label for="cellNumber" class="col-sm-2 control-label">Number:</label>

                <div class="col-sm-8">
                    <input type="tel" class="form-control" id="mobNumber" name="mobNumber" placeholder="000-0000000" required="true">
                </div>
            </div> --}}

            <div class="form-group">
                <label for="customerAddress" class="col-sm-2 control-label">Address:</label>

                <div class="col-sm-8">
                    <input type="text" class="form-control" id="customerAddress" name="customerAddress" placeholder="" required="true" value="{{$customer->address}}">
                </div>
            </div>

            <div class="form-group">
                <label for="accountNumber" class="col-sm-2 control-label">Account Number:</label>

                <div class="col-sm-8">
                    <input type="text" class="form-control" id="accountNumber" name="accountNumber" placeholder="" required="true" value="{{$customer->accountNumber}}">
                </div>
            </div>

            <input type="hidden" class="form-control" id="id" name="id" placeholder="" required="true" value="{{$customer->id}}">
            
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