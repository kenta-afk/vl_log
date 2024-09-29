<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-red-600 leading-tight">
            {{ __('記録編集') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 border border-red-600 shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-300">
                    <a href="{{ route('records.show', $record) }}" class="text-blue-400 hover:text-blue-600 mr-2">詳細に戻る</a>
                    <form method="POST" action="{{ route('records.update', $record) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="record" class="block text-gray-400 text-sm font-bold mb-2">記録を編集する</label>
                            <input type="text" name="record" id="record" value="{{ $record->record }}" class="bg-gray-700 border border-gray-600 rounded w-full py-2 px-3 text-gray-300 focus:outline-none focus:border-red-600">
                        </div>

                        <button type="submit" class="bg-red-600 hover:bg-red-800 text-white font-bold py-2 px-4 rounded">更新</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
