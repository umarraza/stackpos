<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Product;
use App\Supplier;
use App\Purchase;
use App\SupplierPayment;
use App\ProductInventory;

class ProductController extends Controller
{
    public function newProductForm()
    {
        $suppliers = Supplier::all();
        return view('products.newProductForm',compact('suppliers'));
    	// $brands = Brand::all();
    	// return view('products.newProductForm',compact('brands'));
    }

    public function editProductForm($id)
    {
    	$brands  = Brand::all();
    	$product = Product::find($id);
    	return view('products.editProductForm',compact('brands','product'));
    }


    public function showProducts()
    {
    	$products = ProductInventory::all();

    	//return $products;
    	return view('products.showProducts',compact('products'));
    }

    public function productDelete($id)
    {
    	$product = Product::find($id);
    	$product->delete();
    	return redirect('show-products');
    }


    public function newProductStore(Request $request)
    {
    	return $request;


        $newPurchase = new Purchase();
        $newPurchase->supplierId = $request->supplierId;
        $totalBill = $request->quantity * $request->costPrice;
        $newPurchase->totalBill = $totalBill;
        $newPurchase->amountPaid = $request->amountPaid;
        $newPurchase->amountRemaining = $totalBill - $request->amountPaid;
        $newPurchase->save();

        if($request->amountPaid>0)
        {
            $payment = new SupplierPayment();
            $payment->supplierId = $request->supplierId;
            $payment->amount = $request->amountPaid;
            $payment->save();

        }
        

    	$product = new Product();
    	$product->name  	= $request->productName;
    	$product->barCode  	= $request->barCode;
    	$product->size  	= $request->size;
    	$product->color  	= $request->color;
    	$product->quantity  = $request->quantity;
    	$product->model 	= $request->model;
        $product->costPrice = $totalBill;

        $totalBill = $request->quantity * $request->costPrice;

    	$product->totalPrice = $totalBill;
        $product->purchaseId = $newPurchase->id;
    	$product->save();
    	return redirect('show-products');
    	
    }


    public function productUpdate(Request $request)
    {
    	//return $request;
    	$product = Product::find($request->id);

    	$product->name  	= $request->productName;
    	$product->barCode  	= $request->barCode;
    	$product->size  	= $request->size;
    	$product->color  	= $request->color;
    	$product->brandName = $request->brandName;
    	$product->quantity  = $request->quantity;
    	$product->model 	= $request->model;
    	$product->costPrice = $request->costPrice;
    	$product->salePrice = $request->salePrice;
    	$product->save();
    	return redirect('show-products');
    }









    ////////////////////////////////////////////////////////////////////////////
    // public function newProductForm()
    // {
    //     $suppliers = Supplier::all();
    //     return view('products.newProductForm',compact('suppliers'));
    //     // $brands = Brand::all();
    //     // return view('products.newProductForm',compact('brands'));
    // }

    // public function editProductForm($id)
    // {
    //     $brands  = Brand::all();
    //     $product = Product::find($id);
    //     return view('products.editProductForm',compact('brands','product'));
    // }


    // public function showProducts()
    // {
    //     $products = Product::all();

    //     //return $products;
    //     return view('products.showProducts',compact('products'));
    // }

    // public function productDelete($id)
    // {
    //     $product = Product::find($id);
    //     $product->delete();
    //     return redirect('show-products');
    // }


    // public function newProductStore(Request $request)
    // {
    //     return $request;
    //     $product = new Product;

    //     $product->name      = $request->productName;
    //     $product->barCode   = $request->barCode;
    //     $product->size      = $request->size;
    //     $product->color     = $request->color;
    //     $product->brandName = $request->brandName;
    //     $product->quantity  = $request->quantity;
    //     $product->model     = $request->model;
    //     $product->costPrice = $request->costPrice;
    //     $product->salePrice = $request->salePrice;
    //     $product->save();
    //     return redirect('show-products');
        
    // }


    // public function productUpdate(Request $request)
    // {
    //     //return $request;
    //     $product = Product::find($request->id);

    //     $product->name      = $request->productName;
    //     $product->barCode   = $request->barCode;
    //     $product->size      = $request->size;
    //     $product->color     = $request->color;
    //     $product->brandName = $request->brandName;
    //     $product->quantity  = $request->quantity;
    //     $product->model     = $request->model;
    //     $product->costPrice = $request->costPrice;
    //     $product->salePrice = $request->salePrice;
    //     $product->save();
    //     return redirect('show-products');
    // }


}
