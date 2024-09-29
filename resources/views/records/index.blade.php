<!--一覧画面-->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-red-600 leading-tight">
            {{ __('試合記録一覧') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 border border-red-600 shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-300">
                    @foreach ($records as $record)
                    <div class="mb-4 p-4 bg-gray-700 border border-gray-600 rounded-lg shadow-md">
                        <p class="text-lg text-red-500">vs {{ $record->opponent }}</p>
                        <p class="text-gray-400 text-sm">投稿者: {{ $record->user->name }}</p>
                        <a href="{{ route('records.show', $record) }}" class="text-blue-400 hover:text-blue-600">詳細を見る</a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
