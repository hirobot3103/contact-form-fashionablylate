@extends('layouts.cmn')

@section('subtitle', "管理画面 登録")

@section('style-link')
  <link rel="stylesheet" href="{{ asset('css/register.css') }}"> 
@endsection

@section('main-page')
<div class="page-wrapper">
    <header class="page-header">
      <div class="page-header__title">
        <span>FashionablyLate</span>
      </div>
      <div class="page-header__btn">
        <a class="page-header__btn-link" href="/login">login</a>
      </div>
    </header>

    <main class="page-main">
      <div class="page-main__title">
        <span>Register</span>
      </div>
      <div class="page-main__contents">
        <form action="/register" class="page-main__form" method="POST">
          @csrf
          <div class="page-main__form-input">
            <label for="name">
              お名前
            </label>
            <div class="page-main__form-input__area">
              <input type="text" id="lastname" class="form-input__name" name="name" placeholder="例：山田 太郎">
            </div>
          </div>
          @error('name')
          <div class="form-input__varidation">{{ $message }}</div>  
          @enderror

          <div class="page-main__form-input">
              <label for="email">メールアドレス</label>
              <div class="page-main__form-input__area">
                <input type="text" id="email" name="email" class="form-input__name" placeholder="例：test@example.com">
              </div>
          </div>
          @error('email')
          <div class="form-input__varidation">{{ $message }}</div>  
          @enderror

          <div class="page-main__form-input">
            <label for="password">パスワード</label>
            <div class="page-main__form-input__area">
              <input type="text" id="password" name="password" class="form-input__name" placeholder="例：coachtech06">
            </div>
          </div>
          @error('password')
          <div class="form-input__varidation">{{ $message }}</div>  
          @enderror

          <div class="page-main__form-input--submit">
              <button class="form-input__submit" type="submit">登録</button>
          </div>
        </form>
      </div>
    </main>
  </div>
@endsection
