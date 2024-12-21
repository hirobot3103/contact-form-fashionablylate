@extends('layouts.cmn')

@section('subtitle', "お問い合わせ入力フォーム")

@section('style-link')
  <link rel="stylesheet" href="{{ asset('css/index.css') }}"> 
@endsection

@section('main-page')
    <main class="page-main">
      <div class="page-main__title">
        <span>Contact</span>
      </div>
      <div class="page-main__contents">

        <form action="{{ route('confirm') }}" class="page-main__form" method="POST">
@csrf
          <div class="page-main__form-input">
            <label for="lastname">
              お名前<span>&nbsp;※</span>
            </label>
            <div class="page-main__form-input__area">
              <input type="text" id="lastname" class="form-input__name" name="last_name" placeholder="例：山田" value="{{ old('last_name') }}">
              <input type="text" id="firstname" class="form-input__name" name="first_name" placeholder="例：太郎" value="{{ old('first_name') }}">
            </div>
          </div>
@error('last_name')
          <!-- バリデーションエラー表示位置 -->
          <div class="form-input__varidation">{{ $message }}</div>  
@enderror
@error('first_name')
          <div class="form-input__varidation">{{ $message }}</div>  
@enderror

          <div class="page-main__form-input">
            <label for="gender">性別<span>&nbsp;※</span></label>
            <div class="page-main__form-input__area--radio">

@php
  //  性別の既入力内容を反映させる
  $radiochecked = ["checked", "", ""];
  if (! is_NUll( old('gender') ) ){
    switch ( old('gender') ){
      case "1":
        $radiochecked = ["checked", "" , ""];
        break;
      case "2":
        $radiochecked = ["", "checked" , ""];
        break;
      case "3":
        $radiochecked = ["", "" , "checked"];
        break;
      default:
    }
  } 
@endphp
              <input type="radio" name="gender" id="gender_male" class="form-input__gender" value="1" {{ $radiochecked[0] }}>
              <label class="gender-label" for="gender_male">男性</label>
              <input type="radio" name="gender" id="gender_female" class="form-input__gender" value="2" {{ $radiochecked[1] }}>
              <label class="gender-label" for="gender_female">女性</label>
              <input type="radio" name="gender" id="gender_other" class="form-input__gender" value="3" {{ $radiochecked[2] }}>
              <label class="gender-label" for="gender_other">その他</label>
            </div>                   
          </div>
@error('gender')
          <div class="form-input__varidation">{{ $message }}</div>  
@enderror

          <div class="page-main__form-input">           
              <label for="email">メールアドレス<span>&nbsp;※</span></label>
              <div class="page-main__form-input__area">
                <input type="email" id="email" name="email" class="form-input__email" placeholder="例：test@example.com" value="{{ old('email') }}">
              </div>
          </div>
@error('email')
          <div class="form-input__varidation">{{ $message }}</div>  
@enderror

          <div class="page-main__form-input">
            <label for="tel1">電話番号<span>&nbsp;※</span></label>
            <div class="page-main__form-input__area">
              <input type="number" id="tel1" name="tel1" class="form-input__tel" placeholder="080" value="{{ old('tel1') }}">
              <div class="div__hyfun">-</div>
              <input type="number" id="tel2" name="tel2" class="form-input__tel" placeholder="1234" value="{{ old('tel2') }}">
              <div class="div__hyfun">-</div>
              <input type="number" id="tel3" name="tel3" class="form-input__tel" placeholder="5678" value="{{ old('tel3') }}">
            </div>
          </div>
@error('tel1')
          <div class="form-input__varidation">（左）{{ $message }}</div>
@enderror
@error('tel2')
          <div class="form-input__varidation">（中）{{ $message }}</div>
@enderror
@error('tel3')
          <div class="form-input__varidation">（右）{{ $message }}</div>
@enderror

          <div class="page-main__form-input">
            <label for="address">住所<span>&nbsp;※</span></label>
            <div class="page-main__form-input__area">
              <input type="text" id="address" name="address" class="form-input__address" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
            </div>
          </div>
@error('address')
          <div class="form-input__varidation">{{ $message }}</div>  
@enderror

          <div class="page-main__form-input">
            <label for="building">建物名<span>&nbsp;</span></label>
            <div class="page-main__form-input__area">
              <input type="text" id="building" name="building" class="form-input__building" placeholder="例：千駄ヶ谷マンション101" value="{{ old('building') }}">
            </div>
          </div>
@error('building')
          <div class="form-input__varidation">{{ $message }}</div>  
@enderror

          <div class="page-main__form-input">
            <label for="category">お問い合わせの種類<span>&nbsp;※</span></label>
            <div class="page-main__form-input__area--category">
              <select name="category" id="category" class="form-input__category" >
@php
  // お問い合わせの種類の既入力内容を反映
  $selected = "selected";
  $selectedvalue = "";
  if (! is_NUll( old('category') ) ){
    $selectedvalue = old('category');
    $selected = "";
  } 
@endphp
                <option value="" {{ $selected }} disabled>選択してください</option>
@foreach($category_data as $item)
@php
  if ( ( $selected === "" ) && ( $item->id == $selectedvalue ) ){
    $selected = "selected";
  } else {
    $selected = "";
  }
@endphp
                <option value="{{$item->id}}" {{ $selected }}>{{$item->content}}</option>
@endforeach
              </select>
            </div>
          </div>
@error('category')
          <div class="form-input__varidation">{{ $message }}</div>  
@enderror

          <div class="page-main__form-input">
            <label for="detail">お問い合わせ内容<span>&nbsp;※</span></label>
            <div class="page-main__form-input__area">
              <textarea id="detail" name="detail" class="form-input__contact" placeholder="お問い合わせの内容を入力してください">{{ old('detail') }}</textarea> 
            </div>
          </div>
@error('detail')
          <div class="form-input__varidation">{{ $message }}</div>  
@enderror

          <div class="page-main__form-input--submit">
              <button class="form-input__submit" type="submit">確認画面</button>
          </div>
        </form>
      </div>
    </main>
  </div>
@endsection
