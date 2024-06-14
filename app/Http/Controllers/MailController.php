<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class MailController extends Controller
{
    public function showEmailForm()
    {
        return view('mail.email-form');
    }

    public function sendEmail(Request $request)
    {
        $to = $request->input('to');
        $subject = $request->input('subject');
        $body = $request->input('body');

        $filename = time() . '.' . $request->file('attachment')->getClientOriginalExtension();
        $request->file('attachment')->move(public_path('pro'), $filename);

        $attachment = public_path('pro') . '/' . $filename;

        Mail::to($to)->send(new SendMail($subject, $body, $attachment));

        return redirect()->route('email-form')->with('success', 'Email sent successfully');
    }

}
