<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Category;

class ContactController extends Controller
{
    //
    public function index()
    {
        $category_data = Category::All();
        return view('index', compact('category_data'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['first_name', 'last_name','gender','email', 'tel1','tel2','tel3', 'address','building','category','detail']);
        $category = Category::find($contact['category']);
        dd($contact);
        return view('confirm', compact('contact','category'));
        // return redirect('/confirm/store');
    }

    public function store()
    {
        return redirect('/thanks');
    }

}
