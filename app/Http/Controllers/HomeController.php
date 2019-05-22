<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pulley;
use App\Purchase;
use App\Sale;
use Carbon\Carbon;
use App\Customer;
use App\FixedExpense;
use App\User;
use App\ProductInventory;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
            $purchases = Purchase::all();

            $totalBusiness      = 0;
            $remainingAmount    = 0;
            $amountPaid         = 0;
            $discount           = 0;
            foreach($purchases as $purchase)
            {
                $totalBusiness   =  $totalBusiness + $purchase->totalBill;
                $remainingAmount =  $remainingAmount + $purchase->amountRemaining;
                $amountPaid      =  $amountPaid + $purchase->amountPaid; 
                $discount        =  $discount + $purchase->discount; 
            }



            $sales = Sale::all();

            $sTotalBusiness       =  0;
            $sRemainingAmount     =  0;
            $sAmountPaid          =  0;
            $sDiscount            =  0;
            foreach($sales as $sale)
            {
                $sTotalBusiness   =  $sTotalBusiness + $sale->totalBill;
                $sRemainingAmount =  $sRemainingAmount + $sale->amountRemaining;
                $sAmountPaid      =  $sAmountPaid + $sale->amountPaid;
                $sDiscount        =  $sDiscount + $sale->discount; 

            }


            $now = Carbon::now()->timezone('Asia/Karachi');
            $startOfYear = $now->startOfYear();

            $dateMonth = array();
            $dateMonth[0]= $startOfYear->toDateString();
            //return $dateMonth[0];
            $dateMonth[1]   =   $startOfYear->copy()->addMonth(1)->toDateString();
            $dateMonth[2]   =   $startOfYear->copy()->addMonth(2)->toDateString();
            $dateMonth[3]   =   $startOfYear->copy()->addMonth(3)->toDateString();
            $dateMonth[4]   =   $startOfYear->copy()->addMonth(4)->toDateString();
            $dateMonth[5]   =   $startOfYear->copy()->addMonth(5)->toDateString();
            $dateMonth[6]   =   $startOfYear->copy()->addMonth(6)->toDateString();

            $dateMonth[7]   =   $startOfYear->copy()->addMonth(7)->toDateString();
            $dateMonth[8]   =   $startOfYear->copy()->addMonth(8)->toDateString();
            $dateMonth[9]   =   $startOfYear->copy()->addMonth(9)->toDateString();
            $dateMonth[10]  =   $startOfYear->copy()->addMonth(10)->toDateString();
            $dateMonth[11]  =   $startOfYear->copy()->addMonth(11)->toDateString();


            $dateMonth[12]  =   $startOfYear->copy()->addMonth(12)->toDateString();


                // ========== Yearly Sales ========== // 
            
            $yearlySale = array();
            $yearlySale[0] = Sale::whereDate('created_at','>=',$dateMonth[0])
                                           ->whereDate('created_at','<',$dateMonth[1])
                                           ->sum('totalBill');

            for($i=1 ; $i<=11 ; $i++)
            {
                $yearlySale[$i] = Sale::whereDate('created_at','>=',$dateMonth[$i])
                                           ->whereDate('created_at','<',$dateMonth[$i+1])
                                           ->sum('totalBill');
            }

                // ========== Yearly Purchases ========== // 

            $yearlyPurchase = array();
            $yearlyPurchase[0] = Purchase::whereDate('created_at','>=',$dateMonth[0])
                                           ->whereDate('created_at','<',$dateMonth[1])
                                           ->sum('totalBill');

            for($i=1 ; $i<=11 ; $i++)
            {
                $yearlyPurchase[$i] = Purchase::whereDate('created_at','>=',$dateMonth[$i])
                                           ->whereDate('created_at','<',$dateMonth[$i+1])
                                           ->sum('totalBill');
            }

            // ===========================BAR CHART =============================== //


                $now            =   Carbon::now()->timezone('Asia/Karachi');
                $startOfYear    =   $now->startOfYear();

                $dateMonth      =   array();
                $dateMonth[0]   =   $startOfYear->toDateString();

                $dateMonth[1]   =   $startOfYear->copy()->addMonth(1)->toDateString();
                $dateMonth[2]   =   $startOfYear->copy()->addMonth(2)->toDateString();
                $dateMonth[3]   =   $startOfYear->copy()->addMonth(3)->toDateString();
                $dateMonth[4]   =   $startOfYear->copy()->addMonth(4)->toDateString();
                $dateMonth[5]   =   $startOfYear->copy()->addMonth(5)->toDateString();
                $dateMonth[6]   =   $startOfYear->copy()->addMonth(6)->toDateString();

                $dateMonth[7]   =   $startOfYear->copy()->addMonth(7)->toDateString();
                $dateMonth[8]   =   $startOfYear->copy()->addMonth(8)->toDateString();
                $dateMonth[9]   =   $startOfYear->copy()->addMonth(9)->toDateString();
                $dateMonth[10]  =   $startOfYear->copy()->addMonth(10)->toDateString();
                $dateMonth[11]  =   $startOfYear->copy()->addMonth(11)->toDateString();


                $dateMonth[12]  =   $startOfYear->copy()->addMonth(12)->toDateString();


                
                // ========== Yearly Expenses ========== // 
                $yearlyExpenses = array();
                $yearlyExpenses[0] = FixedExpense::whereDate('created_at','>=',$dateMonth[0])
                                               ->whereDate('created_at','<',$dateMonth[1])
                                               ->sum('amount');


                for($i=1 ; $i<=11 ; $i++)
                {
                    $yearlyExpenses[$i] = FixedExpense::whereDate('created_at','>=',$dateMonth[$i])
                                               ->whereDate('created_at','<',$dateMonth[$i+1])
                                               ->sum('amount');
                }

        
            // =========================== DONUT CHART =============================== //

              $now              =  Carbon::now()->timezone('Asia/Karachi');
              $startOfMonth     =  $now->copy()->startOfMonth();
              $endOfMonth       =  $now->copy()->endOfMonth();

              $monthlyExpenses  =  FixedExpense::whereDate('created_at','>=',$startOfMonth)
                                               ->whereDate('created_at','<=',$endOfMonth)
                                               ->sum('amount');


              $monthlySales     = Sale::whereDate('created_at','>=',$startOfMonth)
                                               ->whereDate('created_at','<=',$endOfMonth)
                                               ->sum('totalBill');


              $monthlyPurchases = Purchase::whereDate('created_at','>=',$startOfMonth)
                                               ->whereDate('created_at','<=',$endOfMonth)
                                               ->sum('totalBill');
              // return $monthlyExpenses;

              $customers       =  Customer::count();
              $employes        =  User::count();
              $totalInventory  =  ProductInventory::count();



        return view('home',compact('sales','yearlySale','yearlyPurchase','sTotalBusiness','totalBusiness','yearlyExpenses','monthlyExpenses','monthlySales','monthlyPurchases','customers','employes','totalInventory'));   

    } // End Index
    

} //End Home Controller


