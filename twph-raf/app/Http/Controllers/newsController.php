<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class newsController extends Controller
{
    public function __construct()
    {
    }

    public function index($year, $month = null)
    {
        if ($this->isValidMonth($month)) {
            return view('News', [
                'year' => $year,
                'month' => $month
            ]);
        } else {
            return 'Month not valid';
        }
    }

    public function isValidMonth(string $month)
    {
        return $month > 0 and $month <= 12;
    }
}
