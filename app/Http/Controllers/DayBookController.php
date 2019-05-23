<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Brand;
use App\Product;            // products
use App\Supplier; 
use App\Purchase;           // Purchases
use App\SupplierPayment;
use App\ProductInventory;
use App\FixedExpense;       // Expenses
use Carbon\Carbon;
use App\Sale;               // Sales
use App\ProductSale;        // Products Sales


class DayBookController extends Controller
{
    public function dailyAccountsReport() {
       
        // $currentDaySales = Sale::all();

        $now = Carbon::now()->format('y-m-d');

        $currentDaySales = DB::table('sales AS sale')

        ->join('products_sale AS product', 'product.saleId', '=', 'sale.id')
        
        ->select(
            
            'sale.id', 
            'sale.totalBill',
            'amountRemaining',
            'product.name',
            'sale.created_at'
            )

        ->whereDate('sale.created_at', $now)->get();
        
        $salesTotal = 0;

        foreach ($currentDaySales as $value) {

            $salesAmount = $value->totalBill;
            $salesTotal += $salesAmount;

        }

        $currentDayPurchases = DB::table('purchases AS purchase')

        ->join('products AS product', 'product.purchaseId', '=', 'purchase.id')

        ->select(

            'purchase.id', 
            'purchase.totalBill',
            'amountRemaining',
            'product.name',
            'purchase.created_at'

            )

            ->whereDate('purchase.created_at', $now)->get();

            $purchsesTotal = 0;

            foreach ($currentDayPurchases as $value) {
                
                $purchaseAmount = $value->totalBill;
                $purchsesTotal += $purchaseAmount;
            }
    
            $currentDayExpenses  = FixedExpense::whereDate('created_at', $now)->get();

            $expensesTotal = 0;
    
            foreach ($currentDayExpenses as $value) {
    
                $expensesAmount = $value->amount;
                $expensesTotal += $expensesAmount;
    
            }

        return view('dailyreport.daybook', compact('currentDaySales','currentDayPurchases', 'currentDayExpenses','purchsesTotal', 'salesTotal', 'expensesTotal','now'));

    }
}
