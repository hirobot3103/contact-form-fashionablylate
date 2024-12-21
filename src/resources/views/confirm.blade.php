@extends('layouts.cmn')

@section('subtitle', "お問い合わせ内容確認フォーム")

@section('style-link')
  <link rel="stylesheet" href="{{ asset('css/confirm.css') }}"> 
@endsection

@section('main-page')
  <div class="page-wrapper">
    <header class="page-header">
      <div class="page-header__title">
        <span>FashionablyLate</span>
      </div>
      <div class="page-header__btn">
        <!-- loginボタン等の配置位置 -->
      </div>
    </header>

    <main class="page-main">
      <div class="page-main__title">
        <span>Confirm</span>
      </div>
      <div class="page-main__contents">
        <form action="{{ route('store') }}" class="page-main__form" method="POST">
          @csrf
          <table class="confirm-data">
            <tr>
              <th><span>お名前</span></th>
              <td>
                <div class="confirm-text__name">
                  <span>{{ $contact['last_name'] }}&nbsp;{{ $contact['first_name'] }}</span>
                </div>
                <input type="hidden" class="confirm-data__text" name="last_name" value="{{ $contact['last_name'] }}">
                <input type="hidden" class="confirm-data__text" name="first_name" value="{{ $contact['first_name'] }}">
              </td>
            </tr>
            <tr>
              <th><span>性別</span></th>
              <td>
                <div class="confirm-text__name">
@php
  $gendervalue = "";
  if ( $contact['gender'] != "" ) {
    switch ( $contact['gender'] ){
      case "1":
        $gendervalue = "男性";
        break;
      case "2":
        $gendervalue = "女性";
        break;
      case "3":
        $gendervalue = "その他";
        break;
      default:
    }
  }
@endphp
                  <span>{{ $gendervalue }}</span>
                </div>
                <input type="hidden" class="confirm-data__text" name="gender" value="{{ $contact['gender'] }}">
              </td>
            </tr>
            <tr>
              <th><span>メールアドレス</span></th>
              <td>
                <input type="email" class="confirm-data__text" name="email" value="{{ $contact['email'] }}">
              </td>
            </tr>
            <tr>
              <th><span>電話番号</span></th>
              <td>
                <div class="confirm-text__name">
                  <span>{{$contact['tel1']}}{{$contact['tel2']}}{{$contact['tel3']}}</span>
                </div>
                <input type="hidden" class="confirm-data__text" name="tel1" value="{{ $contact['tel1'] }}" readonly>
                <input type="hidden" class="confirm-data__text" name="tel2" value="{{ $contact['tel2'] }}" readonly>
                <input type="hidden" class="confirm-data__text" name="tel3" value="{{ $contact['tel3'] }}" readonly>
              </td>
            </tr>
            <tr>
              <th><span>住所</span></th>
              <td>
                <input type="text" class="confirm-data__text" name="address" value="{{ $contact['address'] }}" readonly>
              </td>
            </tr>
            <tr>
              <th><span>建物名</span></th>
              <td>
                <input type="text" class="confirm-data__text" name="building" value="{{ $contact['building'] }}" readonly>
              </td>
            </tr>
            <tr>
              <th><span>お問い合わせの種類</span></th>
              <td>
                <div class="confirm-text__name">
                  <span>{{ $category['content'] }}</span>
                </div>
                <input type="hidden" class="confirm-data__text" name="category" value="{{ $category['id'] }}" readonly>
              </td>
            </tr>
            <tr class="confirm__contents">
              <th><span>お問い合わせ内容</span></th>
              <td>
                <textarea class="confirm-data__textarea" name="detail" cols="50" row="10" readonly>{{ $contact['detail'] }}</textarea>
              </td>
            </tr>
          </table>
          <div class="form-input--submit">
              <button class="form-input__submit" type="submit">送信</button>
              <a class="form-input__link-modify" href="#" onclick="event.preventDefault(); history.back();">修正</a>
          </div>
        </form>
        <!-- <div class="form-input__link">
          <a class="form-input__link-modify" href="/">修正</a>
        </div> -->
      </div>
    </main>
  </div>
@endsection
