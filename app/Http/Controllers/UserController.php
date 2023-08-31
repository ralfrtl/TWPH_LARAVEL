<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Employee::all();
        return view('user/userList' , compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user/userRegister');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create([
            'email' => $request->email,
            'user_level' => $request->user_level,
            'password' => Hash::make($request->password),
        ]);
        Employee::create([
            'id' => DB::getPdo()->lastInsertId(),
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'date_of_birth' => $request->date_of_birth,
            'salary' => $request->salary,
        ]);

        return view('user/userRegister', ['user_created' => true]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::where('users.id', $id)
            ->join('employee', 'users.id', '=', 'employee.id')
            ->get(['users.*', 'employee.*'])
            ->first();
        if (!empty($user))
            $user['age'] = Carbon::parse($user->date_of_birth)->age;
        return view('user/userView' , compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $employee = Employee::find($id);
        return view('user/userRegister')
            ->with('id', $id)
            ->with('email', $user->email)
            ->with('user_level', $user->user_level)
            ->with('first_name', $employee->first_name)
            ->with('middle_name', $employee->middle_name)
            ->with('last_name', $employee->last_name)
            ->with('date_of_birth', $employee->date_of_birth)
            ->with('salary', $employee->salary);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
