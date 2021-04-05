<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Page;


class ContactController extends Controller
{
    public function index()
    {
        $page = Page::find(21);
        $contact = Contact::find(1);
        return view('contact.index', compact('page', 'contact')); 

    }
}
