<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use App\Mail\About\AdminResponseMail;
use App\Mail\About\ResponseMail;
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
        $data['header'] = 'Hello ' . $request->full_name;
        $data['body'] = 'Thank you for reaching out. We have received your message. In the meantime, if you have any other questions or concerns, please don\'t hesitate to contact us.';
        $data['footer'] = 'Sincerely, THE Company';
        $data['email'] = $request->email;
        $data['subject'] = 'Greetings';

        Mail::to($data['email'])
            ->send(new ResponseMail($data));

        $data['header'] = $request->email;
        $data['body'] = $request->full_name;
        $data['footer'] = $request->form_message;
        $data['email'] = 'admin@THECompany.com';
        $data['subject'] = 'Message from: ' . $request->email;

        Mail::to($data['email'])
            ->send(new ResponseMail($data));

//        $user = User::where('email', $request->email)->first();
//        Notification::send($user, new ContactUsNotification($data));

        return view('about.index')
            ->with('message', 'Message sent.');
    }
}
