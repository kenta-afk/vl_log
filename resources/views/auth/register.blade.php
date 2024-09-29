<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Valorant Record App</title>
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
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block font-semibold text-gray-400">{{ __('Name') }}</label>
                    <input id="name" class="block mt-1 w-full bg-[#2e3842] text-white border border-gray-700 rounded p-2 focus:outline-none focus:ring-2 focus:ring-red-600" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <label for="email" class="block font-semibold text-gray-400">{{ __('Email') }}</label>
                    <input id="email" class="block mt-1 w-full bg-[#2e3842] text-white border border-gray-700 rounded p-2 focus:outline-none focus:ring-2 focus:ring-red-600" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <label for="password" class="block font-semibold text-gray-400">{{ __('Password') }}</label>
                    <input id="password" class="block mt-1 w-full bg-[#2e3842] text-white border border-gray-700 rounded p-2 focus:outline-none focus:ring-2 focus:ring-red-600" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <label for="password_confirmation" class="block font-semibold text-gray-400">{{ __('Confirm Password') }}</label>
                    <input id="password_confirmation" class="block mt-1 w-full bg-[#2e3842] text-white border border-gray-700 rounded p-2 focus:outline-none focus:ring-2 focus:ring-red-600" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600" />
                </div>

                <div class="flex items-center justify-between mt-4">
                    <a class="underline text-sm text-gray-400 hover:text-gray-200" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-red-500">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
