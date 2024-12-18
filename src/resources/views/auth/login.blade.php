<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>仮　管理画面：ログイン</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">

</head>
<body>
  <header class="header">
    <div>
      <p>仮　管理画面：ログイン</p>
      <ul class="header-nav">
      @if (Auth::check())
      <li class="header-nav__item">
        <a class="header-nav__link" href="/mypage">マイページ</a>
      </li>
      <li class="header-nav__item">
        <form action="/logout" method="post">
          @csrf
          <button class="header-nav__button" type="submit">ログアウト</button>
        </form>
      </li>
      @endif
    </ul>
    </div>
  </header>
  <main class="main">
  @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('login')}}" method="post">
      @csrf
      email:<input type="email" name="email" value="{{ old('email') }}" />
      <br>
      pass:<input type="password" name="password" />
      <br>
      <button type="submit">ログイン</button>
    </form>
  </main>
</body>
</html>