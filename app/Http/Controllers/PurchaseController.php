<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\Product;
use App\Purchase;
use App\SupplierPayment;
use App\ProductInventory;

use App\Invoice;
class PurchaseController extends Controller
{
    public function showPurchaseForm()
    {
    	$suppliers = Supplier::all();

    	return view('purchase.newPurchase',compact('suppliers'));
    }

    public function purchaseView($id)
    {
    	$products = Product::where('purchaseId','=',$id)->get();

    	return view('purchase.purchaseProduct',compact('products','id'));
    }



    public function newPurchaseStore(Request $request)
    {
        //return $request;
        $newPurchase = new Purchase();
        $newPurchase->supplierId        = $request->supplierId;
        $newPurchase->totalBill         = $request->grandTotal;
        $newPurchase->amountPaid        = $request->amountPaid - $request->return;

        $remainingAmount = $request->grandTotal - ($request->amountPaid - $request->return);
        $newPurchase->amountRemaining   = $remainingAmount;
        $newPurchase->discount   = $request->discount;
        $newPurchase->finalAmount        = $request->famount;
        $newPurchase->returnAmount        = $request->return;
        $newPurchase->save();


        $invoice = new Invoice();
        $invoice->purchaseId = $newPurchase->id;
        $invoice->save();

        if($request->amountPaid>0)
        {
            $payment = new SupplierPayment();
            $payment->supplierId    = $request->supplierId;
            $payment->amount        = $request->amountPaid - $request->return;
            $payment->description   = "Normal Purchase";
            $payment->save();
        }

        

        for($i=0 ; $i<count($request->productName) ; $i++)
        {
            $inventory =  ProductInventory::where('model','=',$request->model[$i])->first();


            if(empty($inventory))
            {
                $newInventory = new ProductInventory();
               
                $newInventory->name      = $request->productName[$i];
                $newInventory->barCode   = $request->model[$i].$request->productName[$i].$request->costPrice[$i];
                $newInventory->size      = $request->size[$i];
                $newInventory->color     = $request->color[$i];
                $newInventory->quantity  = $request->quantity[$i];
                $newInventory->model     = $request->model[$i];
                $newInventory->costPrice = $request->costPrice[$i];
                $newInventory->salePrice = $request->salePrice[$i];
                $newInventory->save();     
            }
            else
            {

                $inventory->quantity = $inventory->quantity +  $request->quantity[$i];
                $inventory->costPrice = $inventory->quantity +  $request->costPrice[$i];
                $inventory->save();
            }


            $product = new Product();
            $product->name      = $request->productName[$i];
            $product->barCode   = $request->model[$i].$request->productName[$i].$request->costPrice[$i];
            $product->size      = $request->size[$i];
            $product->color     = $request->color[$i];
            $product->quantity  = $request->quantity[$i];
            $product->model     = $request->model[$i];
            $product->costPrice = $request->costPrice[$i];
            $product->salePrice = $request->salePrice[$i];
            $totalBill          = $request->quantity[$i] * $request->costPrice[$i];
            $product->totalPrice = $totalBill;
            $product->purchaseId = $newPurchase->id;
            $product->save();    
        }
        
        return redirect('invoice/'.$invoice->id);
        
    }

}
