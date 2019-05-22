<?php

namespace App\Http\Controllers;


use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function contact(Request $request)
    {

/*
|--------------------------------------------------------------------------
|   Users Can contact admin about telling whats in thier mind
|--------------------------------------------------------------------------
|   
*/
            $response = [
                'data' => [
                'code' => 400,
                'message' => 'Something went wrong. Please try again later!',
                ],
               'status' => false
            ];
            $rules = [
                'fullName' =>  ['required'],
                'email'    =>  ['required'],
                'subject'  =>  ['required'],
                'message'  =>  ['required'],
                'userid'   =>  ['required'],
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $response['data']['message'] = 'Invalid input values.';
                $response['data']['errors']  = $validator->messages();
            }
            else
            {
                $fullName    =  $request['fullName'];
                $email       =  $request['email'];
                $subject     =  $request['subject'];
                $message     =  $request['message'];
                $userid      =  $request['userid'];


                $contact = new Contact();

                $contact->fullName  =  $fullName;
                $contact->email     =  $email;
                $contact->subject   =  $subject;
                $contact->userid    =  $userid;

                $contact->save();

                if ($contact) {
                    $response['data']['code']       = 200;
                    $response['status']             = true;
                    $response['data']['result']     = $contact;
                    $response['data']['message']    = 'Request Successfull';
                }
            }
        return $response;
    }
}
