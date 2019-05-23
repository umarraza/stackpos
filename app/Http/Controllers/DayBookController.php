<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Brand;
use App\Product;           
use App\Supplier; 
use App\Purchase;           
use App\SupplierPayment;
use App\ProductInventory;
use App\FixedExpense;       
use Carbon\Carbon;
use App\Sale;               
use App\ProductSale;      
use DateTime;

class DayBookController extends Controller
{
    public function dailyAccountsReport() {
       
        $now = Carbon::now()->format('y-m-d');

        $dailySales = DB::table('sales AS sale')

        ->join('products_sale AS product', 'product.saleId', '=', 'sale.id')
        
        ->select(
            
            'sale.id', 
            'sale.totalBill',
            'sale.amountRemaining',
            'product.name',
            'sale.created_at'

            )

        ->whereDate('sale.created_at', $now)->get();

        $salesTotal = 0;
        $totalSalesBalance = 0;

        foreach ($dailySales as $value) {

            $salesAmount = $value->totalBill;
            $balanceAmount = $value->amountRemaining;

            $salesTotal += $salesAmount;
            $totalSalesBalance += $balanceAmount;

        }

        $dailyPurchases = DB::table('purchases AS purchase')

        ->join('products AS product', 'product.purchaseId', '=', 'purchase.id')

        ->select(

            'purchase.id', 
            'purchase.totalBill',
            'purchase.amountRemaining',
            'product.name',
            'purchase.created_at'

            )

            ->whereDate('purchase.created_at', $now)->get();

            $purchsesTotal = 0;
            $totalPurchaseBalance = 0;

            foreach ($dailyPurchases as $value) {
                
                $purchaseAmount = $value->totalBill;
                $balanceAmount = $value->amountRemaining;

                $purchsesTotal += $purchaseAmount;
                $totalPurchaseBalance += $balanceAmount;
            }
    
            $dailyExpenses  = FixedExpense::whereDate('created_at', $now)->get();

            $expensesTotal = 0;
    
            foreach ($dailyExpenses as $value) {
    
                $expensesAmount = $value->amount;
                $expensesTotal += $expensesAmount;
    
            }

        return view('dailyreport.daybook', compact(
            
            'dailySales',
            'dailyPurchases',
            'dailyExpenses', 
            'totalSalesBalance', 
            'totalPurchaseBalance', 
            'purchsesTotal', 
            'salesTotal', 
            'expensesTotal',
            'now'
        ));

    }

    public function otherDayReport(Request $request) {
        
        $datePicker     =  $request->datepicker;
        $oldDate        =  date("y-m-d", strtotime($datePicker));
        $dateMonthYear  =  date("d-m-y", strtotime($datePicker));

        $dailySales = DB::table('sales AS sale')

        ->join('products_sale AS product', 'product.saleId', '=', 'sale.id')
        
        ->select(
            
            'sale.id', 
            'sale.totalBill',
            'sale.amountRemaining',
            'product.name',
            'sale.created_at'
            )

        ->whereDate('sale.created_at', $oldDate)->get();
        
        $salesTotal = 0;
        $totalSalesBalance = 0;

        foreach ($dailySales as $value) {

            $salesAmount = $value->totalBill;
            $balanceAmount = $value->amountRemaining;

            $salesTotal += $salesAmount;
            $totalSalesBalance += $balanceAmount;

        }

        $dailyPurchases = DB::table('purchases AS purchase')

        ->join('products AS product', 'product.purchaseId', '=', 'purchase.id')

        ->select(

            'purchase.id', 
            'purchase.totalBill',
            'purchase.amountRemaining',
            'product.name',
            'purchase.created_at'

            )

            ->whereDate('purchase.created_at', $oldDate)->get();

            $purchsesTotal = 0;
            $totalPurchaseBalance = 0;

            foreach ($dailyPurchases as $value) {
                
                $purchaseAmount = $value->totalBill;
                $balanceAmount = $value->amountRemaining;

                $purchsesTotal += $purchaseAmount;
                $totalPurchaseBalance += $balanceAmount;

            }
    
            $dailyExpenses  = FixedExpense::whereDate('created_at', $oldDate)->get();

            $expensesTotal = 0;
    
            foreach ($dailyExpenses as $value) {
    
                $expensesAmount = $value->amount;
                $expensesTotal += $expensesAmount;
    
            }

        return view('dailyreport.daybook', compact(
            
            'dailySales',
            'dailyPurchases', 
            'dailyExpenses', 
            'totalSalesBalance',
            'totalPurchaseBalance',
            'purchsesTotal', 
            'salesTotal', 
            'expensesTotal',
            'dateMonthYear'
        
        ));

    }
}
