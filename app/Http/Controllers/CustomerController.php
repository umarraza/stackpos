<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Sale;
use App\Purchase;
use App\CustomerPayment;
use Carbon\Carbon;

class CustomerController extends Controller
{
    public function showCustomers()
    {
    	$customers = Customer::all();
    	return view('customers.allCustomers',compact('customers'));
    }
 

    public function showAddCustomerForm()
    {
        // $brands = Brand::all();
        return view('customers.addCustomer');
    }

    public function editCustomerForm($id)
    {
        //$brands     = Brand::all();
        $customer   = Customer::find($id);
        return view('customers.editCustomerForm',compact('customer'));
    }


    public function addCustomer(Request $request)
    {

    	//return $request;
        // if($request->brandType=="New")
        // {
        //     $brand = new Brand();
        //     $brand->name = $request->brandNew;
        //     $brand->save();

        //     $brandValue = $brand->name; 
        // }
        // else
        // {
        //     $brandValue = $request->brandExist;
        // }

        $customer = Customer::create([
                        'name'          => $request->supplierName,
                        'shopName'     	=> "Walk-In",
                        'address'       => $request->supplierAddress,
                        'accountNumber' => $request->accountNumber,
                        'userId'        => 1,
                    ]);
        return redirect('show-customers');
    }

    public function customerView($id)
    {
        $customer = Customer::find($id);

        $sales = Sale::where('customerId','=',$customer->id)->get();

        $totalBusiness      = 0;
        $remainingAmount    = 0;
        $amountPaid         = 0;
        $discount           = 0;
        foreach($sales as $sale)
        {
            $totalBusiness = $totalBusiness + $sale->totalBill;
            $discount = $discount + $sale->discount; 
        }
        
        $customerPayment = CustomerPayment::where('customerId','=',$customer->id)->orderBy('created_at', 'desc')->first();

        $paymentHistory = CustomerPayment::where('customerId','=',$customer->id)->orderBy('created_at', 'desc')->get();

        foreach ($paymentHistory as $history) {
            $amountPaid = $amountPaid + $history->amount; 
        }
        $remainingAmount = $totalBusiness - $amountPaid;

        




        $now = Carbon::now()->timezone('Asia/Karachi');
        $weekFirstDay = $now->startOfWeek();

        $dateWeek = array();
        $dateWeek[0]= $weekFirstDay->toDateString();
        //return $dateWeek[0];
        $dateWeek[1]= $weekFirstDay->copy()->addDay(1)->toDateString();
        $dateWeek[2]= $weekFirstDay->copy()->addDay(2)->toDateString();
        $dateWeek[3]= $weekFirstDay->copy()->addDay(3)->toDateString();
        $dateWeek[4]= $weekFirstDay->copy()->addDay(4)->toDateString();
        $dateWeek[5]= $weekFirstDay->copy()->addDay(5)->toDateString();
        $dateWeek[6]= $weekFirstDay->copy()->addDay(6)->toDateString();

        
        ///return $dateWeek;

        $weeklySale = array();
        $weeklySale[0] = Sale::where('customerId','=',$customer->id)
                                       ->whereDate('created_at','=',$dateWeek[0])->sum('totalBill');

        for($i=1 ; $i<=6 ; $i++)
        {
            $weeklySale[$i] = Sale::where('customerId','=',$customer->id)
                                       ->whereDate('created_at','=',$dateWeek[$i])->sum('totalBill');
        }

        return view('customers.customerDetail',compact('customer','sales','totalBusiness','remainingAmount','amountPaid','customerPayment','paymentHistory','discount','weeklySale'));
    }






    public function customerUpdate(Request $request)
    {
        //return $request;
        // if($request->brandType=="New")
        // {
        //     $brand = new Brand();
        //     $brand->name = $request->brandNew;
        //     $brand->save();

        //     $brandValue = $brand->name; 
        // }
        // else
        // {
        //     $brandValue = $request->brandExist;
        // }

        $customer = Customer::find($request->id);

        $customer->name             = $request->customerName;
        $customer->shopName         = "Walk-In";
        $customer->address          = $request->customerAddress;
        $customer->accountNumber    = $request->accountNumber;

        $customer->save();
        return redirect('show-customers');
    }

    public function customerDelete($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect('show-customers');
    }
}
