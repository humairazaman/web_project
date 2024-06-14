<?php

namespace App\Http\Controllers;

use App\Models\Mail;

use Illuminate\Http\Request;

class MailCrudController extends Controller
{
    public function manage()
    {
        $mails = Mail::all();
        return view('mail.manage', compact('mails'));
    }

    public function create()
    {
        return view('mail.subscribe');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        Mail::firstOrCreate(['email' => $request->email]);

        return redirect()->route('mails.manage')->with('success', 'Email added successfully');
    }


    public function edit(Mail $mail)
    {
        return view('mail.edit', compact('mail'));
    }

    public function update(Request $request, Mail $mail)
    {
        $request->validate([
            'email' => 'required|email|unique:mails,email,' . $mail->id,
        ]);

        $mail->update($request->all());

        return redirect()->route('mails.manage')->with('success', 'Email updated successfully');
    }

    public function destroy(Mail $mail)
    {
        $mail->delete();

        return redirect()->route('mails.manage')->with('success', 'Email deleted successfully');
    }
}
