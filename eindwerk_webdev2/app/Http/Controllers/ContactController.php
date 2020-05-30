<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getIndex()
    {
        return view ('pages.contact');
    }

    public function postContact(Request $r) {

        $data = [
            'name' => $r->name,
            'email' => $r->email,
            'subject' => $r->subject,
            'content' => $r->content,
        ];

        Mail::send('mails.contact', $data, function ($message) use($r) {
            $message->sender('maarten.oste@student.arteveldehs.be', 'Maarten Oste');
            $message->to('maarten.oste@student.arteveldehs.be', 'Maarten Oste');
            $message->cc($r->email, $r->name);
            $message->subject($r->subject);
            $message->replyTo('maarten.oste@student.arteveldehs.be', 'Maarten Oste');
        });

        return redirect()->route('news');
    }
}
