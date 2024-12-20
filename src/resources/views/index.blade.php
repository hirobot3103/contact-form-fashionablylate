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

        <form action="" class="page-main__form" method="POST">
          <div class="page-main__form-input">
            <label for="lastname">
              お名前<span>&nbsp※</span>
            </label>
            <div class="page-main__form-input__area">
              <input type="text" id="lastname" class="form-input__name" name="lastname" placeholder="例：山田">
              <input type="text" id="firstname" class="form-input__name" name="firstname" placeholder="例：太郎">
            <!-- バリデーションエラー表示位置 -->    
            </div>        
          </div>

          <div class="page-main__form-input">
            <label for="gender">性別<span>&nbsp※</span></label>
            <div class="page-main__form-input__area--radio">
              <input type="radio" name="gender" id="gender_male" class="form-input__gender" value="1" checked>
              <label class="gender-label" for="gender_male">男性</label>
              <input type="radio" name="gender" id="gender_female" class="form-input__gender" value="2">
              <label class="gender-label" for="gender_female">女性</label>
              <input type="radio" name="gender" id="gender_other" class="form-input__gender" value="3">
              <label class="gender-label" for="gender_other">その他</label>
            <!-- バリデーションエラー表示位置 -->    
            </div>                   
          </div>

          <div class="page-main__form-input">           
              <label for="email">メールアドレス<span>&nbsp※</span></label>
              <div class="page-main__form-input__area">
                <input type="email" id="email" name="email" class="form-input__email" placeholder="例：test@example.com">
              </div>
          </div>

          <div class="page-main__form-input">
            <label for="tel1">電話番号<span>&nbsp※</span></label>
            <div class="page-main__form-input__area">
              <input type="number" id="tel1" name="tel1" class="form-input__tel" placeholder="080">
              <div class="div__hyfun">-</div>
              <input type="number" id="tel2" name="tel2" class="form-input__tel" placeholder="1234">
              <div class="div__hyfun">-</div>
              <input type="number" id="tel3" name="tel3" class="form-input__tel" placeholder="5678">
            </div>
          </div>

          <div class="page-main__form-input">
            <label for="address">住所<span>&nbsp※</span></label>
            <div class="page-main__form-input__area">
              <input type="text" id="address" name="address" class="form-input__address" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3">
            </div>
          </div>

          <div class="page-main__form-input">
            <label for="building">建物名<span>&nbsp</span></label>
            <div class="page-main__form-input__area">
              <input type="text" id="building" name="building" class="form-input__building" placeholder="例：千駄ヶ谷マンション101">
            </div>
          </div>

          <div class="page-main__form-input">
            <label for="category">お問い合わせの種類<span>&nbsp※</span></label>
            <div class="page-main__form-input__area--category">
              <select name="category" id="category" class="form-input__category" >
                <option value="" selected disabled>選択してください</option>
                @foreach($categorydata as $item)
                <option value="{{$item->id}}">{{$item->content}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="page-main__form-input">
            <label for="contact">お問い合わせ内容<span>&nbsp※</span></label>
            <div class="page-main__form-input__area">
              <textarea id="contact" name="contact" class="form-input__contact" placeholder="例：千駄ヶ谷マンション101" cols="50" row="10">
              </textarea> 
            </div>
          </div>
          
          <div class="page-main__form-input--submit">
              <button class="form-input__submit" type="submit">確認画面</button>
          </div>
        </form>
      </div>
    </main>
  </div>
@endsection
