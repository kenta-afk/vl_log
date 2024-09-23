<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valorant Record App</title>
    <!-- CSSのパスを確認 -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1>Welcome to the Valorant Record App</h1>
        <p>Valorantの記録をレビューし、共有しよう！</p>
        <a href="{{ route('register') }}">登録</a>
        <a href="{{ route('login') }}">ログイン</a>
    </div>
</body>
</html>
