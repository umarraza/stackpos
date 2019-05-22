<?php

namespace App\Http\Controllers;

use App\User;
use App\University;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class UniversityController extends Controller
{
 
/*
|--------------------------------------------------------------------------
|   Create the university
|--------------------------------------------------------------------------
|   
*/ 
 
    public function createUserUniversity(Request $request)
    {
            $response = [
                'data' => [
                    'code' => 400,
                    'message' => 'Something went wrong. Please try again later!',
                ],
               'status' => false
            ];
            $rules = [

                'universityName'  =>  ['required'],
                'userid'  =>  ['required'],

            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) 
            {
                $response['data']['message'] = 'Invalid input values.';
                $response['data']['errors']  = $validator->messages();
            }
            else
            {
                
                $universityName  =  $request['universityName'];
                $userid          =  $request['userid'];

                $university = new University();

                $university->universityName =  $universityName;
                $university->userid         =  $userid;
            

                $university->save();

                if ($university) 
                {
                    $response['data']['code']       = 200;
                    $response['status']             = true;
                    $response['data']['result']     = $university;
                    $response['data']['message']    = 'Request Successfull';
                }
            }
        return $response;
    }

/*
|--------------------------------------------------------------------------
|   Get the university to show on the profile of the user or student
|--------------------------------------------------------------------------
|   
*/
    
    public function getUserUniversity(Request $request)
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
                'userid'  =>  ['required'],
            ];

            $validator  = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $response['data']['message'] = 'Invalid input values.';
                $response['data']['errors'] = $validator->messages();
            }else
            {
                $university =   University::where('userId','=', $request['userid'])->first();
                return $university;

                if ($university) {
                    $response['data']['code']       = 200;
                    $response['status']             = true;
                    $response['data']['result']     = $university;
                    $response['data']['message']    = 'Request Successfull';
                }
            }
        return $response;
    }
/*
|--------------------------------------------------------------------------
|   UPDATE University
|--------------------------------------------------------------------------
|   
*/

    public function updateUserUniversity(Request $request)
    {
            $response = [
                'data' => [
                    'code' => 400,
                    'message' => 'Something went wrong. Please try again later!',
                ],
               'status' => false
            ];
            $rules = [

                'universityName'  =>  ['required'],
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) 
            {
                $response['data']['message'] = 'Invalid input values.';
                $response['data']['errors']  = $validator->messages();
            }
            else
            {
                
                $universityName  =  $request['universityName'];

                $university = University::find($request['id']);

                $university->universityName =  $universityName;

                $university->save();

                if ($university) 
                {
                    $response['data']['code']       = 200;
                    $response['status']             = true;
                    $response['data']['result']     = $university;
                    $response['data']['message']    = 'Request Successfull';
                }
            }
        return $response;
    }

/*
|--------------------------------------------------------------------------
|   DELETE University
|--------------------------------------------------------------------------
|   
*/

    public function deleteUserUniversity(Request $request)
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
                'userid'     => ['required'],
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $response['data']['message'] = 'Invalid input values.';
                $response['data']['errors'] = $validator->messages();
            }
            else
            {
                $university = University::find($request['userid']);
                $university->delete();

                if ($university) {
                    $response['data']['code']       = 200;
                    $response['status']             = true;
                    $response['data']['message']    = 'Universitty Deleted';
                }
            }

        return $response;
    }

}

