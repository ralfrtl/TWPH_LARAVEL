<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employee = Employee::paginate(10);
        return view('user.index', compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::create([
            'email' => $request->email,
            'user_level' => $request->user_level,
            'password' => Hash::make($request->password),
        ]);
        Employee::create([
            'id' => $user->id,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'date_of_birth' => $request->date_of_birth,
            'salary' => $request->salary,
        ]);

        return redirect()->route('user.create')
            ->with('message', 'User ID#' . $user->id . ' created successfully.')
            ->with('message-class', 'blurred-green');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Employee::where('users.id', $id)
            ->join('users', 'users.id', '=', 'employee.id')
            ->first();
        return view('user.show' , compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $employee = Employee::find($id);
        return view('user.register')
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
        $user = User::find($id);
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->user_level = $request->user_level;
        $user->save();
        $employee = Employee::find($id);
        $employee->first_name = $request->first_name;
        $employee->middle_name = $request->middle_name;
        $employee->last_name = $request->last_name;
        $employee->date_of_birth = $request->date_of_birth;
        $employee->salary = $request->salary;
        $employee->save();
        return redirect()->route('user.index')
            ->with('message', 'User ID#' . $id . ' modified successfully.')
            ->with('message-class', 'blurred-green');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        Employee::find($id)->delete();
        return redirect()->route('user.index')
            ->with('message', 'User ID#' . $id . ' has been removed.')
            ->with('message-class', 'blurred-tangerine');
    }
}
