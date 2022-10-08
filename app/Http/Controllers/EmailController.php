<?php

namespace App\Http\Controllers;

use App\Events\SendEmailEvent;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    function showForm() {
        return view('form');
    }

    function saveForm(Request $request) {
        $validated = $request->validate([
            'email' => 'required|email',
            'text' => 'required',
            'datetime' => 'required|date',
        ], [
            'email.required' => 'Email is required',
            'email.email' => 'Invalid email address',
            'text.required' => 'Text is required',
            'datetime.required' => 'Date and time is required',
            'datetime.date' => 'Invalid date/time',
        ]);

        event(new SendEmailEvent($request->input('email'), $request->input('text'), $request->input('datetime')));

        return back()->with('success', 'Message has been submitted');
    }
}