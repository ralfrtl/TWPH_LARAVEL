<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use App\Mail\About\AdminResponseMail;
use App\Mail\About\ContactUsResponseMail;
use App\Models\User;
use App\Notifications\ContactUsNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

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

        $user = User::where('email', $request->email)->first();



        Notification::send($user, new ContactUsNotification($data));

//        Mail::to($data['email'])
//            ->send(new ContactUsResponseMail($data, 'User'));

//        Mail::to('admin@twph.com')
//            ->send(new ContactUsResponseMail($data, 'Admin'));

        return view('about.index')
            ->with('message', 'Message sent.');
    }
}
