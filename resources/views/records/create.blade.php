<!--作成画面-->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-red-600 leading-tight">
            {{ __('試合記録作成') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 border border-red-600 shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-300">
                    <form method="POST" action="{{ route('records.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="opponent" class="block text-gray-400 text-sm font-bold mb-2">対戦相手</label>
                            <input type="text" name="opponent" id="opponent" class="bg-gray-700 border border-gray-600 rounded w-full py-2 px-3 text-gray-300 focus:outline-none focus:border-red-600">
                        </div>

                        <div class="mb-4">
                            <label for="record" class="block text-gray-400 text-sm font-bold mb-2">振り返り</label>
                            <textarea name="record" id="record" class="bg-gray-700 border border-gray-600 rounded w-full py-2 px-3 text-gray-300 focus:outline-none focus:border-red-600"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="video" class="block text-gray-400 text-sm font-bold mb-2">動画をアップロード (最長1時間)</label>
                            <input type="file" name="video" id="video" accept="video/*" class="bg-gray-700 border border-gray-600 rounded w-full py-2 px-3 text-gray-300 focus:outline-none focus:border-red-600">
                        </div>

                        <button type="submit" class="bg-red-600 hover:bg-red-800 text-white font-bold py-2 px-4 rounded">記録する</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
