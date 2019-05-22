<?php

namespace App\Http\Controllers;

use App\User;
use App\UniversityData;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UniversityDataController extends Controller
{

    // CREATE UNIVERSITY

    public function createUniversity(Request $request)
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
                'universityUrl'   =>  ['required'],
                'maincampus'      =>  ['required'],
                'countryname'     =>  ['required'],
                'state'           =>  ['required'],
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
                $universityUrl   =  $request['universityUrl'];
                $maincampus      =  $request['maincampus'];
                $countryname     =  $request['countryname'];
                $state           =  $request['state'];

                $university = new UniversityData();


                $university->universityName =  $universityName;
                $university->universityUrl  =  $universityUrl;
                $university->maincampus     =  $maincampus;
                $university->countryname    =  $countryname;
                $university->state          =  $state;
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

    // ALL UNIVERSITIES
    public function allUniversities(Request $request)
    {
        $response = [
                'data' => [
                    'code'      => 400,
                    'errors'    => '',
                    'message'   => 'Something went wrong. Please try again later!',
                ],
                'status' => false
            ];

                $universities = UniversityData::all();

                if ($universities) {
                    $response['data']['code']       = 200;
                    $response['status']             = true;
                    $response['data']['result']     = $universities;
                    $response['data']['message']    = 'Request Successfull';
                }
        return $response;
    }



    // UNIVERSITY DETAILS
    public function uniDetails(Request $request)
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
                'id'  =>  ['required'],
            ];

            $validator  = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $response['data']['message'] = 'Invalid input values.';
                $response['data']['errors'] = $validator->messages();
            }else
            {
                $university =   University::where('id','=', $request['id'])->first();

                if ($university) {
                    $response['data']['code']       = 200;
                    $response['status']             = true;
                    $response['data']['result']     = $university;
                    $response['data']['message']    = 'Request Successfull';
                }
            }
        return $response;
    }


    // UPDATE UNIVERSITY
    public function updateUniversity(Request $request)
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
                'universityUrl'   =>  ['required'],
                'maincampus'      =>  ['required'],
                'countryname'     =>  ['required'],
                'state'           =>  ['required'],
                'id'              =>  ['required'],
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
                $universityUrl   =  $request['universityUrl'];
                $maincampus      =  $request['maincampus'];
                $countryname     =  $request['countryname'];
                $state           =  $request['state'];
                
                $university = University::find($id);

                $university->universityName =  $universityName;
                $university->universityUrl  =  $universityUrl;
                $university->maincampus     =  $maincampus;
                $university->countryname    =  $countryname;
                $university->state          =  $state;

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

    // DELETE UNIVERSITY
    public function deleteUniversity(Request $request)
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
                'id'     => ['required'],
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $response['data']['message'] = 'Invalid input values.';
                $response['data']['errors'] = $validator->messages();
            }
            else
            {
                $university = UniversityData::find($request['id']);
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
