<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class ContactController extends Controller
{
    //
    public function index()
    {
        $catgorydata = Category::All();

        // お問い合わせフォームを表示
        return view('index', compact('categorydata'));
    }

    public function confirm()
    {
        // バリデーション
        return redirect('/confirm/store');
    }

    public function store()
    {
        return redirect('/thanks');
    }

}
