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
        $request->validate([
            'to' => 'required|email',
            'subject' => 'required|string',
            'body' => 'required|string',
            'attachment' => 'required|file|mimes:pdf,doc,docx,txt,jpg,jpeg,png|max:2048',
        ]);

        $to = $request->input('to');
        $subject = $request->input('subject');
        $body = $request->input('body');
        $attachment = $request->file('attachment');

        Mail::to($to)->send(new SendMail($subject, $body, $attachment));

        return redirect()->route('email-form')->with('success', 'Email sent successfully');
    }
}
