<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    public function createCategory(Request $request)
    {
            $response = [
                'data' => [
                    'code' => 400,
                    'message' => 'Something went wrong. Please try again later!',
                ],
               'status' => false
            ];
            $rules = [

                'categoryName'  =>  ['required'],
                'bookid'  =>  ['required'],

            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) 
            {
                $response['data']['message'] = 'Invalid input values.';
                $response['data']['errors']  = $validator->messages();
            }
            else
            {
                
                $categoryName  =  $request['categoryName'];
                $bookid        =  $request['bookid'];

                $category = new Category();

                $category->categoryName  =  $categoryName;
                $category->bookid        =  $bookid;
            

                $category->save();

                if ($category) 
                {
                    $response['data']['code']       = 200;
                    $response['status']             = true;
                    $response['data']['result']     = $category;
                    $response['data']['message']    = 'Request Successfull';
                }
            }
        return $response;
    }



    public function updateCtegory(Request $request)
    {

            $response = [
                'data' => [
                'code' => 400,
                'message' => 'Something went wrong. Please try again later!',
                ],
               'status' => false
            ];
            $rules = [
                'categoryName' =>  ['required'],
                'bookId'       =>  ['required'],
            ];
            
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $response['data']['message'] = 'Invalid input values.';
                $response['data']['errors']  = $validator->messages();
            }
            else
            {

                $categoryName  =  $request['categoryName'];
                $bookid        =  $request['bookid'];

                $category = Category::find($bookid);

                $category->categoryName    =  $categoryName;
                
                $category->save();

                if ($category) {
                    $response['data']['code']       = 200;
                    $response['status']             = true;
                    $response['data']['result']     = $category;
                    $response['data']['message']    = 'Category Updated';
                }
            }
        return $response;
    }

    public function viewCategories(Request $request)
    {
        $response = [
                'data' => [
                    'code'      => 400,
                    'errors'    => '',
                    'message'   => 'Something went wrong. Please try again later!',
                ],
                'status' => false
            ];

                $categories = Category::all();

                if ($categories) {
                    $response['data']['code']       = 200;
                    $response['status']             = true;
                    $response['data']['result']     = $categories;
                    $response['data']['message']    = 'Request Successfull';
                }
        return $response;
    }

    public function deleteCategory(Request $request)
    {
        $response = [
                'data' => [
                    'code'      => 400,
                    'errors'    => '',
                    'message'   => 'Something went wrong. Please try again later!',
                ],
                'status' => false
            ];

            $rules = [
                'id' => ['required'],
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $response['data']['message'] = 'Invalid input values.';
                $response['data']['errors'] = $validator->messages();
            }
            else
            {
                $category = Category::find($request['id']);
                $category->delete();

                if ($category) {
                    $response['data']['code']       = 200;
                    $response['status']             = true;
                    $response['data']['message']    = 'Category Deleted';
                }
            }

        return $response;
    }


}
