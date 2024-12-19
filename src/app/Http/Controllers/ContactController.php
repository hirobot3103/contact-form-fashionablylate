<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function index()
    {
        // お問い合わせフォームを表示
        return view('index');
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
