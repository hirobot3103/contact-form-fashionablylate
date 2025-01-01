<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Support\Facades\Date;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AuthController extends Controller
{
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
        $csvData = Contact::query()
        ->KeywordSearch($request->keyword)
        ->GenderSearch($request->gender)
        ->ContactSearch($request->contact)
        ->DateSearch($request->date)
        ->get()
        ->toArray();

        $csvHeader = [
            'id', 'category_id', 'first_name', 'last_name', 'gender', 'email', 'tell', 'address', 'building', 'detail', 'created_at', 'updated_at'
        ];

        $response = new StreamedResponse(function () use ($csvHeader, $csvData) {
            $createCsvFile = fopen('php://output', 'w');

            mb_convert_variables('SJIS-win', 'UTF-8', $csvHeader);

            fputcsv($createCsvFile, $csvHeader);

            foreach ($csvData as $csv) {
                $csv['created_at'] = Date::make($csv['created_at'])->setTimezone('Asia/Tokyo')->format('Y/m/d H:i:s');
                $csv['updated_at'] = Date::make($csv['updated_at'])->setTimezone('Asia/Tokyo')->format('Y/m/d H:i:s');
                fputcsv($createCsvFile, $csv);
            }

            fclose($createCsvFile);
        }, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="contacts.csv"',
        ]);

        return $response;
    }
}
