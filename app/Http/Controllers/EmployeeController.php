<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth/register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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

        return redirect('/register');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        $employee = Employee::find($id);
        return view('auth.register')
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
