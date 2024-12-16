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
    </div>
  </header>
  <main class="main">
    <form action="/login" method="POST">
      @csrf
      email:<input type="email" name="email" value="{{ old('email') }}" />
      <br>
      pass:<input type="password" name="password" />
      <br>
      <button>ログイン</button>
    </form>
  </main>
</body>
</html>