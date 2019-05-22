<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\Purchase;
use App\Product;
use App\SaleInvoice;
use App\Sale;
use App\ProductSale;
class InvoiceController extends Controller
{
	public function index($id)
	{
		$invoice = Invoice::find($id);

		$purchase = Purchase::find($invoice->purchaseId);

		$products = Product::where('purchaseId','=',$invoice->purchaseId)->get();
		

		return view('invoice.newInvoice',compact('invoice','purchase','products'));
	}

	public function saleInvoice($id)
	{
		//return "jaja;";
		$invoice = SaleInvoice::find($id);

		$sale = Sale::find($invoice->salesId);

		$products = ProductSale::where('saleId','=',$invoice->salesId)->get();
		

		return view('invoice.newInvoiceSale',compact('invoice','sale','products'));
	}    
}
