<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HelloWorldAPIController extends Controller
{
    public function index($id = null)
    {
        if (empty($id)) {
            $employee = Employee::all();
            if ($employee)
                return response()->json([
                    'code' => 200,
                    'data' => $employee
                ]);
            else
                return response()->json([
                    'code' => 404,
                    'message' => 'No records found'
                ]);
        } else {
            $employee = Employee::find($id);
            if ($employee)
                return response()->json([
                    'code' => 200,
                    'data' => $employee
                ]);
            else
                return response()->json([
                    'code' => 404,
                    'message' => 'Record with id \'' . $id . '\' not found'
                ]);
        }
    }

    public function store(UserRequest $request)
    {
        $user = User::create([
            'email' => $request->email,
            'user_level' => $request->user_level,
            'password' => Hash::make($request->password),
        ]);
        $employee = Employee::create([
            'id' => $user->id,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'date_of_birth' => $request->date_of_birth,
            'salary' => $request->salary,
        ]);
        $user->merge(collect($employee));
        return response()->json([
            'code' => 200,
            'message' => 'Record successfully added',
            'data' => $user,
        ]);

    }

    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            $employee = Employee::find($id);
            if ($employee)
                $employee->delete();
            return response()->json([
                'code' => 200,
                'message' => 'Record with id \'' . $id . '\' is deleted',
                'user_data' => $user,
                'employee_data' => $employee,
            ]);
        } else {
            return response()->json([
                'code' => 404,
                'message' => 'Record with id \'' . $id . '\' not found'
            ]);
        }
    }

    public function destroy_force($id)
    {
        $user = User::find($id);
        $employee = Employee::find($id);
        if ($user) {
            $user->forceDelete();
            return response()->json([
                'code' => 200,
                'message' => 'Record with id \'' . $id . '\' is force deleted',
                'user_data' => $user,
                'employee_data' => $employee,
            ]);
        } else {
            return response()->json([
                'code' => 404,
                'message' => 'Record with id \'' . $id . '\' not found'
            ]);
        }
    }
}
