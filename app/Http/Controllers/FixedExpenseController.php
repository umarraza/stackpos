<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FixedExpense;
class FixedExpenseController extends Controller
{
    public function newFixedExpenseForm()
    {
    	return view('fixedExpense.newFixedExpenseForm');
    }

    public function editFixedExpenseForm($id)
    {
    	$fixedExpense = FixedExpense::find($id);
    	return view('fixedExpense.editFixedExpenseForm',compact('fixedExpense'));
    }



    public function newFixedExpenseStore(Request $request)
    {
    	$fixedExpense = new FixedExpense();

    	$fixedExpense->expenseName 	= $request->expenseName;
    	$fixedExpense->description 	= $request->description;
    	$fixedExpense->amount 		= $request->amount;
    	$fixedExpense->save();
    	return redirect('show-fixed-expenses');
    }

    public function fixedExpenseUpdate(Request $request)
    {
    	$fixedExpense = FixedExpense::find($request->id);

    	$fixedExpense->expenseName 	= $request->expenseName;
    	$fixedExpense->description 	= $request->description;
    	$fixedExpense->amount 		= $request->amount;
    	$fixedExpense->save();
    	return redirect('show-fixed-expenses');
    }

    public function showFixedExpenses()
    {
    	$fixedExpenses = FixedExpense::all();
    	return view('fixedExpense.showFixedExpense',compact('fixedExpenses'));
    }


    public function fixedExpenseDelete($id)
    {
    	$fixedExpense = FixedExpense::find($id);
    	$fixedExpense->delete();
    	return redirect('show-fixed-expenses');
    }
}
