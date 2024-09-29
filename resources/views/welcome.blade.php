<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valorant Record App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #0f1923; /* Valorantのダークな背景色 */
        }
        h1 {
            font-family: 'Valorant', sans-serif;
        }
    </style>
</head>
<body class="text-white">
    <div class="container mx-auto text-center py-20">
        <h1 class="text-4xl font-bold mb-6 text-red-600">Welcome to the Valorant Record App</h1>
        <p class="text-lg mb-8">Valorantの記録をレビューし、共有しよう！</p>
        <div class="space-x-4">
            <a href="{{ route('register') }}" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                登録
            </a>
            <a href="{{ route('login') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                ログイン
            </a>
        </div>
    </div>
</body>
</html>
