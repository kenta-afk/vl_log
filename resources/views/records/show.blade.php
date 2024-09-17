

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('試合記録詳細') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <a href="{{ route('records.index') }}" class="text-blue-500 hover:text-blue-700 mr-2">一覧に戻る</a>
          <p class="text-gray-800 dark:text-gray-300 text-lg">vs {{ $record->opponent }}</p>
          <p class="text-gray-800 dark:text-gray-300 text-lg">{{ $record->record }}</p>
          <p class="text-gray-600 dark:text-gray-400 text-sm">投稿者: {{ $record->user->name }}</p>
          <div class="text-gray-600 dark:text-gray-400 text-sm">
            <p>作成日時: {{ $record->created_at->format('Y-m-d H:i') }}</p>
            <p>更新日時: {{ $record->updated_at->format('Y-m-d H:i') }}</p>
          </div>
          @if (auth()->id() == $record->user_id)
          <div class="flex mt-4">
            <a href="{{ route('records.edit', $record) }}" class="text-blue-500 hover:text-blue-700 mr-2">編集</a>
            <form action="{{ route('records.destroy', $record) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
              @csrf
              @method('DELETE')
              <button type="submit" class="text-red-500 hover:text-red-700">削除</button>
            </form>
          </div>
          @endif

          <form method="POST" action="{{ route('records.comment', $record->id) }}">
            @csrf
              <label for="comment" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">コメント</label>
              <input type="text" name="comment" id="comment" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline">

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">コメントする</button>
          </form>
          @foreach($record->users as $user)
            <div class="mt-4"> <!-- コメント間に間隔を追加 -->
              <p class="text-gray-800 dark:text-gray-300">@ {{ $user->name }}</p>
              <p class="text-gray-600 dark:text-gray-400 text-sm">{{ $user->pivot->comment }}</p>
            </div>
          @endforeach
          </div>
      </div>
    </div>
  </div>
</x-app-layout>

