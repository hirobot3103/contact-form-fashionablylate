@extends('layouts.cmn')

@section('subtitle', "お問い合わせありがとうございました")

@section('style-link')
  <link rel="stylesheet" href="{{ asset('css/thanks.css') }}"> 
@endsection

@section('main-page')
  <div class="page-wrapper">
    <main class="page-main">
      <div class="page-main__bgcontent">Thank you</div>
      <div class="page-main__content">
        <p>お問い合わせありがとうございました</p>
        <a class="page-main__homelink" href="/">
          <span>HOME</span>
        </a>
      </div>
    </main>
  </div>
@endsection
