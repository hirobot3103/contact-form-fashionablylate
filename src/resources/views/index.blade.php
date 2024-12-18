<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <a href="{{route('register')}}">登録</a>
  <a href="{{route('login')}}">ログイン</a>
w
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
</body>
</html>