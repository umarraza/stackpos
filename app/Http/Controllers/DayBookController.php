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
        ->join('customers AS customer', 'sale.customerId', '=', 'customer.id')
        
        ->select(
            
            'sale.id', 
            'sale.customerId', 
            'sale.totalBill',
            'sale.amountRemaining',
            'customer.name AS customer_name',
            'product.name',
            'sale.created_at'

            )

        ->whereDate('sale.created_at', $now)
        ->get();

        $salesTotal = 0;
        $totalSalesBalance = 0;

        foreach ($dailySales as $value) {

            
            $salesAmount = $value->totalBill;
            $balanceAmount = $value->amountRemaining;

            $salesTotal += $salesAmount;
            $totalSalesBalance += $balanceAmount;

            // Converts the number to comma seprated thousands format e.g 270000 => 270,000

            $value->totalBill = number_format($value->totalBill);
            $value->amountRemaining = number_format($value->amountRemaining);

        }
        
        $salesTotal = number_format($salesTotal);
        $totalSalesBalance = number_format($totalSalesBalance);

        $dailyPurchases = DB::table('purchases AS purchase')

        ->join('products AS product', 'product.purchaseId', '=', 'purchase.id')
        ->join('suppliers AS supplier', 'purchase.supplierId', '=', 'supplier.id')

        ->select(

            'purchase.id', 
            'purchase.supplierId', 
            'purchase.totalBill',
            'purchase.amountRemaining',
            'supplier.name AS supplier_name',
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

                $value->totalBill = number_format($value->totalBill);
                $value->amountRemaining = number_format($value->amountRemaining);

            }
    
            $purchsesTotal = number_format($purchsesTotal);
            $totalPurchaseBalance = number_format($totalPurchaseBalance);

            $dailyExpenses = FixedExpense::whereDate('created_at', $now)->get();

            $expensesTotal = 0;
    
            foreach ($dailyExpenses as $value) {
    
                $expensesAmount = $value->amount;
                $expensesTotal += $expensesAmount;
    
            }

            $expensesTotal = number_format($expensesTotal);

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
        ->join('customers AS customer', 'sale.customerId', '=', 'customer.id')
        
        ->select(

            'sale.id', 
            'sale.customerId', 
            'sale.totalBill',
            'sale.amountRemaining',
            'customer.name AS customer_name',
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

            $value->totalBill = number_format($value->totalBill);
            $value->amountRemaining = number_format($value->amountRemaining);

        }

        $salesTotal = number_format($salesTotal);
        $totalSalesBalance = number_format($totalSalesBalance);

        $dailyPurchases = DB::table('purchases AS purchase')

        ->join('products AS product', 'product.purchaseId', '=', 'purchase.id')
        ->join('suppliers AS supplier', 'purchase.supplierId', '=', 'supplier.id')

        ->select(

            'purchase.id', 
            'purchase.supplierId', 
            'purchase.totalBill',
            'purchase.amountRemaining',
            'supplier.name AS supplier_name',
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

                $value->totalBill = number_format($value->totalBill);
                $value->amountRemaining = number_format($value->amountRemaining);

            }
    
            $purchsesTotal = number_format($purchsesTotal);
            $totalPurchaseBalance = number_format($totalPurchaseBalance);

            $dailyExpenses  = FixedExpense::whereDate('created_at', $oldDate)->get();

            $expensesTotal = 0;
    
            foreach ($dailyExpenses as $value) {
    
                $expensesAmount = $value->amount;
                $expensesTotal += $expensesAmount;

                $value->amount = number_format($value->amount);
            }

            $expensesTotal = number_format($expensesTotal);

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
