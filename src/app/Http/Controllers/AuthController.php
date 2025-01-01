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
        $csvData = [
            'keyword' => "",
            'gender' => "",
            'contact' => "",
            'date' => "",
        ];
        return view('auth.admin', compact('contacts','categories' , 'csvData'));
    }

    public function search(Request $request)
    {
        if ($request->has('reset')) {
            return redirect('/admin')->withInput();
        }
        $contacts = Contact::with('Category')
                    ->KeywordSearch($request->keyword)
                    ->GenderSearch($request->gender)
                    ->ContactSearch($request->contact)
                    ->DateSearch($request->date)
                    ->paginate(7);
        $categories = Category::All();
        $csvData = $request;
        return view('auth.admin', compact('contacts','categories', 'csvData'));     
    }

    public function delete(Request $request)
    {
        $contact_del = Contact::find($request->id);
        // $redirect_url = $request->currenturl;
        $contact_del->delete($request->id);
        // return redirect($redirect_url); //　削除したデータのあったページへ戻る
        return redirect('/admin'); 

    }

    public function export(Request $request)
    {
        $contacts = Contact::with('Category')
        ->KeywordSearch($request->keyword)
        ->GenderSearch($request->gender)
        ->ContactSearch($request->contact)
        ->DateSearch($request->date)
        ->get()
        ->toArray();

    }
}
