<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employe;
use App\User;
use App\Hash;  

class EmployeController extends Controller
{
    public function newEmployee()
    {
    	return view('employees.newemployee');
    }


     public function employeeDelete($id)
    {
        $employee = User::find($id);
        $employee->delete();
        return redirect('show-employes');
    }


     public function editEmployeeForm($id)
    {
        $employee   = User::find($id);
        return view('employees.editemployeeform',compact('employee'));
    }


public function employeeUpdate(Request $request)
    {

        $this->validate($request,[

            'name'   => 'required',
            'email'  => 'required',
          
        ]);
 
        $employee = User::find($request->id);

        $employee->name    =   $request->name;
        $employee->email   =   $request->email;
        $employee->save();

        return redirect('show-employes');
    }

    public function storeEmploye(Request $request)
    {
        // return $request;
            $this->validate($request,[

            'name'        => 'required',
            'email'       => 'required|unique:users,email',
            'address'     => 'required',
            'phoneNumber' => 'required',
            'age'         => 'required',

            ]);

            $user = new User;
            $user->name       =  $request->name;
            $user->email      =  $request->email;
            $user->password   =  bcrypt($request->password);
            $user->role       =  'Employe';
            $user->save();
            
            $userId = $user->id;
            $employee = Employe::create([
                        'name'          => $request->name,
                        'email'         => $request->email,
                        'address'       => $request->address,
                        'phoneNumber'   => $request->phoneNumber,
                        'age'           => $request->age,
                        'userId'        => $userId,
                    ]);
            $employee->save();

        // return redirect('show-customers');



    	return redirect('show-employes');
    }

    public function showEmployes()
    {
        $employes = User::all()->where('role','=', 'Employe');
    	// $employesData = Employe::all();
        // return $employesData;

    	return view('employees.allEmployes',compact('employes'));
    }
} 
