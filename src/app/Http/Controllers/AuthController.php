<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;

class AuthController extends Controller
{
    //
    public function index()
    {
        $contacts = Contact::with('Category')->get();
        return view('auth.admin', compact('contacts'));
    }
}
