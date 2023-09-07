<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use App\Mail\About\AdminResponseMail;
use App\Mail\About\UserResponseMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AboutController extends Controller
{

    public function index()
    {
        return view('about.index');
    }

    public function send(Request $request)
    {
        $data['full_name'] = $request->full_name;
        $data['text'] = $request->form_message;
        $data['email'] = $request->email;

        Mail::to($data['email'])
            ->send(new UserResponseMail($data));

        Mail::to('admin@twph.com')
            ->send(new AdminResponseMail($data));

        return view('about.index')
            ->with('message', 'Message sent.');
    }
}
