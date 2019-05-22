<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Supplier;
use App\Customer;
use App\SupplierPayment;
use App\CustomerPayment;

class PaymentController extends Controller
{
    public function addPaymentSupplierForm($id)
    {
    	$supplier = Supplier::find($id);

    	return view('payment.newPaymentSupplier',compact('supplier'));
    }



    public function addPaymentSupplierStore(Request $request)
    {

    	$supplierPayment = new SupplierPayment();

    	$supplierPayment->amount 		= $request->amount;
    	$supplierPayment->supplierId 	= $request->supplierId;
    	$supplierPayment->description 	= $request->description;
    	$supplierPayment->save();

    	return redirect('/show-suppliers');
    }


    public function addPaymentCustomerForm($id)
    {
        $customer = Customer::find($id);

        return view('payment.newPaymentCustomer',compact('customer'));
    }



    public function addPaymentCustomerStore(Request $request)
    {

        $customerPayment = new CustomerPayment();

        $customerPayment->amount        = $request->amount;
        $customerPayment->customerId    = $request->customerId;
        $customerPayment->description   = $request->description;
        $customerPayment->save();

        return redirect('/show-customers');
    }
}
