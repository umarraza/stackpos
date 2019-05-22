<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchase;
use App\Sale;
class BussinessController extends Controller
{
    public function index()
    {
    	$purchases = Purchase::all();

        $totalBusiness      = 0;
        $remainingAmount    = 0;
        $amountPaid         = 0;
        $discount           = 0;
        foreach($purchases as $purchase)
        {
            $totalBusiness = $totalBusiness + $purchase->totalBill;
            $remainingAmount = $remainingAmount + $purchase->amountRemaining;
            $amountPaid = $amountPaid + $purchase->amountPaid; 
            $discount = $discount + $purchase->discount; 
        }



        $sales = Sale::all();

        $sTotalBusiness      = 0;
        $sRemainingAmount    = 0;
        $sAmountPaid         = 0;
        $sDiscount           = 0;
        foreach($sales as $sale)
        {
            $sTotalBusiness   = $sTotalBusiness   +   $sale->totalBill;
            $sRemainingAmount = $sRemainingAmount +   $sale->amountRemaining;
            $sAmountPaid      = $sAmountPaid      +   $sale->amountPaid;
            $sDiscount        = $sDiscount        +   $sale->discount; 
        }



    	return view('bussiness.totalBussiness',compact('totalBusiness','remainingAmount','amountPaid','discount','sTotalBusiness','sRemainingAmount','sAmountPaid','sDiscount'));
    }
}
