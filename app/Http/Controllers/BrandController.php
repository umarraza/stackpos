<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;

class BrandController extends Controller
{
    public function newBrandForm()
    {
    	return view('brand.newBrandForm');
    }

    public function editBrandForm($id)
    {
    	$brand = Brand::find($id);
    	return view('brand.editBrandForm',compact('brand'));
    }

    public function newBrandStore(Request $request)
    {
    	$brand  = new Brand();
    	$brand->name = $request->brand;
    	$brand->save();

    	return redirect('show-brands');
    }

    public function brandUpdate(Request $request)
    {
    	$brand  = Brand::find($request->id);
    	$brand->name = $request->brand;
    	$brand->save();
    	return redirect('show-brands');
    }

    public function showBrands()
    {
    	$brands = Brand::all();

    	return view('brand.showBrands',compact('brands'));
    }

    public function brandDelete($id)
    {
    	$brand = Brand::find($id);
    	$brand->delete();
    	return redirect('show-brands');
    }
}
