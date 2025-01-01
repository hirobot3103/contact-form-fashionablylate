<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'integer', 'between:1,3'],
            'email' => ['required', 'string', 'email' , 'max:255'],
            'tel1' => ['required', 'max:5'],
            'tel2' => ['required', 'max:5'],
            'tel3' => ['required', 'max:5'],
            'address' => ['required', 'string', 'max:255'],
            'category' => ['required', 'integer'],
            'detail' => ['required', 'max:120']
        ];
    }

    public function messages(): array
    {
        // エラーメッセージのカスタマイズ
        // 必須項目、形式、文字制限等
        return [
            'last_name.required' => "姓を入力してください",
            'first_name.required' => "名を入力してください",
            'gender.required' => '性別を入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'tel1.required' => '電話番号を入力してください',
            'tel1.max' => '電話番号は5桁までの数字で入力してください',
            'tel2.required' => '電話番号を入力してください',
            'tel2.max' => '電話番号は5桁までの数字で入力してください',
            'tel3.required' => '電話番号を入力してください',
            'tel3.max' => '電話番号は5桁までの数字で入力してください',
            'address.required' => '住所を入力してください',
            'category.required' => 'お問い合わせの種類を入力してください',
            'detail.required' => 'お問い合わせ内容を入力してください',
            'detail.max' => 'お問い合わせ内容は120文字以内で入力してください',
        ];
    }
}
