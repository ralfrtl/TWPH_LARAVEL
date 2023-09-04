<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;

class HelloWorldController extends Controller
{
    public function index($string) {
        return 'hello ' . $string;
    }
}
