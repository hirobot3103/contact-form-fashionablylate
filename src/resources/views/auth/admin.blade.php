<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>仮　管理画面：登録</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">

</head>
<body>
  <header class="header">
    <div>
      <p>仮　管理画面：登録</p>
    </div>
    <ul class="header-nav">
      @if (Auth::check())
      <li class="header-nav__item">
        <a class="header-nav__link" href="/mypage">マイページ</a>
      </li>
      <li class="header-nav__item">
        <form action="/logout" method="post">
          @csrf
          <button class="header-nav__button">ログアウト</button>
        </form>
      </li>
      @endif
    </ul>

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
    <form action="/register" method="post">
      @csrf
      name:<input type="text" name="name" value="{{ old('name') }}" />
      <br>
      email:<input type="email" name="email" value="{{ old('email') }}" />
      <br>
      pass:<input type="password" name="password" />
      <br>
      pass-conf:<input type="password" name="password_confirmation" />
      <button type="submit">登録</button>
    </form>
  </main>
</body>
</html>