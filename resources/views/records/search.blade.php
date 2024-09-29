<!--検索画面-->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-red-600 leading-tight">
            {{ __('記録検索') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 border border-red-600 shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-300">
                    <!-- 検索フォーム -->
                    <form action="{{ route('records.search') }}" method="GET" class="mb-6">
                        <div class="flex items-center">
                            <input type="text" name="keyword" class="bg-gray-700 border border-gray-600 rounded w-full py-2 px-3 text-gray-300 focus:outline-none focus:border-red-600" placeholder="Search for records..." value="{{ request('keyword') }}">
                            <button type="submit" class="ml-4 bg-red-600 hover:bg-red-800 text-white font-bold py-2 px-4 rounded">Search</button>
                        </div>
                    </form>

                    <!-- 検索結果表示 -->
                    @if ($records->count())
                    <div class="mb-4">
                        {{ $records->appends(request()->input())->links() }}
                    </div>

                    @foreach ($records as $record)
                    <div class="mb-4 p-4 bg-gray-700 border border-gray-600 rounded-lg">
                        <p class="text-lg text-red-500">vs {{ $record->opponent }}</p>
                        <p class="text-gray-400 text-sm">投稿者: {{ $record->user->name }}</p>
                        <a href="{{ route('records.show', $record) }}" class="text-blue-400 hover:text-blue-600">詳細を見る</a>
                    </div>
                    @endforeach

                    <div class="mt-4">
                        {{ $records->appends(request()->input())->links() }}
                    </div>
                    @else
                    <p class="text-red-500">No records found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
