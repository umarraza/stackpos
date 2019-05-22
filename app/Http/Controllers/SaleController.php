<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\Product;
use App\ProductInventory;
use App\Sale;
use App\Customer;
use App\ProductSale;
use App\CustomerPayment;
use App\SaleInvoice;

class SaleController extends Controller
{
    public function showSalesForm()
    {
    	$customers = Customer::where('name','!=','Walk-In')->get();
    	return view('sales.newSale',compact('customers'));
    }



    public function getProductData(Request $request)
    {
    	$response = [
	              'data' => [
	                  'code'      => '400',
	                  'message'   => 'No Product Found',
	              ],
	              'status' => false
	          ];

    	$product =  ProductInventory::where('barCode','=',$request->barCode)->where('quantity','>',0)->first();

    	if(!empty($product))
    	{
	    	$response = [
	              'data' => [
	                  'code'      	=> 200,
	                  'message'   	=> 'Request Successfull',
	                  'barCode'		=> $request->barCode,
	                  'name'   		=> $product->name,
	                  'color'   	=> $product->color,
	                  'size'   		=> $product->size,
	                  'model'   	=> $product->model,
	                  'quantity'   	=> $product->quantity,
	                  'costPrice'   => $product->salePrice,
	              ],
	              'status' => true
	          ];
	    }
    	
    	return $response;
    }

    public function saleView($id)
    {
        $products = ProductSale::where('saleId','=',$id)->get();

        return view('sales.saleProduct',compact('products','id'));
    }

    public function newSaleStore(Request $request)
    {
        //return $request;
        $cus_Id = $request->customerId;   
        
    	
        $newSale = new Sale();
        $newSale->customerId        =   $cus_Id;
        $newSale->totalBill         =  $request->grandTotal;
        $newSale->amountPaid        =  $request->amountPaid - $request->return;
        $newSale->finalAmount       =  $request->famount;

        $remainingAmount = $request->grandTotal - ($request->amountPaid - $request->return);
        $newSale->amountRemaining   = $remainingAmount;
        $newSale->discount   = $request->discount;
        $newSale->returnAmount   = $request->return;
        
        $newSale->save();


        $invoice = new SaleInvoice();
        $invoice->salesId = $newSale->id;
        $invoice->save();

        if($request->amountPaid>0)
        {
            $payment = new CustomerPayment();
            $payment->customerId    = $cus_Id;
            $payment->amount        = $request->amountPaid - $request->return;
            $payment->description   = "Regular Sale";
            $payment->save();
        }

        

        for($i=0 ; $i<count($request->productName) ; $i++)
        {
            $inventory =  ProductInventory::where('model','=',$request->model[$i])->first();


            // if(empty($inventory))
            // {
            //     $newInventory = new ProductInventory();
               
            //     $newInventory->name      = $request->productName[$i];
            //     $newInventory->barCode   = 123;
            //     $newInventory->size      = $request->size[$i];
            //     $newInventory->color     = $request->color[$i];
            //     $newInventory->quantity  = $request->quantity[$i];
            //     $newInventory->model     = $request->model[$i];
            //     $newInventory->costPrice = $request->costPrice[$i];
            //     $newInventory->save();     
            // }
            // else
            {

                $inventory->quantity = $inventory->quantity -  $request->quantity[$i];
                $inventory->save();
            }


            $product = new ProductSale();
            $product->name      = $request->productName[$i];
            $product->barCode   = 123;
            $product->size      = $request->size[$i];
            $product->color     = $request->color[$i];
            $product->quantity  = $request->quantity[$i];
            $product->model     = $request->model[$i];
            $product->costPrice = $request->costPrice[$i];
            $totalBill          = $request->quantity[$i] * $request->costPrice[$i];
            $product->totalPrice = $totalBill;
            $product->saleId = $newSale->id;
            $product->save();    
        }
        
        return redirect('invoice-sale/'.$invoice->id);
    }
}
