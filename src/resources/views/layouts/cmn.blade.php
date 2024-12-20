<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FashionablyLate @yield('subtitle')</title>

  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inika&family=Noto+Serif+JP&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('css/sanitaize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
@yield('style-link')

</head>
<body>
  <div class="page-wrapper">
    <header class="page-header">
      <div class="page-header__title">
        <span>FashionablyLate</span>
      </div>
      <div class="page-header__btn">
        <!-- loginボタン等の配置位置 -->
      </div>
    </header>

@yield('main-page')

</body>
</html>
