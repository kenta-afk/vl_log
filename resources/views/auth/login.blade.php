<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Valorant Record App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #0f1923; /* Valorantダーク背景 */
        }
    </style>
</head>
<body class="text-white">
    <div class="flex justify-center items-center min-h-screen">
        <div class="bg-[#1c252e] p-8 rounded-lg shadow-lg w-full max-w-md">
            <!-- Session Status -->
            <div class="mb-4 text-red-600">
                <x-auth-session-status :status="session('status')" />
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email" class="block font-semibold text-gray-400">{{ __('Email') }}</label>
                    <input id="email" class="block mt-1 w-full bg-[#2e3842] text-white border border-gray-700 rounded p-2 focus:outline-none focus:ring-2 focus:ring-red-600" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <label for="password" class="block font-semibold text-gray-400">{{ __('Password') }}</label>
                    <input id="password" class="block mt-1 w-full bg-[#2e3842] text-white border border-gray-700 rounded p-2 focus:outline-none focus:ring-2 focus:ring-red-600" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded bg-gray-900 border-gray-700 text-red-600 focus:ring-red-600" name="remember">
                        <span class="ml-2 text-sm text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-between mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-400 hover:text-gray-200" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-red-500">
                        {{ __('Log in') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
