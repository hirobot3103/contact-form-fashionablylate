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
        $contacts = Contact::with('Category')->paginate(7);
        $categories = Category::All();
        return view('auth.admin', compact('contacts','categories'));
    }
    public function search(Request $request){
        $contacts = Contact::with('Category')->KeywordSearch($request->keyword)->GenderSearch($request->gender)->ContactSearch($request->contact)->DateSearch($request->date)->paginate(7);
        $categories = Category::All();
        return view('auth.admin', compact('contacts','categories'));     
    }

    public function delete(Request $request){
        $contact_del = Contact::find($request->id);
        $redirect_url = $request->currenturl;
        $contact_del->delete($request->id);

        return redirect($redirect_url); //　削除したデータのあったページへ戻る
    }
}
