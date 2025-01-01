@extends('layouts.cmn')

@section('subtitle', "管理画面 お問い合わせ管理")

@section('style-link')
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}"> 
@endsection

@section('main-page')

  @foreach($contacts as $contact)
  <!-- モーダル風div １ページ表示分 ID:{{$contact['id']}} -->
  <style>
  #modal-switch{{$contact['id']}} {
    display: none;
  }

  #modal-switch{{$contact['id']}}:checked + .modal-area {
    display: block;
  }
  </style>
  <input type="checkbox" name="modal-switch" id="modal-switch{{$contact['id']}}" class="modal-switch">
  <div id="modal-area" class="modal-area">
    <div class="modal-content">
      <div class="modal-close__btn">
        <label for="modal-switch{{$contact['id']}}" class="modal-close"><div></div></label>
      </div>

      <table class="confirm-data--modal">
        <tr>
          <th><span>お名前</span></th>
          <td>
            <div class="confirm-text__name--modal">
              <span>{{$contact['last_name']}}&nbsp;{{$contact['first_name']}}</span>
            </div>
          </td>
        </tr>
        <tr>
          <th><span>性別</span></th>
          <td>
            @php
              $gender_type = "";
              switch ( $contact['gender'] ) {
                case "1":
                  $gender_type = "男性";
                  break;
                case "2":
                  $gender_type = "女性";
                  break;
                case "3":
                  $gender_type = "その他";
                  break;
                default:      
              }
            @endphp
            <input type="text" class="confirm-data__text--modal" name="gender" value="{{$gender_type}}" readonly>
          </td>
        </tr>
        <tr>
          <th><span>メールアドレス</span></th>
          <td>
            <input type="text" class="confirm-data__text--modal" name="email" value="{{$contact['email']}}" readonly>
          </td>
        </tr>
        <tr>
          <th><span>電話番号</span></th>
          <td>
            <div class="confirm-text__tel--modal">
              <span>{{$contact['tel']}}</span>
            </div>
          </td>
        </tr>
        <tr>
          <th><span>住所</span></th>
          <td>
            <input type="text" class="confirm-data__text--modal" name="address" value="{{$contact['address']}}" readonly>
          </td>
        </tr>
        <tr>
          <th><span>建物名</span></th>
          <td>
            <input type="text" class="confirm-data__text--modal" name="building" value="{{$contact['building']}}" readonly>
          </td>
        </tr>
        <tr>
          <th><span>お問い合わせの種類</span></th>
          <td>
            <input type="text" class="confirm-data__text--modal" name="category" value="{{$contact->Category['content']}}" readonly>
          </td>
        </tr>
        <tr class="confirm__contents--modal">
          <th><span>お問い合わせ内容</span></th>
          <td>
            <textarea class="confirm-data__textarea--modal" name="contact" cols="50" row="10" readonly>{{$contact['detail']}}</textarea>
          </td>
        </tr>
      </table>
      <div class="form-input--submit-modal">
        <form action="/admin/delete" method="post">
          @csrf
          @php
            $currentPage = $contacts->currentPage();
            $currentUrl =  $contacts->url($currentPage);
          @endphp
          <input type="hidden" name="id" value="{{$contact['id']}}">
          <input type="hidden" name="currenturl" value="{{$currentUrl}}">
          <button class="form-input__submit--modal" type="submit">削除</button>
        </form>
      </div>
    </form>
    </div>
  </div>
  <!-- モーダル風div ID:{{$contact['id']}} ここまで -->
  @endforeach


  <div class="page-wrapper">
    <header class="page-header">
      <div class="page-header__title">
        <span>FashionablyLate</span>
      </div>
      <div class="page-header__btn">
        <form action="/logout" method="post">
          @csrf
          <button class="page-header__btn-link" type="submit">Logout</a>
        </form>
      </div>
    </header>

    <main class="page-main">
      <div class="page-main__title">
        <span>Admin</span>
      </div>
      <div class="page-main__contents">

        <form action="/admin/search" class="page-main__form" method="get">
          @csrf
          <div class="page-main__form-input">
            <div class="page-main__form-input__area">
              <input type="text" id="keyword" class="form-input__keyword" name="keyword" placeholder="名前やメールアドレスを入力してください">

              <div class="page-main__form-input__area--key-gender">
                <select class="form-input__key-gender" name="gender">
                  <option value="" selected disabled>性別</option>
                  <option value="1">男性</option>
                  <option value="2">女性</option>
                  <option value="3">その他</option>
                </select>
              </div>

              <div class="page-main__form-input__area--category">
                <select class="form-input__category" name="contact">
                  <option value="" selected disabled>お問い合わせの種類</option>
                  @foreach($categories as $cat )
                  <option value="{{$cat['id']}}">{{$cat['content']}}</option>
                  @endforeach
                </select>
              </div>

              <div>
                <label for="date" class="label-date">
                  <input type="date" id="date" class="form-input__date" name="date">
                </label>
              </div>
              <button class="form-input__search" type="submit">検索</button>
              <button class="form-input__reset" type="submit" name='reset'>リセット</button>
            </div>
          </div>
        </form>

        <div class="btn-nav-area">
          <form action="/admin/csv" class="page-main__form" method="POST">
            @csrf
            <div class="page-main__form-input">
              <div class="page-main__form-input__area">
                <button class="form-input__csv" type="submit" name='expo'>エクスポート</button>
                <input type="hidden" name="keyword" value="{{$csvData['keyword']}}">
                <input type="hidden" name="gender" value="{{$csvData['gender']}}">
                <input type="hidden" name="contact" value="{{$csvData['contact']}}">
                <input type="hidden" name="date" value="{{$csvData['date']}}">
              </div>
            </div>
          </form>
          <div class="page-main__form-input">
            {{ $contacts->appends(request()->query())->links() }}
          </div>
        </div>

        <table class="confirm-data">
          <tr>
            <th><span>お名前</span></th>
            <th><span>性別</span></th>
            <th><span>メールアドレス</span></th>
            <th><span>お問い合わせの種類</span></th>
            <th></th>
          </tr>
          @foreach($contacts as $contact)
          <tr>
            <td>
              <input type="text" class="confirm-data__text" name="name" value="{{$contact['last_name']}}&nbsp;{{$contact['first_name']}}" readonly>
            </td>
            <td>
              @php
                $gender_type = "";
                switch ( $contact['gender'] ) {
                  case "1":
                    $gender_type = "男性";
                    break;
                  case "2":
                    $gender_type = "女性";
                    break;
                  case "3":
                    $gender_type = "その他";
                    break;
                  default:      
                }
              @endphp
              <input type="text" class="confirm-data__text--gender" name="gender" value="{{$gender_type}}" readonly>
            </td>
            <td>
              <input type="text" class="confirm-data__text" name="email" value="{{$contact['email']}}" readonly>
            </td>
            <td>
              <input type="text" class="confirm-data__text" name="category" value="{{$contact->Category['content']}}" readonly>
            </td>
            <td>
              <label for="modal-switch{{$contact['id']}}" class="modal-label">詳細</label>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
    </main>
  </div>
@endsection