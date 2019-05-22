@extends('layouts.Admin')

@section('content')

<section>
<div class="box box-info">
    <div class="box-header with-border">
        <h1 class="box-title">New Sales</h1>
        <button type="button" id="insert-more" class="btn btn-info pull-right">ADD</button>
      {{--  <form id="BarCodeForm" class="form-horizontal" method="post" action="{{url('new-purchase-store')}}"> 
        <input type="text" oninput="BarCodeDetect(this.value)" id="txtCode" class="barcodeinput" name="txtCode">--}}
        {{-- <button type="submit" onclick="BarCodeDetect()">Submit</button> --}}
    {{-- </form> --}}
    </div>



    <div class="box-body">
        <div class="container-fluid">
            <label>Enter BarCode</label>
            <input type="text" id="txtCode" class="barcodeinput"/>
            <input type="button" id="ok" value="OK" onfocus="BarCodeDetect()" class="nextcontrol"/>
            <div style="display: none">
                <button type="hidden" id="getData" value=""></button>
                <h3 id="msg"></h3>
            </div>
        </div>

    <form class="form-horizontal" method="post" action="{{url('/new-sale-store')}}">
        @csrf()
        
        <div class="pull-right">
            <label>Customer:</label>
            <select name="customerId" >
                {{-- @foreach($brands as $brand)
                    <option value="{{$brand->name}}">{{$brand->name}}</option>
                @endforeach --}}
                <option value="0">Walk-In</option>
                @foreach($customers as $customer)
                    <option value="{{$customer->id}}">{{$customer->name}}</option>
                @endforeach
            </select>
        </div>

        <table id="mytable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>
                        Product Name
                    </th>
                    {{-- <th>
                        BarCode
                    </th> --}}
                    <th>
                        Color
                    </th>
                    <th>
                        Size
                    </th>
                    <th>
                        Model
                    </th>
                    {{-- <th>
                        Supplier
                    </th> --}}
                    <th>
                        Quantity
                    </th>
                    <th>
                        Price Per Unit
                    </th>
                    <th>
                        Total Price
                    </th>
                    <th>
                        Action
                    </th>
                    
                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="productName">
                        <input type="text" class="form-control" id="productName" name="productName[]" placeholder="" required="true">
                    </td>
                    {{-- <td>
                        <input type="tel" class="form-control" id="barCode" name="barCode[]" placeholder="" required="true">
                    </td> --}}
                    <td class="productColor">
                        <input type="text" class="form-control" id="color" name="color[]" placeholder="" required="true">
                    </td>
                    <td class="productSize">
                        <input type="number" min="1" class="form-control" id="size" name="size[]" placeholder="" required="true">
                    </td>
                    <td class="productModel">
                        <input type="text" class="form-control" id="model" name="model[]" placeholder="" required="true">
                    </td>
                    {{-- <td>
                        <select name="supplierId[]" class="form-control">
                            @foreach($brands as $brand)
                                <option value="{{$brand->name}}">{{$brand->name}}</option>
                            @endforeach
                            @foreach($suppliers as $supplier)
                                <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                            @endforeach
                        </select>
                    </td> --}}
                    <td class="quantity">
                         <input type="number" max="1" min="1" class="form-control" id="quantity" name="quantity[]" onkeyup="quantityChange(this)" placeholder="" required="true" value="0"/>
                    </td>
                    <td class="cost">
                        <input type="number" min="1" class="form-control" id="costPrice" name="costPrice[]" placeholder="" onkeyup="costChange(this)" required="true" value="0">
                    </td>
                    <td class="total">
                        <input type="text" class="form-control" id="totalPrice[]"  name="totalPrice[]" placeholder="" required="true" value="0">
                    </td>
                    <td class="delete">
                        <a type="button" href="#" onclick="removeRow(this)">Remove</a>
                    </td>
                </tr>
            </tbody>

        </table>
        <div class="pull-right">
            <label>Total:</label>
            <input type="number" min="0" id="famount" name="famount" readonly=""  placeholder=""required="true" value="0" >
        </div>
        <br>
        <br>
        <div class="pull-right">
            <label>Discount:</label>
            <input type="number" min="0" id="discount" name="discount" onkeyup="calculateDiscount()"  placeholder=""required="true" value="0">
        </div>
        <br>
        <br>
        <div class="pull-right">
            <label>Grand Total:</label>
            <input type="number" id="grandTotal" name="grandTotal" readonly="" placeholder="" required="true" value="0" >
        </div>
        
        {{-- <br>
        <br>
        <div class="pull-right">
            <label>Grand Total:</label>
            <input type="number" id="finalTotal" name="finalTotal" onkeyup="calculateDiscount()"  placeholder=""required="true" value="0">
        </div> --}}
        <br>
        <br>
        <div class="pull-right">
            <label>Amount Received:</label>
            <input type="number" id="amountPaid" onkeyup="calculateBR()" name="amountPaid" placeholder="" required="true" value="0">
        </div>
        <br>
        <br>
        <div class="pull-right">
            <label>Balance:</label>
            <input type="number" id="balance" name="balance" placeholder="" readonly="" required="true" value="0" >
        </div>
        <br>
        <br>
        <div class="pull-right">
            <label>Return:</label>
            <input type="number" id="return" name="return"  placeholder="" readonly="" required="true" value="0" >
        </div>
        
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            {{-- <button type="submit" class="btn btn-default">Cancel</button> --}}
            <button type="submit" class="btn btn-info pull-right">Save</button>
        </div>
        <!-- /.box-footer -->
    </form>
    
  <!-- /.box -->
</div>
</section>
@stop
@section('script')
<script>
    $( document ).ready(function() {
        alert("asaasasas");
      
    });
</script>

@stop