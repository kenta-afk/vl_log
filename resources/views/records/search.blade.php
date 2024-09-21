

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('記録検索') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">

          <!-- 検索フォーム -->
          <form action="{{ route('records.search') }}" method="GET" class="mb-6">
            <div class="flex items-center">
              <input type="text" name="keyword" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Search for tweets..." value="{{ request('keyword') }}">
              <button type="submit" class="ml-4 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700">
                Search
              </button>
            </div>
          </form>

          <!-- 検索結果表示 -->
          @if ($records->count())

          <!-- ページネーション -->
          <div class="mb-4">
            {{ $records->appends(request()->input())->links() }}
          </div>

          @foreach ($records as $record)
          <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-700 rounded-lg">
            <p class="text-gray-800 dark:text-gray-300">vs {{ $record->opponent }}</p>
            <p class="text-gray-600 dark:text-gray-400 text-sm">投稿者: {{ $record->user->name }}</p>
            <a href="{{ route('records.show', $record) }}" class="text-blue-500 hover:text-blue-700">詳細を見る</a>
          </div>
          @endforeach

          <!-- ページネーション -->
          <div class="mt-4">
            {{ $records->appends(request()->input())->links() }}
          </div>

          @else
          <p>No records found.</p>
          @endif
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

