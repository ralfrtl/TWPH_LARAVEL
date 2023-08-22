<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class newsController extends Controller
{
    public function __construct(Request $request)
    {
        if ($this->isValidMonth($request->month)) {
            $this->month = date("F", mktime(0, 0, 0, $request->month, 1));
        } else {
            $this->month = 'Invalid month';
        }
    }

    public function index($year, $month = null)
    {
        if ($this->isValidMonth($month)) {
            return view('News', [
                'year' => $year,
                'month' => $this->month
            ]);
        } else {
            return view('invalidMonth');
        }
    }

    public function isValidMonth(string $month): bool
    {
        return $month >= 1 and $month <= 12;
    }
}
