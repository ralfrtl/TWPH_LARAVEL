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
        return view('user/userList', compact('users'));
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
        $user = User::where('users.id', $id)
            ->join('employee', 'users.id', '=', 'employee.id')
            ->get(['users.*', 'employee.*'])
            ->first();
        if (!empty($user)) {
            $user['age'] = Carbon::parse($user->date_of_birth)->age;
            $user['date_of_birth'] = Carbon::create($user->date_of_birth)->toFormattedDateString();
        }
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
            ->with('message-class', 'bg-gradient-success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dd(User::find($id));
//        Employee::find($id)->delete();
        return redirect()->route('user.index');
    }
}
