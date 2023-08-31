<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserViewController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('must_admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, $id)
    {
        $user = User::where('users.id', $id)
            ->join('employee', 'users.id', '=', 'employee.id')
            ->get(['users.*', 'employee.*'])
            ->first();
        if (!empty($user))
            $user['age'] = Carbon::parse($user->date_of_birth)->age;
        return view('user/userView' , compact('user'));
    }
}
