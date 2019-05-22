<?php

namespace App\Http\Controllers;

use App\User;
use App\University;
use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


 
class UserController extends Controller
{
/*
|--------------------------------------------------------------------------
|   Register a new User
|--------------------------------------------------------------------------
|  
*/
    public function register(Request $request)
    {
            $response = [
                'data' => [
                    'code' => 400,
                    'message' => 'Something went wrong. Please try again later!',
                    ],
            'status' => false
            ];
            $rules = [

                'name'             =>  ['required'],
                'username'         =>  ['required'],
                'email'            =>  ['required'],
                'password'         =>  ['required'],
                'universityName'   =>  ['required'],
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) 
            {
                $response['data']['message'] = 'Invalid input values.';
                $response['data']['errors']  = $validator->messages();
            }
            else
            {

                $name            =  $request['name'];
                $username        =  $request['username'];
                $email           =  $request['email'];
                $password        =  Hash::make($request['password']);
                $universityName  =  $request['universityName'];

                $user = new User();
                $user->name      =  $name;
                $user->username  =  $username;
                $user->email     =  $email;
                $user->password  =  $password;
                
                $user->save();
                $userid = $user->id;
                // return $userid;

                $university = new University();
                $university->universityName =  $universityName;
                $university->userid = $userid;
                $university->save();

                if ($user && $university) 
                {
                    $response['data']['code']       = 200;
                    $response['status']             = true;
                    $response['data']['result']     = $user;
                    $response['data']['result']     = $university;
                    $response['data']['message']    = 'Request Successfull';
                }
            }
        return $response;
    }

    /*
    |--------------------------------------------------------------------------
    |   User Login API
    |--------------------------------------------------------------------------
    |  
    */

    public function login(Request $request)
    {
        $response = [
            'data' => [
                'code'     => 400,
                'errors'   => '',
                'message'  => 'Something went wrong. Please try again later!',
            ],
            'status' => false
        ];

        $rules = [
            'email'     =>  ['required'],
            'password'  =>  ['required'],
        ];
        
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) 
        {
            $response['data']['message'] = 'User name or password is invalid.';
            $response['data']['errors']  = $validator->messages();
        }
        else
        {
            $user  =  User::where('email', '=', $request['email'])->get();
            if (!empty($user))  
            {
                if(Hash::check($user->password, $request['password']))
                {
                    $response['data']['code']     =  200;
                    $response['status']           =  true;
                    $response['data']['message']  = 'success';
                    $response['data']['result']   =  $user;
                }
                else
                {
                    $response['data']['code']     =  400;
                    $response['status']           =  false;
                    $response['data']['message']  =  'Password error';
                }
            } 
            else
            {
                $response['data']['code']     =  400;
                $response['status']           =  false;
                $response['data']['message']  =  'User does not exist';
            }
        }

        return $response;

    }

    // USER Profile API

    public function userProfile(Request $request){
        $response = [
            'data' => [
                'code'      => 400,
                'errors'    => '',
                'message'   => 'Something went wrong. Please try again later!',
            ],
            'status' => false
        ];

        $rules = [
            'id' =>  ['required'],
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $response['data']['message'] = 'Invalid input values.';
            $response['data']['errors']  = $validator->messages();
        }
        else
        {
            $id = $request['id'];

            $userProfile = DB::table('users')
                           ->join('students_universities', 'users.id', '=', 'students_universities.userid')
                            ->select('users.*','students_universities.*')
                            ->get();
        
            if ($userProfile) {
                $response['data']['code']     =  200;
                $response['status']           =  true;
                $response['data']['result']   =  $userProfile;
                $response['data']['message']  =  'Request Successfull';
            }
        }
    return $response;
    }

    // Update User Profile API 

    public function updateProfile(Request $request)
    {
            $response = [
                'data' => [
                    'code' => 400,
                    'message' => 'Something went wrong. Please try again later!',
                ],
               'status' => false
            ];
            $rules = [

                'name'           =>  ['required'],
                'username'       =>  ['required'],
                'universityName' =>  ['required'],
                'id'             =>  ['required'],
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) 
            {
                $response['data']['message'] = 'Invalid input values.';
                $response['data']['errors']  = $validator->messages();
            }
            else
            {
                $name      =  $request['name'];
                $username  =  $request['username'];

                $user = User::find($request['id']);

                $user->name           = $name;
                $user->username       = $username;
                $user->save();

                $universityName  =  $request['universityName'];

                $university =   University::where('userid','=', $request['id'])->first();

                $university->universityName = $universityName;
                $university->save();
                if ($user && $university) 
                {
                    $response['data']['code']       = 200;
                    $response['status']             = true;
                    $response['data']['result']     = $user;
                    $response['data']['result']     = $university;
                    $response['data']['message']    = 'Request Successfull';
                }
            }
        return $response;
    }

    // Change Password API

    public function changePassword(Request $request)
    {
            $response = [
                'data' => [
                    'code' => 400,
                    'message' => 'Something went wrong. Please try again later!',
                ],
               'status' => false
            ];
            $rules = [

                'oldPasword'   =>  ['required'],
                'newPassword'  =>  ['required'],
                'id'           =>  ['required'],

            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) 
            {
                $response['data']['message'] = 'Invalid input values.';
                $response['data']['errors']  = $validator->messages();
            }
            else
            {

                return array(
                    "driver" => "smtp",
                    "host" => "smtp.mailtrap.io",
                    "port" => 2525,
                    "from" => array(
                        "address" => "from@example.com",
                        "name" => "Example"
                    ),
                    "username" => "288c5095ec4b53",
                    "password" => "11f20d0cb4ec9d",
                    "sendmail" => "/usr/sbin/sendmail -bs",
                    "pretend" => false
                  );


                  Mail::send('mail2',["name"=>$this->user->name,"accessCode"=>$this->resetPasswordToken], function ($message) {
                    $message->from('info@fantasycricleague.online', 'Password');
                    $message->to($this->username)->subject('Forgot Password!');
                });


                $id = $request['id'];
                $user = User::find($id);

                $password = $user->password;
                $oldPassword = $request['oldPassword'];
                $newPassword = $request['newPassword'];

                if($oldPassword == $password)
                {

                    $user = User::where('email','=',$request['email'])->first();
                    $username = $user->name;
                    $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
                    $password = substr($random, 0, 10);

                    \Mail::send('mail2',["name"=>$this->$username,"accessCode"=>$this->$password], function ($message) use ($tousername) {
                   $message->from('umarraza2200@gmail.com', 'Password');
                   $message->to($tousername)->subject('Forgot Password!');
               });

                }

                $user->save();

                if ($user) 
                {
                    $response['data']['code']       = 200;
                    $response['status']             = true;
                    $response['data']['result']     = $user;
                    $response['data']['message']    = 'Request Successfull';
                }
            }
        return $response;
    }


}
