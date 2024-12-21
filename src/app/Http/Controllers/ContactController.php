<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
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
        // dd($contact);
        // dd($category);
        return view('confirm', compact('contact','category'));
    }

    public function store(ContactRequest $request)
    {
        $contact = $request->only(['first_name', 'last_name','gender','email', 'tel1','tel2','tel3', 'address','building','category','detail']);
        $param = [
            'category_id' => $contact['category'],
            'first_name' => $contact['first_name'],
            'last_name' => $contact['last_name'],
            'gender' => $contact['gender'],
            'email' => $contact['email'],
            'tel' => $contact['tel1'].$contact['tel2'].$contact['tel3'],
            'address' => $contact['address'],
            'building' => $contact['first_name'],
            'detail' => $contact['detail'],
        ];
        Contact::create($param);
        // return view('thanks');
        return redirect('/thanks');
    }

    public function thanks()
    {
        return view('thanks');
    }

}
