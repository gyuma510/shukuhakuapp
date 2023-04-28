<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Mail\ContactSendmail;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::simplePaginate(10);;
        return view('contact.index', compact('contacts'));
    }

    public function create()
    {
        return view('contact.create');
    }

    public function store(ContactRequest $request)
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->content = $request->content;
        $contact->save();
        \Mail::to($request->email)->send(new ContactSendmail($contact));
        \Mail::to('yumagoto287@gmail.com')->send(new ContactSendmail($contact));
        return redirect()->route('contact.create')->with('flash_message', 'お問合せを送信しました');
    }

    public function show(string $id)
    {
        $contact = Contact::find($id);
        return view('contact.show',  compact('contact'));
    }
}
