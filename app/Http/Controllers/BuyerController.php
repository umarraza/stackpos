<?php

namespace App\Http\Controllers;

use App\Buyer;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BuyerController extends Controller
{
    public function contactSeller(Request $request)
    {

/*
|--------------------------------------------------------------------------
|   Buyer Details API
|--------------------------------------------------------------------------
|   Email of buyer & messages of both buyer & seller will be store on messages table
*/


            $response = [
                'data' => [
                'code' => 400,
                'message' => 'Something went wrong. Please try again later!',
                ],
               'status' => false
            ];
            $rules = [
                'email'    =>  ['email|unique:messages,email'],
                'message'  =>  ['required'],
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $response['data']['message'] = 'Invalid input values.';
                $response['data']['errors']  = $validator->messages();
            }
            else
            {

                $userEmail   =  User::find($id)->value('email');
                $message     =  $request['bookName'];
                $buyeremail  =  $request['email'];

                $buyer = new Buyer();

                $buyer->message     =  $message;
                $buyer->buyeremail  =  $buyeremail;
                
                if ($buyer) {
                    $response['data']['code']       = 200;
                    $response['status']             = true;
                    $response['data']['result']     = $buyer;
                    $response['data']['message']    = 'Request Successfull';
                }
            }
        return $response;
    }

}
