<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier; 
use App\Brand;
use App\Purchase;
use App\SupplierPayment;
use Carbon\Carbon;
class SupplierController extends Controller
{
    public function showAddSupplierForm()
    {
        $brands = Brand::all();
        return view('suppliers.addSupplier',compact('brands'));
    }

    public function editSupplierForm($id)
    {
        $brands     = Brand::all();
        $supplier   = Supplier::find($id);
    	return view('suppliers.editSupplierForm',compact('brands','supplier'));
    }

    public function addSupplier(Request $request)
    {
        if($request->brandType=="New")
        {
            $brand = new Brand();
            $brand->name = $request->brandNew;
            $brand->save();

            $brandValue = $brand->name; 
        }
        else
        {
            $brandValue = $request->brandExist;
        }

        $supplier = Supplier::create([
                        'name'          => $request->supplierName,
                        'brandName'     => $brandValue,
                        'cellNumber'    => $request->mobNumber,
                        'address'       => $request->supplierAddress != ''? $request->supplierAddress:"N/A",
                        'accountNumber' => $request->accountNumber != ''? $request->accountNumber:"N/A",
                        'userId'        => 1,
                    ]);
        return redirect('show-suppliers');
    }

    public function supplierUpdate(Request $request)
    {
        if($request->brandType=="New")
        {
            $brand = new Brand();
            $brand->name = $request->brandNew;
            $brand->save();

            $brandValue = $brand->name; 
        }
        else
        {
            $brandValue = $request->brandExist;
        }

    	$supplier = Supplier::find($request->id);

        $supplier->name             = $request->supplierName;
        $supplier->brandName        = $brandValue;
        $supplier->cellNumber       = $request->mobNumber;
        $supplier->address          = $request->supplierAddress;
        $supplier->accountNumber    = $request->accountNumber;

        $supplier->save();
        //$supplier->userId = $request->supplierName;
    	return redirect('show-suppliers');
    }

    public function showSuppliers()
    {
    	$suppliers = Supplier::all();

    	return view('suppliers.allSuppliers',compact('suppliers'));
    }

    public function supplierDelete($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();
        return redirect('show-suppliers');
    }


    public function supplierView($id)
    {
        $supplier = Supplier::find($id);

        $purchases = Purchase::where('supplierId','=',$supplier->id)->get();

        $totalBusiness      = 0;
        $remainingAmount    = 0;
        $amountPaid         = 0;
        $discount           = 0;
        foreach($purchases as $purchase)
        {
            $totalBusiness = $totalBusiness + $purchase->totalBill;
            $discount = $discount + $purchase->discount; 
        }
        
        $supplierPayment = SupplierPayment::where('supplierId','=',$supplier->id)->orderBy('created_at', 'desc')->first();

        $paymentHistory = SupplierPayment::where('supplierId','=',$supplier->id)->orderBy('created_at', 'desc')->get();

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

        $weeklyPurchase = array();
        $weeklyPurchase[0] = Purchase::where('supplierId','=',$supplier->id)
                                       ->whereDate('created_at','=',$dateWeek[0])->sum('totalBill');

        for($i=1 ; $i<=6 ; $i++)
        {
            $weeklyPurchase[$i] = Purchase::where('supplierId','=',$supplier->id)
                                       ->whereDate('created_at','=',$dateWeek[$i])->sum('totalBill');
        }

        //return $weeklyPurchase[2];




        return view('suppliers.supplierDetail',compact('supplier','purchases','totalBusiness','remainingAmount','amountPaid','supplierPayment','paymentHistory','discount','dateWeek','weeklyPurchase'));
    }
}
